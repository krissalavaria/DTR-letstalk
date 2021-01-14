@extends('layouts.app', ['activePage' => 'designations', 'titlePage' => __('Edit Designation')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="form" method="POST" action="{{ route('designations.update', $designation->ID) }}">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Update Designation</h4>
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
                                    <input type="text" class="form-control" name="name" value="{{ $designation->name }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="job_description" value="{{ $designation->job_description }}">
                                </div><br>
                                <input type="submit" class="btn btn-success">
                                <a href="{{ route('designations.index') }}" class="btn btn-primary">BACK</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
