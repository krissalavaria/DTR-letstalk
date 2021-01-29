@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div id="app">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">supervisor_account</i>
                                </div>
                                <p class="card-category">Total Users</p>
                                <h3 class="card-title">{{ $users }}
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">supervisor_account</i>
                                    <a href="{{ route('manage-users') }}">Manage Users</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">qr_code</i>
                                </div>
                                <p class="card-category">Daily Entries</p>
                                <h3 class="card-title">{{ $daily_entries }}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i>
                                    <a href="{{ route('scan-entry') }}">Monitor Entries</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-success">
                                <div class="ct-chart" id="dailySalesChart"></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Daily Sales</h4>
                                <p class="card-category">
                                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in
                                    today sales.
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> updated 4 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-warning">
                                <div class="ct-chart" id="websiteViewsChart"></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Email Subscriptions</h4>
                                <p class="card-category">Last Campaign Performance</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-danger">
                                <div class="ct-chart" id="completedTasksChart"></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Completed Tasks</h4>
                                <p class="card-category">Last Campaign Performance</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">List of Users Time Logs</h4>
                                <p class="card-category">Manage users list.</p>
                            </div>
                            <div class="card-body table-responsive">
                                <time-sheet-component></time-sheet-component>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h4 class="card-title">Employees Orders</h4>
                                <p class="card-category">List of Employees Orders</p>
                            </div>
                            <div class="card-body table-responsive">
                                <div class="app">
                                    <orders-total></orders-total>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-danger">
                                <h4 class="card-title">List of Menu Today</h4>
                                <p class="card-category">Print the List of Menu</p>
                            </div>
                            <div class="card-body table-responsive">
                                <products-list></products-list>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">List of Menu Today</h4>
                                <p class="card-category">Print the List of Menu</p>
                            </div>
                            <div class="card-body table-responsive">
                                <daily-orders></daily-orders>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });

    </script>
@endpush
