@extends('layouts.app', ['activePage' => 'generate-id', 'titlePage' => __('Generate ID')])

@section('content')
    <div id="printID" class="card-body">
        <div class="row">
            <div class="col-sm-12 d-flex">
                <div class="col-sm-3.5">
                    <img class="img-id" src="{{ url('../material/img/ID/front_id.png') }}" alt="front-id">
                    <div class="info-wrapper">
                        <div class="col-sm-12 d-flex justify-content-around">
                            <img height="130px;" width="100px;" style="margin-top: -178px; border: 3px solid #01002a;" src="{{ url('http://localhost/letstalk-system/employee/assets/images/Logo/Profile/'.$users->picture) }}" alt="">
                        </div>
                        <div class="col-sm-12 d-flex justify-content-around">
                            <p class="id-info employee-no" style="margin-top: -30px;">
                                {{ ucwords($users->first_name) . ' ' . ucwords($users->middle_name) . ' ' . ucwords($users->last_name) }}</p>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top: -20px;">
                            <p class="id-info employee-no">{{ ucwords($users->designations->job_description) }}</p>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-between">
                            <p class="id-info">Employee No.:</p>
                            <p class="id-info employee-no">{{ ucwords($users->employee_no) }}</p>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-between">
                            <p class="id-info">Contact No.:</p>
                            <p class="id-info contact-no">{{ ucwords($users->contact_number) }}</p>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-between">
                            <p class="id-info">Contact Person:</p>
                            <p class="id-info contact-person">{{ ucwords($users->contact_person) }}</p>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-between">
                            <p class="id-info">Contact Person No:</p>
                            <p class="id-info contact-person-number">{{ ucwords($users->contact_person_number) }}
                            </p>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top: -10px;">
                            <p class="add-info address-1">{{ ucwords($users->blk_door) }} {{ ucwords($users->street) }}
                                {{ ucwords($users->barangays->desc) }}
                            </p>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top: -25px;">
                            <p class="add-info address-2">{{ ucwords($users->cities->citymun_desc) }}
                                {{ ucwords($users->provinces->prov_desc) }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3.5" style="margin-left: 10px;">
                    <img class="img-id" src="{{ url('../material/img/ID/back_id.png') }}" alt="front-id">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <div class="qr-code-wrapper">
                            <div class="qr-code" style="margin-top: -24px;">
                                {!! QrCode::size(147)->generate($users->auth_token) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .qr-code-wrapper {
        margin-top: -305px;
    }

    .qr-code {
        border: white solid 3px;
        background-color: white;
        margin-left: 3px;
    }

    .img-id {
        height: 550px;
        border: solid 2px #01002a;
    }

    .id-info {
        font-weight: 500;
        color: #01002a;
    }

    .add-info {
        font-weight: 500;
        color: #01002a;
        font-size: 13px;
    }

    .info-wrapper {
        margin-top: -270px;
    }

    .sidebar {
        display: none;
    }

    .navbar.navbar-transparent {
        display: none;
    }

    .main-panel>.footer {
        display: none;
    }

</style>
