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
                                    No. Classes
                                </th>
                                <th>
                                    No. of Hours
                                </th>
                                <th>
                                    Total Amount
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $sch)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sch->first_name.' '.$sch->last_name }}</td>
                                        <td>{{ $sch->no_classes }}</td>
                                        <td>{{ $sch->no_hours }}</td>
                                        <td>{{ $sch->total_amount }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('schedules.edit', $sch->ID)}}" class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                    @if ($schedules == null)
                                    <p>No Schedules available.</p>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $schedules->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection