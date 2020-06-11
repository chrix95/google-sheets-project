<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class SheetController extends Controller
{

    public function updateSheet(Request $request)
    {
        $append = [
            $request->input('firstname'),
            $request->input('lastname'),
            $request->input('age'),
            $request->input('location'),
            $request->input('email')
        ];
        Sheets::spreadsheet(env('POST_SPREADSHEET_ID'))
              ->sheet(env('SPREADSHEET_NAME'))
              ->append([$append]);
        return redirect()->back();
    }

}