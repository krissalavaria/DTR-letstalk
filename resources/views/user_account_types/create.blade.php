@extends('layouts.app', ['activePage' => 'user_account_types', 'titlePage' => __('User Account Add')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="form" method="POST" action="{{ route('user_account_types.store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Add new Account</h4>
                            </div>
                            <div class="card-body">
                                <div class="bmd-form-group{{ $errors->has('department_id') ? ' has-danger' : '' }}">
                                    <div class="input-group">
                                        <select type="text" name="department_id" class="form-control">
                                            <option value="0" selected>Select Department</option>
                                            @foreach($departments as $dept)
                                                <option value="{{ $dept->ID  }}">{{ $dept->name  }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('department_id'))
                                        <div id="department_id-error" class="error text-danger pl-3" for="department_id"
                                            style="display: block;">
                                            <strong>{{ $errors->first('department_id') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="bmd-form-group{{ $errors->has('account_name') ? ' has-danger' : '' }}">
                                    <div class="input-group">
                                        <input type="text" name="account_name" class="form-control"
                                            placeholder="{{ __('Input Account Name') }}" value="{{ old('account_name') }}"
                                            required>
                                    </div>
                                    @if ($errors->has('account_name'))
                                        <div id="account_name-error" class="error text-danger pl-3" for="account_name"
                                            style="display: block;">
                                            <strong>{{ $errors->first('account_name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="bmd-form-group{{ $errors->has('hourly_rate') ? ' has-danger' : '' }}">
                                    <div class="input-group">
                                        <input type="text" name="hourly_rate" class="form-control"
                                            placeholder="{{ __('Input Hourly Rate') }}" value="{{ old('hourly_rate') }}"
                                            required>
                                    </div>
                                    @if ($errors->has('hourly_rate'))
                                        <div id="hourly_rate-error" class="error text-danger pl-3" for="hourly_rate"
                                            style="display: block;">
                                            <strong>{{ $errors->first('hourly_rate') }}</strong>
                                        </div>
                                    @endif
                                </div><br>
                                <input type="submit" class="btn btn-success" value="SUBMIT">
                                <a href="{{ route('user_account_types.index') }}" class="btn btn-primary">BACK</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
