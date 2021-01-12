@extends('layouts.app', ['activePage' => 'manage-users', 'titlePage' => __('Users List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ route('add-new-users') }}">Add new User</a>
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="card">
                            <div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div><br>
                                @endif
                            </div>

                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Users List</h4>
                                <p class="card-category">Manage users list</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 d-flex">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Employee #:</strong>
                                                <input type="text" class="form-control" name="employee_no"
                                                    value="{{ $user->employee_no }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <strong>Firstname:</strong>
                                                <input type="text" class="form-control" name="first_name"
                                                    value="{{ $user->first_name }}">
                                            </div>
                                            <div class="form-group">
                                                <strong>Middlename:</strong>
                                                <input type="text" class="form-control" name="middle_name"
                                                    value="{{ $user->middle_name }}">
                                            </div>
                                            <div class="form-group">
                                                <strong>Lastname:</strong>
                                                <input type="text" class="form-control" name="last_name"
                                                    value="{{ $user->last_name }}">
                                            </div>
                                            <div class="form-group">
                                                <strong>Gender:</strong>
                                                <select type="text" class="form-control" name="gender">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <strong>Birthdate:</strong>
                                                <input type="date" class="form-control" name="birthday"
                                                    value="{{ $user->birthday }}">
                                            </div>
                                            <div class="form-group">
                                                <strong>Contact #:</strong>
                                                <input type="text" class="form-control" name="contact_number"
                                                    value="{{ $user->contact_number }}">
                                            </div>
                                            <div class="form-group">
                                                <strong>Contact Person:</strong>
                                                <input type="text" class="form-control" name="contact_person"
                                                    value="{{ $user->contact_person }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Block/Door#:</strong>
                                                <input class="form-control" name="blk_door" value="{{ $user->blk_door }}">
                                            </div>
                                            <div class="form-group">
                                                <strong>Street:</strong>
                                                <input class="form-control" name="street" value="{{ $user->street }}">
                                            </div>
                                            <div class="form-group">
                                                <strong>Barangay:</strong>
                                                    <select class="form-control" name="barangay_id">
                                                        <option value="{{ $user->barangay_id }}" selected>Update
                                                            Barangay</option>
                                                        @foreach ($barangays as $barangay)
                                                            <option value="{{ $barangay->id }}">
                                                                {{ $barangay->desc }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <div class="form-group">
                                                <strong>City/Municipality:</strong>
                                                <select class="form-control" name="city_municipality_id">
                                                    <option value="{{ $user->city_municipality_id }}" selected>Update
                                                        Cities</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">
                                                            {{ $city->citymun_desc }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <strong>Province:</strong>
                                                <select class="form-control" name="province_id">
                                                    <option value="{{ $user->province_id }}" selected>Update Province
                                                    </option>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}">
                                                            {{ $province->prov_desc }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <strong>Company Profile:</strong>
                                                <input class="form-control" name="company_profile_id"
                                                    value="{{ $user->company_profile_id }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <strong>Department:</strong>
                                                <select class="form-control" name="department_id">
                                                    <option value="{{ $user->department_id }}" selected>Update Department
                                                    </option>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}">
                                                            {{ $department->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <strong>Designation:</strong>
                                                <select class="form-control" name="designation_id">
                                                    <option value="{{ $user->designation_id }}" selected>Update Designation
                                                    </option>
                                                    @foreach ($designations as $designation)
                                                        <option value="{{ $designation->id }}">
                                                            {{ $designation->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-warning float-right" value="Update">
                                                <a href="{{ route('manage-users') }}"
                                                    class="btn btn-primary float-right">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
