@extends('layouts.profile')

@section('content')
    <div class="page-title">
        <h3 class="breadcrumb-header">Иерархия</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="alert alert-warning" role="alert">
                    <strong>Важно!</strong> Ваш аккаунт активирован, что бы активировать выберита один из способов активации. Активация обязательно! Без активации ваш аккаунт не может участвовать в программе.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Офис-регистратор</h4>
                    </div>
                    <div class="panel-body">
                        <p>Что бы  активировать аккаунт, оплатите и отправьте чек менеджеру, по номеру - +7 777 777 77 77</p>
                        <a href="tel:77777777777" class="btn btn-success" data-toggle="modal" data-target="#myModal">Отправить</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Банковская карта</h4>
                    </div>
                    <div class="panel-body">
                        <p>Что бы  активировать аккаунт, перейдите по ссылки ниже.</p>
                        <a href="tel:77777777777" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Недоступен</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Электронные деньги</h4>
                    </div>
                    <div class="panel-body">
                        <p>Что бы  активировать аккаунт, перейдите по ссылки ниже.</p>
                        <a href="tel:77777777777" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Недоступен</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Main Wrapper -->
@endsection

