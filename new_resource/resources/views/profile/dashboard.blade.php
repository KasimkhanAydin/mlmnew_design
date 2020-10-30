@extends('layouts.system')

@section('content')
    <div class="page-title">
        <h3 class="breadcrumb-header">Dashboard</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-white stats-widget">
                    <div class="panel-body">
                        <div class="pull-left">
                            <span class="stats-number">{{ $users }}</span>
                            <p class="stats-info">Пользователи</p>
                        </div>
                        <div class="pull-right">
                            <i class="icon-arrow_upward stats-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-white stats-widget">
                    <div class="panel-body">
                        <div class="pull-left">
                            <span class="stats-number">{{ $inactive }}</span>
                            <p class="stats-info">Неактивированные пользователи</p>
                        </div>
                        <div class="pull-right">
                            <i class="icon-arrow_downward stats-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-white stats-widget">
                    <div class="panel-body">
                        <div class="pull-left">
                            <span class="stats-number">{{ $sum }} тг</span>
                            <p class="stats-info">Сумма от регистрации</p>
                        </div>
                        <div class="pull-right">
                            <i class="icon-arrow_upward stats-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-white stats-widget">
                    <div class="panel-body">
                        <div class="pull-left">
                            <span class="stats-number">{{ $sum_today  }}</span>
                            <p class="stats-info">Сумма от регистрации(сегодня)</p>
                        </div>
                        <div class="pull-right">
                            <i class="icon-arrow_upward stats-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Row -->
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Регистрация по дням</h4>
                    </div>
                    <div class="panel-body">
                        <div id="chart1"><svg></svg></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Статус сервера</h4>
                    </div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="server-load row">
                                <div class="server-stat col-sm-4">
                                    <p>167GB</p>
                                    <span>Usage</span>
                                </div>
                                <div class="server-stat col-sm-4">
                                    <p>320GB</p>
                                    <span>ecaps</span>
                                </div>
                                <div class="server-stat col-sm-4">
                                    <p>57.4%</p>
                                    <span>CPU</span>
                                </div>
                            </div>
                        </div>
                        <div id="chart2"><svg></svg></div>
                    </div>
                </div>
            </div>
        </div><!-- Row -->
    </div><!-- Main Wrapper -->
@endsection



@push('styles')
<link href="/ecaps/theme/assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="/ecaps/theme/assets/plugins/d3/d3.min.js"></script>
<script src="/ecaps/theme/assets/plugins/nvd3/nv.d3.min.js"></script>
<script src="/ecaps/theme/assets/plugins/flot/jquery.flot.min.js"></script>
<script src="/ecaps/theme/assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="/ecaps/theme/assets/plugins/flot/jquery.flot.symbol.min.js"></script>
<script src="/ecaps/theme/assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="/ecaps/theme/assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="/ecaps/theme/assets/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="/ecaps/theme/assets/plugins/chartjs/chart.min.js"></script>
<script src="/ecaps/theme/assets/js/pages/dashboard.js"></script>
@endpush