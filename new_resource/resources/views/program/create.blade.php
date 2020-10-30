@extends('layouts.system')

@section('content')
    <div class="page-title">
        <h3 class="breadcrumb-header">Добавить программу</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Form Elements</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="/program" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="input-title" class="col-sm-2 control-label">Наименование</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" id="input-title" value="{{ old('title') }}" required>
                                    @if ($errors->has('title'))
                                        <p class="help-block text-danger">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-steps" class="col-sm-2 control-label">Шаги</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="steps" id="input-steps" value="{{ old('steps') }}" required>
                                    @if ($errors->has('steps'))
                                        <p class="help-block text-danger">{{ $errors->first('steps') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-tree" class="col-sm-2 control-label">Дерево</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tree" id="input-tree" value="{{ old('tree') }}" required>
                                    @if ($errors->has('tree'))
                                        <p class="help-block text-danger">{{ $errors->first('tree') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-status" class="col-sm-2 control-label">Статус</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="status" id="input-status" value="{{ old('status') }}" required>
                                    @if ($errors->has('status'))
                                        <p class="help-block text-danger">{{ $errors->first('status') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-entry_amount" class="col-sm-2 control-label">	Сумма входа</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="entry_amount" id="input-entry_amount" value="{{ old('entry_amount') }}" required>
                                    @if ($errors->has('entry_amount'))
                                        <p class="help-block text-danger">{{ $errors->first('entry_amount') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-is_payment" class="col-sm-2 control-label">Статус оплаты</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="is_payment" id="input-is_payment" value="{{ old('is_payment') }}" required>
                                    @if ($errors->has('is_payment'))
                                        <p class="help-block text-danger">{{ $errors->first('is_payment') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-payment_list" class="col-sm-2 control-label">Массив выплат</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="payment_list" id="input-payment_list" value="{{ old('payment_list') }}" required>
                                    @if ($errors->has('payment_list'))
                                        <p class="help-block text-danger">{{ $errors->first('payment_list') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-is_invite" class="col-sm-2 control-label">Статус за приглашение</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="is_invite" id="input-is_invite" value="{{ old('is_invite') }}" required>
                                    @if ($errors->has('is_invite'))
                                        <p class="help-block text-danger">{{ $errors->first('is_invite') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-invite_sum" class="col-sm-2 control-label">Сумма приглашение</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="invite_sum" id="input-invite_sum" value="{{ old('invite_sum') }}" required>
                                    @if ($errors->has('invite_sum'))
                                        <p class="help-block text-danger">{{ $errors->first('invite_sum') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success" style="margin-top:10px;margin-bottom:-14px;">Отправить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- Row -->
    </div>
@endsection