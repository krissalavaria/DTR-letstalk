@extends('layouts.app', ['activePage' => 'designations', 'titlePage' => __('Designation Add')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="form" method="POST" action="{{ route('designations.store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Add new Designation</h4>
                            </div>
                            <div class="card-body">
                                <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="{{ __('Input Designation Name') }}" value="{{ old('name') }}"
                                            required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                            style="display: block;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="bmd-form-group{{ $errors->has('job_description') ? ' has-danger' : '' }}">
                                    <div class="input-group">
                                        <input type="text" name="job_description" class="form-control"
                                            placeholder="{{ __('Input Job Description') }}" value="{{ old('job_description') }}"
                                            required>
                                    </div>
                                    @if ($errors->has('job_description'))
                                        <div id="job_description-error" class="error text-danger pl-3" for="job_description"
                                            style="display: block;">
                                            <strong>{{ $errors->first('job_description') }}</strong>
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
