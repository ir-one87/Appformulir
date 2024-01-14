@extends('layouts.main')

@section('content')
{{-- @include('layouts.loading') --}}
<!-- Row start -->
<div class="row gutters">
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon">
                <i class="icon-eye1"></i>
            </div>
            <div class="sale-num">
                <h3>9500</h3>
                <p>Rekap Pendaftaran SE</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon">
                <i class="icon-shopping-cart1"></i>
            </div>
            <div class="sale-num">
                <h3>2500</h3>
                <p>Rekap OPD yang Mendaftar</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon">
                <i class="icon-shopping-bag1"></i>
            </div>
            <div class="sale-num">
                <h3>7500</h3>
                <p>Status Pendaftaran (Selesai)</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon">
                <i class="icon-activity"></i>
            </div>
            <div class="sale-num">
                <h3>3500</h3>
                <p>Status Pendaftaran (Belum Selesai)</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon">
                <i class="icon-activity"></i>
            </div>
            <div class="sale-num">
                <h3>3500</h3>
                <p>Status TTe (Sudah Terbit)</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon">
                <i class="icon-activity"></i>
            </div>
            <div class="sale-num">
                <h3>3500</h3>
                <p>Status TTe (Belum Terbit)</p>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->

<!-- Row start -->
<div class="row gutters">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Visitors</div>
            </div>
            <div class="card-body pt-0">
                <div id="visitors"></div>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->

<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-4 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Customers</div>
            </div>
            <div class="card-body">
                <div id="customers"></div>
                <!-- Row starts -->
                <div class="row gutters">
                    <div class="col-sm-6 col-6">
                        <div class="info-stats3 shade-one-a">
                            <i class="icon-opacity"></i>
                            <h6>New</h6>
                            <h3>450</h3>
                        </div>
                    </div>
                    <div class="col-sm-6 col-6">
                        <div class="info-stats3 shade-one-b">
                            <i class="icon-opacity"></i>
                            <h6>Returned</h6>
                            <h3>900</h3>
                        </div>
                    </div>
                </div>
                <!-- Row end -->
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Deals</div>
            </div>
            <div class="card-body pt-0 pb-0">
                <div id="deals"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Logs</div>
            </div>
            <div class="card-body">
                <div class="customScroll5">
                    <div class="activity-logs">
                        <div class="activity-log-list">
                            <div class="sts"></div>
                            <div class="log">New item sold</div>
                            <div class="log-time">10:10</div>
                        </div>
                        <div class="activity-log-list">
                            <div class="sts"></div>
                            <div class="log">Notification from bank</div>
                            <div class="log-time">05:25</div>
                        </div>
                        <div class="activity-log-list">
                            <div class="sts"></div>
                            <div class="log">Transaction success alert</div>
                            <div class="log-time">09:45</div>
                        </div>
                        <div class="activity-log-list">
                            <div class="sts"></div>
                            <div class="log">Your item has been updated</div>
                            <div class="log-time">06:50</div>
                        </div>
                        <div class="activity-log-list">
                            <div class="sts"></div>
                            <div class="log">New fffer</div>
                            <div class="log-time">12:30</div>
                        </div>
                        <div class="activity-log-list">
                            <div class="sts"></div>
                            <div class="log">Item bought</div>
                            <div class="log-time">04:22</div>
                        </div>
                        <div class="activity-log-list">
                            <div class="sts"></div>
                            <div class="log">New sale: Zyan Ferris</div>
                            <div class="log-time">10:10</div>
                        </div>
                        <div class="activity-log-list">
                            <div class="sts"></div>
                            <div class="log">Order Received</div>
                            <div class="log-time">12:55</div>
                        </div>
                        <div class="activity-log-list">
                            <div class="sts"></div>
                            <div class="log">Service information</div>
                            <div class="log-time">09:12</div>
                        </div>
                        <div class="activity-log-list">
                            <div class="sts"></div>
                            <div class="log">Message from Reisnz</div>
                            <div class="log-time">09:27</div>
                        </div>
                        <div class="activity-log-list">
                            <div class="sts red"></div>
                            <div class="log">New item sale: Jannik Simon</div>
                            <div class="log-time">02:39</div>
                        </div>
                        <div class="activity-log-list">
                            <div class="sts red"></div>
                            <div class="log">Product update</div>
                            <div class="log-time">08:22</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->

@endsection