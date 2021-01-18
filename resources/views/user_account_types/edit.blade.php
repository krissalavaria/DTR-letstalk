@extends('layouts.app', ['activePage' => 'user_account_types', 'titlePage' => __('Edit User Account Types')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="form" method="POST" action="{{ route('user_account_types.update', $user_account_type->ID) }}">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Update User Account Type</h4>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <select type="text" name="department_id" class="form-control">
                                        <option value="0" selected>Select Department</option>
                                        @foreach($departments as $dept)
                                            <option value="{{ $dept->ID  }}">{{ $dept->name  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="account_name" value="{{ $user_account_type->account_name }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="hourly_rate" value="{{ $user_account_type->hourly_rate }}">
                                </div><br>
                                <input type="submit" class="btn btn-success">
                                <a href="{{ route('user_account_types.index') }}" class="btn btn-primary">BACK</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
