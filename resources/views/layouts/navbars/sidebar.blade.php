<div class="sidebar" data-color="orange" data-background-color="white"
    data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="home" class="simple-text logo-normal">
            {{ __('LETS TALK - DTR') }}
        </a>
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center">
                <div class="d-flex justify-content-center border rounded-circle">
                    {{-- <img src="{{ url('../material/img/profile/' . auth()->user()->picture . '.png') }}"
                        alt="profile-picture" style="width: 40px;"> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center">
                <p style="color: black; font-size: 12px;">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</p>
            </div>
        </div>
    </div>
    <div class="sidebar-wrapper" style="overflow-y: scroll;">
        @if (Auth::user()->designation_id == 1)
            <ul class="nav">
                <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="material-icons">dashboard</i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'scan-entry' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('scan-entry') }}">
                        <i class="material-icons">qr_code</i>
                        <p>{{ __('Temperature Monitoring') }}</p>
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'departments' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('departments.index') }}">
                        <i class="material-icons">DP</i>
                        <p>{{ __('Departments') }}</p>
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'designations' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('designations.index') }}">
                        <i class="material-icons">DS</i>
                        <p>{{ __('Designations') }}</p>
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'user_account_types' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('user_account_types.index') }}">
                        <i class="material-icons">account_box</i>
                        <p>{{ __('Account Types') }}</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ $activePage == 'profile' || $activePage == 'user-management' ? ' active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                        <i class="material-icons">supervisor_account</i>
                        <p>{{ __('User Settings') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse show" id="laravelExample">
                        <ul class="nav">
                            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    <span class="sidebar-mini"> UP </span>
                                    <span class="sidebar-normal">{{ __('User profile') }} </span>
                                </a>
                            </li>
                            <li class="nav-item{{ $activePage == 'manage-users' ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('manage-users') }}">
                                    <span class="sidebar-mini"> UM </span>
                                    <span class="sidebar-normal"> {{ __('User Management') }} </span>
                                </a>
                            </li>
                            <li class="nav-item{{ $activePage == 'schedules' ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('schedules.index') }}">
                                    <span class="sidebar-mini"> UM </span>
                                    <span class="sidebar-normal"> {{ __('User Schedules') }} </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        @endif
        @if (Auth::user()->designation_id == 4)
            <ul class="nav">
                <li class="nav-item{{ $activePage == 'scanner-dashboard' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('scanner-dashboard') }}">
                        <i class="material-icons">qr_code</i>
                        <p>{{ __('Scan Entries') }}</p>
                    </a>
                </li>
            </ul>
        @endif
        @if (Auth::user()->designation_id == 2 || Auth::user()->designation_id == 7)
            <ul class="nav">
                <li class="nav-item{{ $activePage == 'employee-profile' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('employee-profile') }}">
                        <i class="material-icons">qr_code</i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'employee-profile-settings' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('employee-profile-settings') }}">
                        <span class="sidebar-mini"><strong>UP</strong></span>
                        <span class="sidebar-normal">{{ __('User profile') }} </span>
                    </a>
                </li>
            </ul>
        @endif
    </div>
</div>
