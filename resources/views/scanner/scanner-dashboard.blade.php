@extends('layouts.app', ['activePage' => 'manage-users', 'titlePage' => __('Users List')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ route('scanner-entry') }}">Scan Entries</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">List of Employees In and Out</h4>
                            <p class="card-category">Manage Employees Entries</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="col-sm-12 d-flex">
                                    <div class="table-responsive">
                                        <div id="app">
                                          <time-sheet-component></time-sheet-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
