@extends('layouts.profile')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                    </i>
                </div>
                <div>Процессинг
                    <div class="page-title-subheading">Tables are the backbone of almost all web applications.
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div id="accordion" class="accordion-wrapper mb-3">
                @foreach($otheruserids as $key=>$user)
                    @php
                        $list = \App\Models\Processing::whereUserId($user)->orderBy('created_at','desc')->paginate(30);
                        $balance = \Facades\App\Facades\Balance::getBalance($user);
                        $out = \Facades\App\Facades\Balance::getBalanceOut($user);
                        $all = \Facades\App\Facades\Balance::getIncomeBalance($user);
                        $transfer = \Facades\App\Facades\Balance::getBalanceTransfer($user);
                    @endphp
                    <div class="card">
                        <div id="headingOne" class="card-header">
                            <button type="button" data-toggle="collapse" data-target="#collapseOne{{$key}}" aria-expanded="true"
                                    aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                <h5 class="m-0 p-0">ID:{{$user}}</h5>
                            </button>
                        </div>
                        <div data-parent="#accordion" id="collapseOne{{$key}}" aria-labelledby="headingOne" class="collapse show">
                            <div class="card-body">
                                @include('includes.processing_tab_pane')
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


