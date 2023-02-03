<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use DateTime;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Google_Service_Calendar_EventAttendee;
use Google_Service_Calendar_ConferenceData;
use Google_Service_Calendar_EntryPoint;
use Google_Service_Calendar_ConferenceSolution;
use Google_Service_Calendar_CreateConferenceRequest;
use Google_Service_Calendar_ConferenceSolutionKey;
use Google_Service_Calendar_ConferenceRequestStatus;
//use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class gCalendarController extends Controller
{
    protected $client;

    public function __construct()
    {
        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);

        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($email)
    {
        session_start();

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $calendarId = $email;
            //$calendarId = 'kamaljeet@studiographene.com';

            //Print the next 10 events on the user's calendar
            $optParams = array(
                'maxResults' => 10,
                'orderBy' => 'startTime',
                'singleEvents' => true,
                'timeMin' => date('c', strtotime("now")),
            );

            $results = $service->events->listEvents($calendarId, $optParams);
            $data = [];
            $data['cal'] = $results->getItems();
            $data['email'] = $email;
            return view('calendar.showCalendar', compact('data'));

        } else {
            return redirect()->route('oauthCallback', [$email]);
        }
    }

    public function oauth($email)
    {
        session_start();
        $rurl = action('App\Http\Controllers\gCalendarController@oauth', $email);
        //$rurl = action('App\Http\Controllers\gCalendarController@oauth', $cal_id);
        $this->client->setRedirectUri($rurl);
        
        if (!isset($_GET['code'])) {
            $auth_url = $this->client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
            return redirect($filtered_url);
        } else {
            $this->client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $this->client->getAccessToken();
            return redirect()->route('cal.create', [$email]);
        }
    }

    public function book($email)
    {
            $_SESSION['access_token'] = $this->client->getAccessToken();
            return redirect()->route('cal.create', [$email]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($email)
    {
        //$data['user'] = $email;
        $data['email']=$email;
        return view('calendar.eventCreate',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $email)
    {
        session_start();

        $startDateTime = $request->start_date;
        $endDateTime = $request->end_date;

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $calendarId = 'kamaljeet@studiographene.com';
            $event = new Google_Service_Calendar_Event([
                'summary' => $request->title,
                'description' => $request->description,
                'start' => ['dateTime' => $startDateTime],
                'end' => ['dateTime' => $endDateTime],
                'reminders' => ['useDefault' => true],
            ]);

        //Google meet invitation
        $conference = new Google_Service_Calendar_ConferenceData();
        $conferenceRequest = new Google_Service_Calendar_CreateConferenceRequest();
        $conferenceRequest->setRequestId('randomString123');
        $conference->setCreateRequest($conferenceRequest);
        $event->setConferenceData($conference);

        //attendee
        $email_invite_arr = $email;
        //$email_invite_arr = ['kamaljeet@studiographene.com', 'kour21kamaljeet@gmail.com', 'sandywaves9@gmail.com', 'amandeepsingh4606@gmail.com'];
            foreach((array) $email_invite_arr as $item){
                if($item){
                    $attendee = new Google_Service_Calendar_EventAttendee();
                    $attendee->setEmail($item);
                    $attendee_arr[]= $attendee;
                }
            }
            $opts = array('sendNotifications' => true, 'conferenceDataVersion' => 1);
            $event->attendees = $attendee_arr;
            $event = $service->events->insert($calendarId,$event, $opts);
            //dd($event);
            
            if (!$event) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
            }
            else if($event) {
                $userId = Auth::user()->id;
                $userRole = Auth::user()->user_role_id;
                $request->session()->put('userId', $userId );
                $request->session()->put('userRole', $userRole);
                return view('showcandidate',['users' => User::select("*")->where("user_role_id", 4)->paginate(5)]);
                //return response()->json(['status' => 'success', 'message' => 'Event Created']);
            }
        } else {
            return redirect()->route('oauthCallback', [$email]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($eventId)
    {
        session_start();
        $calendarId = 'kamaljeet@studiographene.com';
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);

            $service = new Google_Service_Calendar($this->client);
            $event = $service->events->get($calendarId, $eventId);

            if (!$event) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
            }
            return response()->json(['status' => 'success', 'data' => $event]);

        } else {
            return redirect()->route('oauthCallback');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $eventId)
    {
        session_start();
        $calendarId = 'studiographene99@gmail.com';
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $startDateTime = Carbon::parse($request->start_date)->toRfc3339String();

            $eventDuration = 30; //minutes

            if ($request->has('end_date')) {
                $endDateTime = Carbon::parse($request->end_date)->toRfc3339String();

            } else {
                $endDateTime = Carbon::parse($request->start_date)->addMinutes($eventDuration)->toRfc3339String();
            }

            // retrieve the event from the API.
            $event = $service->events->get($calendarId, $eventId);

            $event->setSummary($request->title);

            $event->setDescription($request->description);

            //start time
            $start = new Google_Service_Calendar_EventDateTime();
            $start->setDateTime($startDateTime);
            $event->setStart($start);

            //end time
            $end = new Google_Service_Calendar_EventDateTime();
            $end->setDateTime($endDateTime);
            $event->setEnd($end);

            $updatedEvent = $service->events->update($calendarId, $event->getId(), $event);


            if (!$updatedEvent) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
            }
            return response()->json(['status' => 'success', 'data' => $updatedEvent]);

        } else {
            return redirect()->route('oauthCallback');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($eventId)
    {
        session_start();
        $calendarId = 'studiographene99@gmail.com';
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $service->events->delete($calendarId, $eventId);

        } else {
            return redirect()->route('oauthCallback');
        }
    }

    public function setAttendees($calendarId, $eventId, $email, $accept)
    {
        $event = $this->service->events->get($calendarId, $eventId);
        $attendees = array();
        foreach ($event->attendees as $key => $value) {
            $attendees[] = $value;
        }
        $attendee1 = new Google_Service_Calendar_EventAttendee();
        $attendee1->setEmail($email);
        if ($accept == "true") {
            $attendee1->setResponseStatus('accepted');
        }
        $attendees[] = $attendee1;
        $event->attendees = $attendees;
        $optParams = array('sendNotifications' => true, 'maxAttendees' => 1000);
        $updatedEvent = $this->service->events->update($calendarId, $event->getId(), $event, $optParams);
        return $updatedEvent->getUpdated();
    }

}
