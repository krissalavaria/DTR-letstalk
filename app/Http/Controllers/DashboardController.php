<?php

namespace App\Http\Controllers;

use DB;
use App\Orderline;
use App\CustomUser;
use App\TimeSheet;
use App\Product;
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
            ->groupBy('orderhead.order_no', 'user_account.employee_no', 'user_account.first_name', 'user_account.middle_name', 'user_account.last_name', 'orderhead.ID')
            ->selectRaw('sum(orderline.total_amount) as sum, orderhead.order_no, 
                        user_account.employee_no, user_account.first_name, user_account.middle_name, user_account.last_name, orderhead.ID')
            ->where('orderhead.order_status_id', '=', 1)->get();

        return $order_total;
    }

    public function get_order_info()
    {
        $id = \Request('q');

        $order_info = DB::table('orderhead')
            ->where('orderhead.id', 'LIKE', "{$id}")
            ->join('orderline', 'orderhead.order_no', '=', 'orderline.order_no')
            ->join('product', 'product.ID', '=', 'orderline.product_id')
            ->join('product_unit', 'product_unit.ID', '=', 'orderline.product_unit')
            ->join('product_category', 'product_category.ID', '=', 'orderline.product_category_id')
            ->selectRaw('orderline.order_no, orderline.qty, product.product_name, product_unit.unit_name, orderline.product_price')
            ->get();

        return $order_info;
    }

    public function get_menu()
    {
        $products = Product::where('is_active', 1)->get();
        return $products;
    }

    public function overall_orders()
    {
        $date = \Request('q');

        $order = DB::table('orderline')
            ->where('orderline.datetime_created', 'LIKE', "%{$date}%")
            ->select('orderline.product_id', DB::raw('count(*) as total'))
            ->join('product', 'product.ID', '=', 'orderline.product_id')
            ->groupBy('orderline.product_id', 'product.product_name')
            ->selectRaw('product.product_name')
            ->get();

        return $order;
    }

    public function get_users_total()
    {
        $category = \Request('q');
        $date = \Request('date');

        $total_orders = DB::table('orderhead')
            ->where('product_category.product_category_name', 'LIKE', "%{$category}%")
            ->where('orderline.datetime_created', 'LIKE', "%{$date}%")
            ->join('orderline', 'orderline.order_no', '=', 'orderhead.order_no')
            ->join('user_account', 'user_account.id', '=', 'orderhead.user_account_id')
            ->join('product', 'product.ID', '=', 'orderline.product_id')
            ->join('product_category', 'product_category.ID', '=', 'orderline.product_category_id')
            ->selectRaw(
                'orderline.order_no, 
                user_account.employee_no, 
                user_account.first_name, 
                user_account.last_name, 
                user_account.room_cubicle_number,
                product.product_name,
                orderline.qty'
            )->get();

        return $total_orders;
    }
}
