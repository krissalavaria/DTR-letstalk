@extends('layouts.app', ['activePage' => 'manage-users', 'titlePage' => __('Users List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ route('add-new-users') }}">Add new User</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Users List</h4>
                            <p class="card-category">Manage users list</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th></th>
                                        <th>
                                            Employee #
                                        </th>
                                        <th>
                                            Firstname
                                        </th>
                                        <th>
                                            Middlename
                                        </th>
                                        <th>
                                            Lastname
                                        </th>
                                        <th>
                                            Contact #
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($user_lists as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->employee_no }}</td>
                                                <td>{{ $user->first_name }}</td>
                                                <td>{{ $user->middle_name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->contact_number }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('user.edit', $user->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <span class="material-icons">
                                                            edit
                                                        </span>
                                                    </a>
                                                    <a href="{{ route('generate.qr', $user->id) }}" class="btn btn-warning btn-sm">
                                                        <span class="material-icons">
                                                            qr_code
                                                        </span>
                                                    </a>
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <span class="material-icons">
                                                                delete
                                                            </span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
