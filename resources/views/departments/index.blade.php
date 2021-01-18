@extends('layouts.app', ['activePage' => 'departments', 'titlePage' => __('Departments List')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ route('departments.create') }}">Add new Department</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">List of Departments</h4>
                            <p class="card-category">Manage Departments List</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="col-sm-12 d-flex">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Actions
                                                </th>
                                            </thead>
                                            <tbody>
                                                @foreach ($departments as $department)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>
                                                            {{ $department->ID }}
                                                        </td>
                                                        <td>
                                                            {{ $department->name }}
                                                        </td>
                                                        <td class="d-flex">
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('departments.edit', $department->ID) }}">
                                                                <span class="material-icons">
                                                                    edit
                                                                </span>
                                                            </a>
                                                            <form class="form" action="{{ route('departments.destroy', $department->ID) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger btn-sm" type="submit">
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
                                        {{ $departments->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
