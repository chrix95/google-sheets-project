<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $sheets = Sheets::spreadsheet(env('POST_SPREADSHEET_ID'))
                        ->sheet('DataSheet')
                        ->get();
        $headerRemoved = $sheets->pull(0); // remove header from the google sheet
        $header = [
            'firstName',
            'lastName',
            'age',
            'location',
            'email'
        ];
        $users = Sheets::collection($header, $sheets);
        $users = $users->reverse();
        return view('welcome')->with(compact('users'));
    }
}