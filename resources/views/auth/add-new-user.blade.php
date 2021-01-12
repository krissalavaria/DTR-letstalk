@extends('layouts.app', ['activePage' => 'manage-users', 'titlePage' => __('Add User')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row" >
                <div class="col-md-6">
                    <form class="form" method="POST" action="{{ route('add-user') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Add new User Account</h4>
                                <p class="card-category"> Here is a subtitle for this table</p>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="bmd-form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <input type="text" name="username" class="form-control"
                                                   placeholder="{{ __('Username...') }}"
                                                   value="{{ old('username') }}" required>
                                        </div>
                                        @if ($errors->has('username'))
                                            <div id="username-error" class="error text-danger pl-3" for="username"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                              </span>
                                            </div>
                                            <input type="password" name="password" id="password" class="form-control"
                                                   placeholder="{{ __('Password...') }}" required>
                                        </div>
                                        @if ($errors->has('password'))
                                            <div id="password-error" class="error text-danger pl-3" for="password"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <br>
                                    <div class="bmd-form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <input type="text" name="first_name" class="form-control"
                                                   placeholder="{{ __('First Name...') }}"
                                                   value="{{ old('first_name') }}" required>
                                        </div>
                                        @if ($errors->has('first_name'))
                                            <div id="first_name-error" class="error text-danger pl-3" for="first_name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="bmd-form-group{{ $errors->has('middle_name') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <input type="text" name="middle_name" class="form-control"
                                                   placeholder="{{ __('Middle Name...') }}"
                                                   value="{{ old('middle_name') }}" required>
                                        </div>
                                        @if ($errors->has('middle_name'))
                                            <div id="middle_name-error" class="error text-danger pl-3" for="middle_name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('middle_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="bmd-form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <input type="text" name="last_name" class="form-control"
                                                   placeholder="{{ __('Last Name...') }}"
                                                   value="{{ old('last_name') }}" required>
                                        </div>
                                        @if ($errors->has('last_name'))
                                            <div id="last_name-error" class="error text-danger pl-3" for="last_name"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="bmd-form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <select type="text" name="gender" class="form-control"
                                                    placeholder="{{ __('Gender...') }}"
                                                    value="{{ old('gender') }}" required>
                                                <option value="Male" selected>Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('gender'))
                                            <div id="gender-error" class="error text-danger pl-3" for="gender"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="bmd-form-group{{ $errors->has('birthday') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <input type="date" name="birthday" class="form-control"
                                                   placeholder="{{ __('Birthdate...') }}"
                                                   value="{{ old('birthday') }}" required>
                                        </div>
                                        @if ($errors->has('birthday'))
                                            <div id="birthday-error" class="error text-danger pl-3" for="birthday"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('birthday') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div
                                        class="bmd-form-group{{ $errors->has('contact_number') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <input type="text" name="contact_number" class="form-control"
                                                   placeholder="{{ __('Contact Number...') }}"
                                                   value="{{ old('contact_number') }}" required>
                                        </div>
                                        @if ($errors->has('contact_number'))
                                            <div id="contact_number-error" class="error text-danger pl-3"
                                                 for="contact_number"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('contact_number') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div
                                        class="bmd-form-group{{ $errors->has('contact_person') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <input type="text" name="contact_person" class="form-control"
                                                   placeholder="{{ __('Contact Person...') }}"
                                                   value="{{ old('contact_person') }}" required>
                                        </div>
                                        @if ($errors->has('contact_person'))
                                            <div id="contact_person-error" class="error text-danger pl-3"
                                                 for="contact_person"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('contact_person') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="bmd-form-group{{ $errors->has('security_pin') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <input type="text" name="security_pin" class="form-control"
                                                   placeholder="{{ __('Security Pin...') }}"
                                                   value="{{ old('security_pin') }}" required>
                                        </div>
                                        @if ($errors->has('security_pin'))
                                            <div id="security_pin-error" class="error text-danger pl-3"
                                                 for="security_pin"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('security_pin') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="bmd-form-group{{ $errors->has('blk_door') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <input type="text" name="blk_door" class="form-control"
                                                   placeholder="{{ __('Block/Door...') }}"
                                                   value="{{ old('blk_door') }}" required>
                                        </div>
                                        @if ($errors->has('blk_door'))
                                            <div id="blk_door-error" class="error text-danger pl-3" for="blk_door"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('blk_door') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="bmd-form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <input type="text" name="street" class="form-control"
                                                   placeholder="{{ __('Street...') }}"
                                                   value="{{ old('street') }}" required>
                                        </div>
                                        @if ($errors->has('street'))
                                            <div id="street-error" class="error text-danger pl-3" for="street"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('street') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="bmd-form-group{{ $errors->has('province_id') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <select type="text" name="province_id" class="form-control">
                                                <option value="0" selected>Select Province</option>
                                                @foreach($provinces as $province)
                                                    <option
                                                        value="{{ $province->id  }}">{{ $province->prov_desc  }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('province_id'))
                                            <div id="province_id-error" class="error text-danger pl-3" for="province_id"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('province_id') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div
                                        class="bmd-form-group{{ $errors->has('city_municipality_id') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <select type="text" name="city_municipality_id" class="form-control">
                                                <option value="0" selected>Select City/Municipality</option>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id  }}">{{ $city->citymun_desc  }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('city_municipality_id'))
                                            <div id="city_municipality_id-error" class="error text-danger pl-3"
                                                 for="city_municipality_id"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('city_municipality_id') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="bmd-form-group{{ $errors->has('barangay_id') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <select type="text" name="barangay_id" class="form-control">
                                                <option value="0" selected>Select Barangay</option>
                                                @foreach($barangays as $barangay)
                                                    <option value="{{ $barangay->id  }}">{{ $barangay->desc  }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('barangay_id'))
                                            <div id="barangay_id-error" class="error text-danger pl-3" for="barangay_id"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('barangay_id') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="bmd-form-group{{ $errors->has('department_id ') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <select type="text" name="department_id" class="form-control">
                                                <option value="0" selected>Select Department</option>
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id  }}">{{ $department->name  }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('department_id '))
                                            <div id="department_id -error" class="error text-danger pl-3" for="department_id "
                                                 style="display: block;">
                                                <strong>{{ $errors->first('department_id ') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="bmd-form-group{{ $errors->has('designation_id ') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <select type="text" name="designation_id" class="form-control">
                                                <option value="0" selected>Select Designation</option>
                                                @foreach($designations as $designation)
                                                    <option value="{{ $designation->id  }}">{{ $designation->name  }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('designation_id'))
                                            <div id="designation_id-error" class="error text-danger pl-3" for="designation_id"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('designation_id') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="bmd-form-group{{ $errors->has('salary_type_id') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                            </div>
                                            <select type="text" name="salary_type_id" class="form-control">
                                                <option value="0" selected>Select Salary Type</option>
                                                @foreach($salary_types as $salarytype)
                                                    <option value="{{ $salarytype->ID  }}">{{ $salarytype->type  }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('salary_type_id'))
                                            <div id="salary_type_id-error" class="error text-danger pl-3" for="salary_type_id"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('salary_type_id') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-footer justify-content-end">
                                        <button type="submit"
                                                class="btn btn-primary">{{ __('Create account') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
