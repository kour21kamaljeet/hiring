<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Question;

class AdminController extends Controller
{
    //Display all questions 
    public function showQuestions()
    {
        $data['question'] = Question::All();
        return view("questions.index",compact('data'));
    }

    //Show view to add new question
    public function createQuestions()
    {
        return view("questions.create");
    }

    //Saves new question
    public function storeQuestion(Request $request)
    {
        $input = $request->input();
        $question=new Question;
                $question->question = $input['question'];
                $question->answera = $input['answera'];
                $question->answerb = $input['answerb'];
                $question->answerc = $input['answerc'];
                $question->answerd = $input['answerd'];
                $question->correct = $input['correct'];
                $question->save();
        $data['question'] = Question::All();
        return view("questions.index",compact('data'));               
    }

    //Deletes the question 
    public function deleteQuestion($id)
    {
      Question::where('id', $id)->delete();
      $data['question'] = Question::All();
      return view("questions.index",compact('data'));
    }

    //Show view to update question
    public function editQuestion($id)
    {
      $question=Question::where('id', $id)->first();
      $data['question']=$question;
      return view('questions.edit',compact('data'));
    }

    //Update question
    public function updateQuestion(Request $request, $id)
    {
      $question=Question::find($id);
      $input = $request->input();
                $question->question = $input['question'];
                $question->answera = $input['answera'];
                $question->answerb = $input['answerb'];
                $question->answerc = $input['answerc'];
                $question->answerd = $input['answerd'];
                $question->correct = $input['correct'];
                $question->save();
     $data['question'] = Question::All();
     return view("questions.index",compact('data')); 
    }
}
