<?php

namespace App\Http\Controllers;

use App\Departments;
use App\UserAccountType;
use Illuminate\Http\Request;

class UserAccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_account_types = UserAccountType::latest()->paginate(5);

        return view('user_account_types.index', compact('user_account_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Departments::all();
        return view('user_account_types.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UserAccountType::create([
            'account_name' => $request['account_name'],
            'hourly_rate' => $request['hourly_rate'],
            'department_id' => $request['department_id'],
        ]);

        return redirect()->route('user_account_types.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserAccountType  $user_account_types
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAccountType $user_account_type)
    {
        $departments = Departments::all();
        return view('user_account_types.edit', compact('user_account_type', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserAccountType  $user_account_types
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        UserAccountType::where('ID', $id)->update(
            array(
                'account_name' => $request['account_name'], 
                'hourly_rate' => $request['hourly_rate'],
                'department_id' => $request['department_id'],
            ));

        return redirect()->route('user_account_types.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserAccountType  $user_account_types
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserAccountType::where('ID', $id)->delete();

        return redirect()->route('user_account_types.index')
            ->with('success', 'Product updated successfully');
    }

}
