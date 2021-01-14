@extends('layouts.app', ['activePage' => 'designations', 'titlePage' => __('Designation List')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ route('designations.create') }}">Add new Designation</a>
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
                                                    Job Description
                                                </th>
                                                <th>
                                                    Actions
                                                </th>
                                            </thead>
                                            <tbody>
                                                @foreach ($designations as $designation)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>
                                                            {{ $designation->ID }}
                                                        </td>
                                                        <td>
                                                            {{ $designation->name }}
                                                        </td>
                                                        <td>
                                                            {{ $designation->job_description }}
                                                        </td>
                                                        <td class="d-flex">
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('designations.edit', $designation->ID) }}">
                                                                <span class="material-icons">
                                                                    edit
                                                                </span>
                                                            </a>
                                                            <form class="form" action="{{ route('designations.destroy', $designation->ID) }}" method="POST">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
