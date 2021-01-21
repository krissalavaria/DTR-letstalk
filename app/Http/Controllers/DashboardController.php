<?php

namespace App\Http\Controllers;

use DB;
use App\Orderline;
use App\CustomUser;
use App\TimeSheet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function reports()
    {
        // Users Count
        $users = CustomUser::count();

        // Daily Entries Count
        $daily_entries = TimeSheet::whereDate('created_at', DB::raw('CURDATE()'))->get()->count();

        $order_total = DB::table('orderhead')
            ->join('orderline', 'orderhead.order_no', '=', 'orderline.order_no')
            ->join('user_account', 'user_account.id', '=', 'orderhead.user_account_id')
            ->groupBy('orderhead.order_no', 'user_account.employee_no', 'user_account.first_name', 'user_account.middle_name', 'user_account.last_name')
            ->selectRaw('sum(orderline.total_amount) as sum, orderhead.order_no, 
                        user_account.employee_no, user_account.first_name, user_account.middle_name, user_account.last_name')
            ->where('orderhead.order_status_id', '=', 1)->get();

        return view('dashboard', compact('users', 'daily_entries', 'order_total'));
    }

    public function get_order_total()
    {
        $user_id = \Request('q');

        $order_total = DB::table('orderhead')
            ->where('orderhead.user_account_id', 'LIKE', "%{$user_id}%")
            ->join('orderline', 'orderhead.order_no', '=', 'orderline.order_no')
            ->join('user_account', 'user_account.id', '=', 'orderhead.user_account_id')
            ->groupBy('orderhead.order_no', 'user_account.employee_no', 'user_account.first_name', 'user_account.middle_name', 'user_account.last_name')
            ->selectRaw('sum(orderline.total_amount) as sum, orderhead.order_no, 
                        user_account.employee_no, user_account.first_name, user_account.middle_name, user_account.last_name')
            ->where('orderhead.order_status_id', '=', 1)->get();

            return $order_total;
    }
}
