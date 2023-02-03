<?php

namespace Database\Seeders;
use Illuminate\Database\migrations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country_codes')->delete();
        $countries= array(
        /*    array(
                'prefix'=>'US',
               'name'=>'United States'
            ),
            array(
                'prefix'=>'CA',
                'name'=>'Canada'
            ),
            array(
                'code' => 'AF',
                'name' => 'Afghanistan'
            ),
            array(
                'prefix' => 'AL',
                'name' => 'Albania'
            ),
            array(
                'prefix' => 'DZ',
                'name' => 'Algeria'
            ),
            array(
                'prefix' => 'DS',
                'name' => 'American Samoa'
            ),
            array(
                 'prefix' => 'AD',
                'name' => 'Andorra'
            ),
            array(
                'prefix' => 'AO',
                'name' => 'Angola'
            ),
            array(
                'prefix' => 'AI',
                'name' => 'Anguilla'
            ),
            array(
                'prefix' => 'AQ',
                'name' => 'Antarctica'
            ),
            array(
                'prefix' => 'AG',
                'name' => 'Antigua and/or Barbuda'
            ),
            array(
                'prefix' => 'AR',
                'name' => 'Argentina'
            ),
            array(
                'prefix' => 'AM',
                'name' => 'Armenia'
            ),
            array(
               'prefix' => 'AW',
                'name' => 'Aruba'
            ),
            array(
                'prefix' => 'AU',
                'name' => 'Australia'
            ),
            array(
                'prefix' => 'AT',
                'name' => 'Austria'
            ),
            array(
                'prefix' => 'AZ',
                'name' => 'Azerbaijan'
            ),
            array(
                'prefix' => 'BS',
                'name' => 'Bahamas'
            ),
            array(
                'prefix' => 'BH',
                'name' => 'Bahrain'
            ),
            array(
                 'prefix' => 'BD',
                'name' => 'Bangladesh'
            ),
            array(
                 'prefix' => 'BB',
                'name' => 'Barbados'
            ),
            array(
                'prefix' => 'BY',
                'name' => 'Belarus'
            ),
            array(
                'prefix' => 'BE',
                'name' => 'Belgium'
            ),
            array(
                'prefix' => 'BZ',
                'name' => 'Belize'
            ),
            array(
                 'prefix' => 'BJ',
                'name' => 'Benin'
            ),
            array(
                'prefix' => 'BM',
                'name' => 'Bermuda'
            ),
            array(
                'prefix' => 'BT',
                'name' => 'Bhutan'
            ),
            array(
                'prefix' => 'BO',
                'name' => 'Bolivia'
            ),
            array(
                'prefix' => 'BA',
                'name' => 'Bosnia and Herzegovina'
            ),
            array(
                 'prefix' => 'BW',
                'name' => 'Botswana'
            ),
            array(
                'prefix' => 'BV',
                'name' => 'Bouvet Island'
            ),
            array(
                'prefix' => 'BR',
                'name' => 'Brazil'
            ),
            array(
                'prefix' => 'IO',
                'name' => 'British lndian Ocean Territory'
            ),
            array(
                'prefix' => 'BN',
                'name' => 'Brunei Darussalam'
            ),
            array(
                'prefix' => 'BG',
                'name' => 'Bulgaria'
            ),
            array(
                'prefix' => 'BF',
                'name' => 'Burkina Faso'
            ),
            array(
                 'prefix' => 'BI',
                'name' => 'Burundi'
            ),
            array(
                'prefix' => 'KH',
                'name' => 'Cambodia'
            ),
            array(
                'prefix' => 'CM',
                'name' => 'Cameroon'
            ),
            array(
                'prefix' => 'CV',
                'name' => 'Cape Verde'
            ),
            array(
                'prefix' => 'KY',
                'name' => 'Cayman Islands'
            ),
            array(
                'prefix' => 'CF',
                'name' => 'Central African Republic'
            ),
            array(
                'prefix' => 'TD',
                'name' => 'Chad'
            ),
            array(
                'prefix' => 'CL',
                'name' => 'Chile'
            ),
            array(
                'prefix' => 'CN',
                'name' => 'China'
            ),
            array(
                'prefix' => 'CX',
                'name' => 'Christmas Island'
            ),
            array(
                'prefix' => 'CC',
                'name' => 'Cocos (Keeling) Islands'
            ),
            array(
                'prefix' => 'CO',
                'name' => 'Colombia'
            ),
            array(
                'prefix' => 'KM',
                'name' => 'Comoros'
            ),
            array(
                'prefix' => 'CG',
                'name' => 'Congo'
            ),
            array(
                'prefix' => 'CK',
                'name' => 'Cook Islands'
            ),
            array(
                'prefix' => 'CR',
                'name' => 'Costa Rica'
            ),
            array(
                'prefix' => 'HR',
                'name' => 'Croatia (Hrvatska)'
            ),
            array(
                'prefix' => 'CU',
                'name' => 'Cuba'
            ),
            array(
                'prefix' => 'CY',
                'name' => 'Cyprus'
            ),
            array(
                'prefix' => 'CZ',
                'name' => 'Czech Republic'
            ),
            array(
                'prefix' => 'DK',
                'name' => 'Denmark'
            ),
            array(
                'prefix' => 'DJ',
                'name' => 'Djibouti'
            ),
            array(
                'prefix' => 'DM',
                'name' => 'Dominica'
            ),
            array(
                'prefix' => 'DO',
                'name' => 'Dominican Republic'
            ),
            array(
                'prefix' => 'TP',
                'name' => 'East Timor'
            ),
            array(
                'prefix' => 'EC',
                'name' => 'Ecudaor'
            ),
            array(
                'prefix' => 'EG',
                'name' => 'Egypt'
            ),
            array(
                'prefix' => 'SV',
                'name' => 'El Salvador'
            ),
            array(
                'prefix' => 'GQ',
                'name' => 'Equatorial Guinea'
            ),
            array(
                'prefix' => 'ER',
                'name' => 'Eritrea'
            ),
            array(
                'prefix' => 'EE',
                'name' => 'Estonia'
            ),
            array(
                'prefix' => 'ET',
                'name' => 'Ethiopia'
            ),
            array(
                'prefix' => 'FK',
                'name' => 'Falkland Islands (Malvinas)'
            ),
            array(
                'prefix' => 'FO',
                'name' => 'Faroe Islands'
            ),
            array(
                'prefix' => 'FJ',
                'name' => 'Fiji'
            ),
            array(
                'prefix' => 'FI',
                'name' => 'Finland'
            ),
            array(
                'prefix' => 'FR',
                'name' => 'France'
            ),
            array(
                'prefix' => 'FX',
                'name' => 'France, Metropolitan'
            ),
            array(
                'prefix' => 'GF',
                'name' => 'French Guiana'
            ),
            array(
                'prefix' => 'PF',
                'name' => 'French Polynesia'
            ),
            array(
                'prefix' => 'TF',
                'name' => 'French Southern Territories'
            ),
            array(
                'prefix' => 'GA',
                'name' => 'Gabon'
            ),
            array(
                'prefix' => 'GM',
                'name' => 'Gambia'
            ),
            array(
                'prefix' => 'GE',
                'name' => 'Georgia'
            ),
            array(
                'prefix' => 'DE',
                'name' => 'Germany'
            ),
            array(
                'prefix' => 'GH',
                'name' => 'Ghana'
            ),
            array(
                 'prefix' => 'GI',
                'name' => 'Gibraltar'
            ),
            array(
                'prefix' => 'GR',
                'name' => 'Greece'
            ),
            array(
                'prefix' => 'GL',
                'name' => 'Greenland'
            ),
            array(
                'prefix' => 'GD',
                'name' => 'Grenada'
            ),
            array(
                'prefix' => 'GP',
                'name' => 'Guadeloupe'
            ),
            array(
                'prefix' => 'GU',
                'name' => 'Guam'
            ),
            array(
                'prefix' => 'GT',
                'name' => 'Guatemala'
            ),
            array(
                'prefix' => 'GN',
                'name' => 'Guinea'
            ),
            array(
                'prefix' => 'GW',
                'name' => 'Guinea-Bissau'
            ),
            array(
                'prefix' => 'GY',
                'name' => 'Guyana'
            ),
            array(
                'prefix' => 'HT',
                'name' => 'Haiti'
            ),
            array(
                'prefix' => 'HM',
                'name' => 'Heard and Mc Donald Islands'
            ),
            array(
                'prefix' => 'HN',
                'name' => 'Honduras'
            ),
            array(
                'prefix' => 'HK',
                'name' => 'Hong Kong'
            ),
            array(
                'prefix' => 'HU',
                'name' => 'Hungary'
            ),
            array(
               'prefix' => 'IS',
                'name' => 'Iceland'
            ),*/
            array(
                    'name' => 'India',
                    'prefix' => '+91'
            ),/*
            array(
                'prefix' => 'ID',
                'name' => 'Indonesia'
            ),
            array(
                'prefix' => 'IR',
                'name' => 'Iran (Islamic Republic of)'
            ),
            array(
                'prefix' => 'IQ',
                'name' => 'Iraq'
            ),
            array(
                'prefix' => 'IE',
                'name' => 'Ireland'
            ),
            array(
                'prefix' => 'IL',
                'name' => 'Israel'
            ),
            array(
                'prefix' => 'IT',
                'name' => 'Italy'
            ),
            array(
                'prefix' => 'CI',
                'name' => 'Ivory Coast'
            ),
            array(
                'prefix' => 'JM',
                'name' => 'Jamaica'
            ),
            array(
                'prefix' => 'JP',
                'name' => 'Japan'
            ),
            array(
                'prefix' => 'JO',
                'name' => 'Jordan'
            ),
            array(
                'prefix' => 'KZ',
                'name' => 'Kazakhstan'
            ),
            array(
                'prefix' => 'KE',
                'name' => 'Kenya'
            ),
            array(
                'prefix' => 'KI',
                'name' => 'Kiribati'
            ),
            array(
                'prefix' => 'KP',
                'name' => 'Korea, Democratic People\'s Republic of'
            ),
            array(
                'prefix' => 'KR',
                'name' => 'Korea, Republic of'
            ),
            array(
                'prefix' => 'KW',
                'name' => 'Kuwait'
            ),
            array(
                'prefix' => 'KG',
                'name' => 'Kyrgyzstan'
            ),
            array(
                'prefix' => 'LA',
                'name' => 'Lao People\'s Democratic Republic'
            ),
            array(
                'prefix' => 'LV',
                'name' => 'Latvia'
            ),
            array(
                'prefix' => 'LB',
                'name' => 'Lebanon'
            ),
            array(
                'prefix' => 'LS',
                'name' => 'Lesotho'
            ),
            array(
                'prefix' => 'LR',
                'name' => 'Liberia'
            ),
            array(
                'prefix' => 'LY',
                'name' => 'Libyan Arab Jamahiriya'
            ),
            array(
                'prefix' => 'LI',
                'name' => 'Liechtenstein'
            ),
            array(
                'prefix' => 'LT',
                'name' => 'Lithuania'
            ),
            array(
                'prefix' => 'LU',
                'name' => 'Luxembourg'
            ),
            array(
                'prefix' => 'MO',
                'name' => 'Macau'
            ),
            array(
                'prefix' => 'MK',
                'name' => 'Macedonia'
            ),
            array(
                'prefix' => 'MG',
                'name' => 'Madagascar'
            ),
            array(
                'prefix' => 'MW',
                'name' => 'Malawi'
            ),
            array(
                'prefix' => 'MY',
                'name' => 'Malaysia'
            ),
            array(
                'prefix' => 'MV',
                'name' => 'Maldives'
            ),
            array(
                'prefix' => 'ML',
                'name' => 'Mali'
            ),
            array(
                'prefix' => 'MT',
                'name' => 'Malta'
            ),
            array(
                'id' => 134,
                'prefix' => 'MH',
                'name' => 'Marshall Islands'
            ),
            array(
                'prefix' => 'MQ',
                'name' => 'Martinique'
            ),
            array(
                'prefix' => 'MR',
                'name' => 'Mauritania'
            ),
            array(
                'prefix' => 'MU',
                'name' => 'Mauritius'
            ),
            array(
                'prefix' => 'TY',
                'name' => 'Mayotte'
            ),
            array(
                'prefix' => 'MX',
                'name' => 'Mexico'
            ),
            array(
                'prefix' => 'FM',
                'name' => 'Micronesia, Federated States of'
            ),
            array(
                'prefix' => 'MD',
                'name' => 'Moldova, Republic of'
            ),
            array(
                'prefix' => 'MC',
                'name' => 'Monaco'
            ),
            array(
               'prefix' => 'MN',
                'name' => 'Mongolia'
            ),
            array(
                'prefix' => 'MS',
                'name' => 'Montserrat'
            ),
            array(
                'prefix' => 'MA',
                'name' => 'Morocco'
            ),
            array(
               'prefix' => 'MZ',
                'name' => 'Mozambique'
            ),
            array(
               'prefix' => 'MM',
                'name' => 'Myanmar'
            ),
            array(
            
                'prefix' => 'NA',
                'name' => 'Namibia'
            ),
            array(
            
                'prefix' => 'NR',
                'name' => 'Nauru'
            ),
            array(
                'prefix' => 'NP',
                'name' => 'Nepal'
            ),
            array(
                'prefix' => 'NL',
                'name' => 'Netherlands'
            ),
            array(
                'prefix' => 'AN',
                'name' => 'Netherlands Antilles'
            ),
            array(
                'prefix' => 'NC',
                'name' => 'New Caledonia'
            ),
            array(
                'prefix' => 'NZ',
                'name' => 'New Zealand'
            ),
            array(
                'prefix' => 'NI',
                'name' => 'Nicaragua'
            ),
            array(
                'prefix' => 'NE',
                'name' => 'Niger'
            ),
            array(
                'prefix' => 'NG',
                'name' => 'Nigeria'
            ),
            array(
               'prefix' => 'NU',
                'name' => 'Niue'
            ),
            array(
               'prefix' => 'NF',
                'name' => 'Norfork Island'
            ),
            array(
               'prefix' => 'MP',
                'name' => 'Northern Mariana Islands'
            ),
            array(
              'prefix' => 'NO',
                'name' => 'Norway'
            ),
            array(
               'prefix' => 'OM',
                'name' => 'Oman'
            ),
            array(
               'prefix' => 'PK',
                'name' => 'Pakistan'
            ),
            array(
                'prefix' => 'PW',
                'name' => 'Palau'
            ),
            array(
                'prefix' => 'PA',
                'name' => 'Panama'
            ),
            array(
                'prefix' => 'PG',
                'name' => 'Papua New Guinea'
            ),
            array(
                'prefix' => 'PY',
                'name' => 'Paraguay'
            ),
            array(
               'prefix' => 'PE',
                'name' => 'Peru'
            ),
            array(
                'prefix' => 'PH',
                'name' => 'Philippines'
            ),
            array(
                'prefix' => 'PN',
                'name' => 'Pitcairn'
            ),
            array(
               'prefix' => 'PL',
                'name' => 'Poland'
            ),*/
            array(
                'name' => 'Portugal',
                'prefix' => '+351'
            ),
        /*    array(
                'prefix' => 'PR',
                'name' => 'Puerto Rico'
            ),
            array(
                'prefix' => 'QA',
                'name' => 'Qatar'
            ),
            array(
               'prefix' => 'RE',
                'name' => 'Reunion'
            ),
            array(
                'prefix' => 'RO',
                'name' => 'Romania'
            ),
            array(
                'prefix' => 'RU',
                'name' => 'Russian Federation'
            ),
            array(
                'prefix' => 'RW',
                'name' => 'Rwanda'
            ),
            array(
                'prefix' => 'KN',
                'name' => 'Saint Kitts and Nevis'
            ),
            array(
                'prefix' => 'LC',
                'name' => 'Saint Lucia'
            ),
            array(
                'prefix' => 'VC',
                'name' => 'Saint Vincent and the Grenadines'
            ),
            array(
                'prefix' => 'WS',
                'name' => 'Samoa'
            ),
            array(
               'prefix' => 'SM',
                'name' => 'San Marino'
            ),
            array(
                'prefix' => 'ST',
                'name' => 'Sao Tome and Principe'
            ),
            array(
                'prefix' => 'SA',
                'name' => 'Saudi Arabia'
            ),
            array(
                'prefix' => 'SN',
                'name' => 'Senegal'
            ),
            array(
                'prefix' => 'SC',
                'name' => 'Seychelles'
            ),
            array(
               'prefix' => 'SL',
                'name' => 'Sierra Leone'
            ),
            array(
                'prefix' => 'SG',
                'name' => 'Singapore'
            ),
            array(
               'prefix' => 'SK',
                'name' => 'Slovakia'
            ),
            array(
                'prefix' => 'SI',
                'name' => 'Slovenia'
            ),
            array(
                'prefix' => 'SB',
                'name' => 'Solomon Islands'
            ),
            array(
                'prefix' => 'SO',
                'name' => 'Somalia'
            ),
            array(
                'prefix' => 'ZA',
                'name' => 'South Africa'
            ),
            array(
               'prefix' => 'GS',
                'name' => 'South Georgia South Sandwich Islands'
            ),
            array(
                'prefix' => 'ES',
                'name' => 'Spain'
            ),
            array(
                'prefix' => 'LK',
                'name' => 'Sri Lanka'
            ),
            array(
                'prefix' => 'SH',
                'name' => 'St. Helena'
            ),
            array(
               'prefix' => 'PM',
                'name' => 'St. Pierre and Miquelon'
            ),
            array(
                'prefix' => 'SD',
                'name' => 'Sudan'
            ),
            array(
                'prefix' => 'SR',
                'name' => 'Suriname'
            ),
            array(
                'prefix' => 'SJ',
                'name' => 'Svalbarn and Jan Mayen Islands'
            ),
            array(
                'prefix' => 'SZ',
                'name' => 'Swaziland'
            ),
            array(
                 'prefix' => 'SE',
                'name' => 'Sweden'
            ),*/
            array(
                'name' => 'Switzerland',
                'prefix' => '+41'
            ),/*
            array(
                'prefix' => 'SY',
                'name' => 'Syrian Arab Republic'
            ),
            array(
               'prefix' => 'TW',
                'name' => 'Taiwan'
            ),
            array(
               'prefix' => 'TJ',
                'name' => 'Tajikistan'
            ),
            array(
               'prefix' => 'TZ',
                'name' => 'Tanzania, United Republic of'
            ),
            array(
               'prefix' => 'TH',
                'name' => 'Thailand'
            ),
            array(
                'prefix' => 'TG',
                'name' => 'Togo'
            ),
            array(
                'prefix' => 'TK',
                'name' => 'Tokelau'
            ),
            array(
               'prefix' => 'TO',
                'name' => 'Tonga'
            ),
            array(
               'prefix' => 'TT',
                'name' => 'Trinidad and Tobago'
            ),*/
            array(
                'name' => 'Tunisia',
                    'prefix' => '+216'
            ),
            array(
                'name' => 'Turkey',
                    'prefix' => '+90'
            ),
            array(
                'name' => 'Turkmenistan',
                    'prefix' => '+993'
            ),
        /*    array(
                'name' => 'Turks and Caicos Islands',
                    'prefix' => 'TC'
            ),*/
            array(
                'name' => 'Tuvalu',
                   'prefix' => '+688'
            ),
            array(
                 'name' => 'Uganda',
                    'prefix' => '+256'
            ),
            array(
               'name' => 'Ukraine',
                    'prefix' => '+380'
            ),
          /*  array(
                'name' => 'United Arab Emirates',
                    'prefix' => 'AE'
            ),
            array(
                'name' => 'United Kingdom',
                   'prefix' => 'GB'
            ),
            array(
                'name' => 'United States minor outlying islands',
                    'prefix' => 'UM'
            ),*/
            array(
                'name' => 'Uruguay',
                   'prefix' => '+598'
            ),
            array(
                'name' => 'Uzbekistan',
                 'prefix' => '+998'
            ),
            array(
                'name' => 'Vanuatu',
                    'prefix' => '+678'
            ),
          /*  array(
                'name' => 'Vatican City State',
                   'prefix' => 'VA'
            ),*/
            array(
                'name' => 'Venezuela',
                   'prefix' => '+58'
            ),
            array(
                'name' => 'Vietnam',
                    'prefix' => '+84'
            ),
        /*    array(
                 'name' => 'Virigan Islands (British)',
                 'prefix' => 'VG'
            ),
            array(
                 'name' => 'Virgin Islands (U.S.)',
                    'prefix' => 'VI'
            ),
            array(
               'name' => 'Wallis and Futuna Islands',
               'prefix' => 'WF'
            ),
            array(
               'name' => 'Western Sahara',
               'prefix' => 'EH'
            ),*/
            array(
               'name' => 'Yemen',
               'prefix' => '+967'
                
            ),
            array(
                'name' => 'Yugoslavia',
                 'prefix' => '+381'
            ),
            array(
                'name' => 'Zaire',
                'prefix' => '+243'
            ),
            array(
                'name' => 'Zambia',
                'prefix' => '+260'
            ),
            array(
                'name' => 'Zimbabwe',
                'prefix' => '+263'
            )
        
       );
        DB::table('country_codes')->insert($countries);
    }
}
