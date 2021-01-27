@extends('layouts.app', ['activePage' => 'schedules', 'titlePage' => __('Edit Designation')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="form" method="POST" action="{{ route('schedules.update', $schedules->ID) }}">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Update Class Schedule</h4>
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
                                    <input type="number" class="form-control" name="user_account_id" value="{{ $schedules->user_account_id }}" hidden>
                                    <input type="number" class="form-control" name="ID" value="{{ $schedules->ID }}" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="no_classses">No. of Classes</label>
                                    <input type="number" class="form-control" name="no_classes" value="{{ $schedules->no_classes }}">
                                </div>
                                <div class="form-group">
                                    <label for="no_hours">No. of Hours</label>
                                    <input type="number" class="form-control" name="no_hours" value="{{ $schedules->no_hours }}">
                                </div>
                                <div class="form-group">
                                    <label for="class_date">Class Date</label>
                                    <input type="date" class="form-control" name="class_date" value="{{ $schedules->class_date }}">
                                </div>
                                <input type="submit" class="btn btn-success">
                                <a href="{{ route('schedules.index') }}" class="btn btn-primary">BACK</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
