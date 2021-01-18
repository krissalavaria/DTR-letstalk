@extends('layouts.app', ['activePage' => 'employee-profile', 'titlePage' => __('Time Records List')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Daily Time Records</h4>
                        <p class="card-category">List of your time records.</p>
                    </div>
                    <div class="card-body">
                        <div id="app">
                            <employee-time-sheet :auth_user="{{ Auth::user() }}"></employee-time-sheet>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection