@extends('layouts.app', ['activePage' => 'employee-profile', 'titlePage' => __('Time Records List')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Daily Time Records</h4>
                        <p class="card-category">List of your time records.</p>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>#</th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->first_name.' '.$user->last_name }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('get-schedules', $user->id)}}" class="btn btn-primary btn-sm">View Schedule</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection