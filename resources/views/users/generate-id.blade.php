@extends('layouts.app', ['activePage' => 'generate-id', 'titlePage' => __('Generate ID')])

@section('content')
    <div id="printID" class="card-body">
        <div class="row">
            <div class="col-sm-12 d-flex">
                <div class="col-sm-3.5">
                    <img class="img-id" src="{{ url('../material/img/ID/FrontID2.png') }}" alt="front-id">
                    <div class="info-wrapper">
                        <div class="col-sm-12 d-flex justify-content-around">
                            <p class="id-info employee-no" style="margin-top: -30px; ">
                                {{ $users->first_name . ' ' . $users->middle_name . ' ' . $users->last_name }}</p>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-center">
                            <p class="id-info employee-no">{{ $users->designations->name }}</p>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-between">
                            <p class="id-info">Employee No.:</p>
                            <p class="id-info employee-no">{{ $users->employee_no }}</p>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-between">
                            <p class="id-info">Contact No.:</p>
                            <p class="id-info contact-no">{{ $users->contact_number }}</p>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-between">
                            <p class="id-info">Contact Person:</p>
                            <p class="id-info contact-person">{{ $users->contact_person }}</p>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-between">
                            <p class="id-info">Conact Person No:</p>
                            <p class="id-info contact-person-number">{{ $users->contact_person_number }}
                            </p>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top: -5px;">
                            <p class="add-info address-1">{{ $users->blk_door }} {{ $users->street }}
                                {{ $users->barangays->desc }}
                            </p>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top: -25px;">
                            <p class="add-info address-2">{{ $users->cities->citymun_desc }}
                                {{ $users->provinces->prov_desc }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3.5" style="margin-left: 10px;">
                    <img class="img-id" src="{{ url('../material/img/ID/BackID.png') }}" alt="front-id">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <div class="qr-code-wrapper">
                            <div class="qr-code">
                                {!! QrCode::size(153)->generate($users->auth_token) !!}
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
        border: white solid 4px;
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
        font-size: 12px;
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
