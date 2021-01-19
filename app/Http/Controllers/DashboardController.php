<?php

namespace App\Http\Controllers;

use DB;
use App\CustomUser;
use App\TimeSheet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function reports() {
        // Users Count
        $users = CustomUser::count();

        // Daily Entries Count
        $daily_entries = TimeSheet::whereDate('created_at', DB::raw('CURDATE()'))->get()->count();

        return view('dashboard', compact('users', 'daily_entries'));
    }
}
