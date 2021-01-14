@extends('layouts.app', ['activePage' => 'departments', 'titlePage' => __('Departments List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="form" method="POST" action="{{ route('departments.store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Add new Department</h4>
                            </div>
                            <div class="card-body">
                                <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="{{ __('Input Department Name') }}" value="{{ old('name') }}"
                                            required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                            style="display: block;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div><br>
                                <input type="submit" class="btn btn-success" value="SUBMIT">
                                <a href="{{ route('departments.index') }}" class="btn btn-primary">BACK</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
