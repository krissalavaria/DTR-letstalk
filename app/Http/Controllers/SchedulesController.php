<?php

namespace App\Http\Controllers;

use DB;
use App\CustomUser;
use App\Schedules;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CustomUser $model)
    {
        return view('schedules.index', ['users' => $model->paginate(7)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedules = Schedules::find($id);
        return view('schedules.edit', compact('schedules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = $request['user_account_id'];
        $employee_rate_id = $request['ID'];
        $no_hours = $request['no_hours'];

        $total_amount = DB::table('user_account')
        ->where('user_account.id', 'LIKE', "{$user_id}")
        ->join('user_account_type', 'user_account.user_acct_type_id', '=', 'user_account_type.ID')
        ->join('employee_rate', 'employee_rate.user_account_id', '=', 'user_account.id')
        ->where('employee_rate.ID', 'LIKE', "{$employee_rate_id}")
        ->selectRaw("sum(user_account_type.hourly_rate * '$no_hours') as total")->first();

        Schedules::where('ID', $id)->update(
            array(
                'no_classes' => $request['no_classes'],
                'no_hours' => $request['no_hours'],
                'total_amount' => $total_amount->total,
            )
        );

        return redirect()->route('schedules.index')
            ->with('success', 'Schedule updated successfully');
    }

    public function get_total()
    {
        $id = \Request('q');

        $query = DB::table('user_account')
        ->where('user_account.id', 'LIKE', "%{$id}%")
        ->join('user_account_type', 'user_account.user_acct_type_id', '=', 'user_account_type.ID')
        ->join('employee_rate', 'employee_rate.user_account_id', '=', 'user_account.id')
        ->where('employee_rate.ID', '=', 1)
        ->selectRaw('sum(user_account_type.hourly_rate * employee_rate.no_hours) as total')->first();
        
        return $query->total;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Returns all User Schedules
     */
    public function schedules($id)
    {
        $schedules = DB::table('user_account')
        ->where('user_account.id', 'LIKE', "{$id}")
        ->join('employee_rate', 'employee_rate.user_account_id', '=', 'user_account.id')
        ->select('employee_rate.*', 'user_account.first_name', 'user_account.last_name', 'user_account.id')->get();
        
        return view('schedules.schedules', compact('schedules'));
    }
}
