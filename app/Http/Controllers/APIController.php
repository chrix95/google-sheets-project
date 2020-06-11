<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Revolution\Google\Sheets\Facades\Sheets;

class APIController extends Controller
{

    public function createRecord(Request $request)
    {
      $data = array(
        'sheet' => $request->sheet
      );
      $validator = \Validator::make($data, [
        'sheet'   =>  'required|array'
      ]);
      if($validator->fails()) {
        return response()->json([
          'status'  =>  422,
          'errors'  =>  $validator->errors()
        ], 422);
      }
      $length = count($data['sheet']);
      $count = 0;
      for ($i=0; $i < $length; $i++)  { 
        $append = [
          $data['sheet'][$i]['firstname'],
          $data['sheet'][$i]['lastname'],
          $data['sheet'][$i]['age'],
          $data['sheet'][$i]['location'],
          $data['sheet'][$i]['email']
        ];
        Sheets::spreadsheet(env('POST_SPREADSHEET_ID'))
              ->sheet(env('SPREADSHEET_NAME'))
              ->append([$append]);
        $count += 1;
      }
      return response()->json([
        'status'  =>  200,
        'message' =>  'Successful',
        'total_upload' => $count
      ], 200);
    }

}
