@extends('layouts.app', ['activePage' => 'manage-users', 'titlePage' => __('Users List')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ route('scanner-entry') }}">Scan Entries</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Scan Entries</h4>
                            <p class="card-category">Manage Entries</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="col-sm-12 d-flex">
                                    <div class="table-responsive">
                                        <table class="table">
                                          <thead class=" text-primary">
                                            <th>
                                              ID
                                            </th>
                                            <th>
                                              Name
                                            </th>
                                            <th>
                                              Country
                                            </th>
                                            <th>
                                              City
                                            </th>
                                            <th>
                                              Salary
                                            </th>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>
                                                1
                                              </td>
                                              <td>
                                                Dakota Rice
                                              </td>
                                              <td>
                                                Niger
                                              </td>
                                              <td>
                                                Oud-Turnhout
                                              </td>
                                              <td class="text-primary">
                                                $36,738
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                </div>
                            </div>
                            <div id="app">
                                <qr-component></qr-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
