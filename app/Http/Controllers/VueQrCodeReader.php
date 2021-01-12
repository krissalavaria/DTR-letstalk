<?php

namespace App\Http\Controllers;

use DB;
use App\CustomUser;
use App\TimeSheet;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VueQrCodeReader extends Controller
{

    public function index() {
        $time_sheets = TimeSheet::with('users')->get();
        return response()->json($time_sheets);
    }

    public function get_users_temp() {
        $user_id = \Request('q');

        $users = DB::table('user_account')
        ->where('user_account.id', 'LIKE', "%{$user_id}%")
        ->join('time_sheet', 'user_account.id', '=', 'time_sheet.user_account_id')
        ->select('user_account.*', 'time_sheet.temperature', 'time_sheet.created_at')
        ->get();
        
        return $users;
    }

    public function insert_entry(Request $request)
    {
        $time_sheet = new TimeSheet([
            'user_account_id' => $request->input('user_account_id'),
            'temperature' => $request->input('temperature'),
            'created_at' => now(),
        ]);
        $time_sheet->save();
 
        return response()->json('Entry saved!');
    }

    public function search_user()
    {
        $auth_token = \Request('q');

        $user = CustomUser::where('auth_token', 'LIKE', "%{$auth_token}%")->get();

        return response()->json(['user' => $user], Response::HTTP_OK);
    }


    public function get_all_users()
    {
        $users = CustomUser::all()->toArray();
        return array_reverse($users);
    }

}
