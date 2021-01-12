<?php

namespace App\Http\Controllers;

use App\CustomUser;
use App\TimeSheet;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VueQrCodeReader extends Controller
{

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
}
