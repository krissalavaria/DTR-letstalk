@extends('layouts.app', ['activePage' => 'generate-id', 'titlePage' => __('Generate ID')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Generate ID</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 d-flex">
                                    <div class="col-sm-6">
                                        <img class="h-50" src="{{ url('../material/img/ID/FrontID.png') }}" alt="front-id">
                                        <p class="id-info first-name">{{ $users->employee_no }}</p>
                                        <p class="id-info contact-no">{{ $users->contact_number }}</p>
                                        <p class="id-info contact-person">{{ $users->contact_person }}</p>
                                        <p class="id-info contact-person-number">{{ $users->contact_person_number }}</p>
                                        <p class="id-info address">{{ $users->blk_door }} {{ $users->street }}</p>
                                        <p class="id-info address-2">{{ $users->barangays->desc }}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <img class="h-50" src="{{ url('../material/img/ID/BackID.png') }}" alt="front-id">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <style>
        .id-info {
            font-weight: 600;
            color: #01002a;
        }
        .first-name {
            margin-top: -220px;
            margin-left: 220px;
        }
        .contact-no {
            margin-top: -13px;
            margin-left: 200px;
        }
        .contact-person {
            margin-top: -16px;
            margin-left: 220px;
        }
        .contact-person-number {
            margin-top: -13px;
            margin-left: 200px;
        }
        .address {
            margin-top: -10px;
            margin-left: 188px;
        }
        .address-2 {
            margin-top: -10px;
            margin-left: 130px;
        }
    </style>