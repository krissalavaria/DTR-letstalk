@extends('layouts.app', ['activePage' => 'departments', 'titlePage' => __('Departments List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="form" method="POST" action="{{ route('departments.update', $department->ID) }}">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Add new Department</h4>
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
                                    <input type="text" class="form-control" name="name" value="{{ $department->name }}">
                                </div><br>
                                <input type="submit" class="btn btn-success">
                                <a href="{{ route('departments.index') }}" class="btn btn-primary">BACK</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
