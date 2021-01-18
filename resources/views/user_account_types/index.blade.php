@extends('layouts.app', ['activePage' => 'user_account_types', 'titlePage' => __('Accounts List')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ route('user_account_types.create') }}">Add new Account</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">List of Accounts</h4>
                            <p class="card-category">Manage Accounts List</p>
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
                                                    Department
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Hourly Rate
                                                </th>
                                                <th>
                                                    Actions
                                                </th>
                                            </thead>
                                            <tbody>
                                                @foreach ($user_account_types as $account)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>
                                                            {{ $account->departments->name }}
                                                        </td>
                                                        <td>
                                                            {{ $account->account_name }}
                                                        </td>
                                                        <td>
                                                            {{ $account->hourly_rate }}
                                                        </td>
                                                        <td class="d-flex">
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('user_account_types.edit', $account->ID) }}">
                                                                <span class="material-icons">
                                                                    edit
                                                                </span>
                                                            </a>
                                                            <form class="form" action="{{ route('user_account_types.destroy', $account->ID) }}" method="POST">
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
                                        {{ $user_account_types->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
