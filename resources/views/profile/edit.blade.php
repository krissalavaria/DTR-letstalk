@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
                @csrf
                @method('put')
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Edit Profile') }}</h4>
                        <p class="card-category">{{ __('User information') }}</p>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ session('status') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12 d-flex">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('First Name') }}</label>
                                        <div class="col-sm-8">
                                            <div
                                                class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                                <input
                                                    class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                    name="first_name" id="input-name" type="text"
                                                    placeholder="{{ __('Name') }}"
                                                    value="{{ old('first_name', auth()->user()->first_name) }}"
                                                    required="true" aria-required="true" />
                                                @if ($errors->has('first_name'))
                                                    <span id="first_name-error" class="error text-danger"
                                                        for="input-name">{{ $errors->first('first_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Middle Name') }}</label>
                                        <div class="col-sm-8">
                                            <div
                                                class="form-group{{ $errors->has('middle_name') ? ' has-danger' : '' }}">
                                                <input
                                                    class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}"
                                                    name="middle_name" id="input-name" type="text"
                                                    placeholder="{{ __('Middle Name') }}"
                                                    value="{{ old('middle_name', auth()->user()->middle_name) }}"
                                                    required="true" aria-required="true" />
                                                @if ($errors->has('middle_name'))
                                                    <span id="middle_name-error" class="error text-danger"
                                                        for="input-name">{{ $errors->first('middle_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Last Name') }}</label>
                                        <div class="col-sm-8">
                                            <div
                                                class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                                <input
                                                    class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                    name="last_name" id="input-last_name" type="text"
                                                    placeholder="{{ __('Last Name') }}"
                                                    value="{{ old('last_name', auth()->user()->last_name) }}"
                                                    required />
                                                @if ($errors->has('last_name'))
                                                    <span id="last_name-error" class="error text-danger"
                                                        for="input-last_name">{{ $errors->first('last_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Gender') }}</label>
                                        <div class="col-sm-8">
                                            <div
                                                class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                                <input
                                                    class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                                    name="gender" id="input-gender" type="text"
                                                    placeholder="{{ __('Gender') }}"
                                                    value="{{ old('gender', auth()->user()->gender) }}" required />
                                                @if ($errors->has('gender'))
                                                    <span id="last_name-error" class="error text-danger"
                                                        for="input-gender">{{ $errors->first('gender') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Birthday') }}</label>
                                        <div class="col-sm-8">
                                            <div
                                                class="form-group{{ $errors->has('birthday') ? ' has-danger' : '' }}">
                                                <input
                                                    class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}"
                                                    name="birthday" id="input-birthday" type="date"
                                                    placeholder="{{ __('Birthday') }}"
                                                    value="{{ old('birthday', auth()->user()->birthday) }}"
                                                    required />
                                                @if ($errors->has('birthday'))
                                                    <span id="last_name-error" class="error text-danger"
                                                        for="input-birthday">{{ $errors->first('birthday') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Contact #') }}</label>
                                        <div class="col-sm-8">
                                            <div
                                                class="form-group{{ $errors->has('contact_number') ? ' has-danger' : '' }}">
                                                <input
                                                    class="form-control{{ $errors->has('contact_number') ? ' is-invalid' : '' }}"
                                                    name="contact_number" id="input-contact_number" type="text"
                                                    placeholder="{{ __('Contact #') }}"
                                                    value="{{ old('contact_number', auth()->user()->contact_number) }}"
                                                    required />
                                                @if ($errors->has('contact_number'))
                                                    <span id="last_name-error" class="error text-danger"
                                                        for="input-contact_number">{{ $errors->first('contact_number') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Contact Person') }}</label>
                                        <div class="col-sm-8">
                                            <div
                                                class="form-group{{ $errors->has('contact_person') ? ' has-danger' : '' }}">
                                                <input
                                                    class="form-control{{ $errors->has('contact_person') ? ' is-invalid' : '' }}"
                                                    name="contact_person" id="input-contact_person" type="text"
                                                    placeholder="{{ __('Contact Person') }}"
                                                    value="{{ old('contact_person', auth()->user()->contact_person) }}"
                                                    required />
                                                @if ($errors->has('contact_person'))
                                                    <span id="last_name-error" class="error text-danger"
                                                        for="input-contact_person">{{ $errors->first('contact_person') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Security Pin') }}</label>
                                        <div class="col-sm-8">
                                            <div
                                                class="form-group{{ $errors->has('security_pin') ? ' has-danger' : '' }}">
                                                <input
                                                    class="form-control{{ $errors->has('security_pin') ? ' is-invalid' : '' }}"
                                                    name="security_pin" id="input-security_pin" type="password"
                                                    placeholder="{{ __('Security Pin') }}"
                                                    value="{{ old('security_pin', auth()->user()->security_pin) }}"
                                                    required />
                                                @if ($errors->has('security_pin'))
                                                    <span id="last_name-error" class="error text-danger"
                                                        for="input-security_pin">{{ $errors->first('security_pin') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Block/Door') }}</label>
                                        <div class="col-sm-8">
                                            <div
                                                class="form-group{{ $errors->has('blk_door') ? ' has-danger' : '' }}">
                                                <input
                                                    class="form-control{{ $errors->has('blk_door') ? ' is-invalid' : '' }}"
                                                    name="blk_door" id="input-blk_door" type="text"
                                                    placeholder="{{ __('Block/Door') }}"
                                                    value="{{ old('blk_door', auth()->user()->blk_door) }}"
                                                    />
                                                @if ($errors->has('blk_door'))
                                                    <span id="last_name-error" class="error text-danger"
                                                        for="input-blk_door">{{ $errors->first('blk_door') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Street') }}</label>
                                        <div class="col-sm-8">
                                            <div
                                                class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                                                <input
                                                    class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}"
                                                    name="street" id="input-street" type="text"
                                                    placeholder="{{ __('Street') }}"
                                                    value="{{ old('street', auth()->user()->street) }}" />
                                                @if ($errors->has('street'))
                                                    <span id="last_name-error" class="error text-danger"
                                                        for="input-street">{{ $errors->first('street') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div id="app">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Barangay') }}</label>
                                            <div class="col-sm-8">
                                                <div
                                                    class="form-group{{ $errors->has('barangay_id') ? ' has-danger' : '' }}">
                                                    <search-barangay></search-barangay>
                                                    {{-- <select type="text"
                                                        name="barangay_id" class="form-control">
                                                        <option value="{{ auth()->user()->barangays->barangay_id }}"
                                                            selected>{{ auth()->user()->barangays->desc }}</option>
                                                        @foreach ($barangays as $barangay)
                                                            <option value="{{ $barangay->ID }}">
                                                                {{ $barangay->desc }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                    @if ($errors->has('barangay_id'))
                                                        <span id="last_name-error" class="error text-danger"
                                                            for="input-barangay_id">{{ $errors->first('barangay_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label
                                                class="col-sm-2 col-form-label">{{ __('City/Municipality') }}</label>
                                            <div class="col-sm-8">
                                                <div
                                                    class="form-group{{ $errors->has('city_municipality_id') ? ' has-danger' : '' }}">
                                                    <search-cities></search-cities>
                                                    {{-- <select type="text" name="city_municipality_id"
                                                        class="form-control">
                                                        <option
                                                            value="{{ auth()->user()->cities->city_municipality_id }}"
                                                            selected>{{ auth()->user()->cities->citymun_desc }}
                                                        </option>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->ID }}">
                                                                {{ $city->citymun_desc }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                    @if ($errors->has('city_municipality_id'))
                                                        <span id="last_name-error" class="error text-danger"
                                                            for="input-city_municipality_id">{{ $errors->first('city_municipality_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Province') }}</label>
                                        <div class="col-sm-8">
                                            <div
                                                class="form-group{{ $errors->has('province_id') ? ' has-danger' : '' }}">
                                                <select type="text" name="province_id" class="form-control">
                                                    {{-- <option value="{{ auth()->user()->provinces->province_id }}"
                                                        selected>{{ auth()->user()->provinces->prov_desc }}</option> --}}
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->ID }}">
                                                            {{ $province->prov_desc }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('province_id'))
                                                    <span id="last_name-error" class="error text-danger"
                                                        for="input-province_id">{{ $errors->first('province_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Departments') }}</label>
                                        <div class="col-sm-8">
                                            <div
                                                class="form-group{{ $errors->has('department_id') ? ' has-danger' : '' }}">
                                                <select type="text" name="department_id" class="form-control">
                                                    {{-- <option value="{{ auth()->user()->departments->department_id }}"
                                                        selected>{{ auth()->user()->departments->name }}</option> --}}
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->ID }}">
                                                            {{ $department->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('department_id'))
                                                    <span id="last_name-error" class="error text-danger"
                                                        for="input-department_id">{{ $errors->first('department_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Account') }}</label>
                                        <div class="col-sm-8">
                                            <div
                                                class="form-group{{ $errors->has('user_acct_type_id') ? ' has-danger' : '' }}">
                                                <select type="text" name="user_acct_type_id" class="form-control">
                                                    {{-- <option
                                                        value="{{ auth()->user()->accounts->user_acct_type_id }}"
                                                        selected>{{ auth()->user()->accounts->account_name }}
                                                    </option> --}}
                                                    @foreach ($user_account_types as $account)
                                                        <option value="{{ $account->ID }}">
                                                            {{ $account->account_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('user_acct_type_id'))
                                                    <span id="last_name-error" class="error text-danger"
                                                        for="input-user_acct_type_id">{{ $errors->first('user_acct_type_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Change password') }}</h4>
                <p class="card-category">{{ __('Password') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status_password'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status_password') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Current Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required />
                      @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection