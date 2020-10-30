@extends('layouts.system')

@section('content')
    <div class="page-title">
        <h3 class="breadcrumb-header">Добавить пользователя</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Form Elements</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="/user" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="input-name" class="col-sm-2 control-label">ФИО</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="input-name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" id="input-email"  value="{{ old('email') }}" required>
                                    <p class="help-block">Уникальный для каждого пользователя(не должно повторяться)</p>
                                    @if ($errors->has('email'))
                                        <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-phone" class="col-sm-2 control-label">Телефон</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone" id="input-phone"  value="{{ old('phone') }}" required>
                                    @if ($errors->has('phone'))
                                        <p class="help-block text-danger">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Страна</label>
                                <div class="col-sm-10">
                                    <select style="margin-bottom:15px;" name="country_id"  value="{{ old('country_id') }}" class="form-control">
                                        @foreach($countries as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id'))
                                        <p class="help-block text-danger">{{ $errors->first('country_id') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Город</label>
                                <div class="col-sm-10">
                                    <select style="margin-bottom:15px;" name="city_id"  value="{{ old('city_id') }}" class="form-control">
                                        @foreach($cities as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('city_id'))
                                        <p class="help-block text-danger">{{ $errors->first('city_id') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Банк</label>
                                <div class="col-sm-10">
                                    <select style="margin-bottom:15px;" name="bank_id"  value="{{ old('bank_id') }}" class="form-control">
                                        @foreach($banks as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('bank_id'))
                                        <p class="help-block text-danger">{{ $errors->first('bank_id') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-card_number" class="col-sm-2 control-label">Номер карты</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="card_number" id="input-card_number"  value="{{ old('card_number') }}" required>
                                    <p class="help-block">Внимательно проверяйте номер карты, по этой карте будут выплачиваться комиссионные</p>
                                    @if ($errors->has('card_number'))
                                        <p class="help-block text-danger">{{ $errors->first('card_number') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-password" class="col-sm-2 control-label">Пароль</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="password" id="input-password"  value="{{ old('password') }}" required>
                                    <p class="help-block">Пароль дольжен содержать не менее 6 симболов</p>
                                    @if ($errors->has('password'))
                                        <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Программа</label>
                                <div class="col-sm-10">
                                    <select style="margin-bottom:15px;" name="program_id" class="form-control" value="{{ old('program_id') }}" >
                                        @foreach($programs as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('program_id'))
                                        <p class="help-block text-danger">{{ $errors->first('program_id') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-sponsor_id" class="col-sm-2 control-label">ID спонсора</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sponsor_id" id="input-sponsor_id"  value="{{ old('sponsor_id') }}" required>
                                    <p class="help-block">Регистрируемый пользователь окажется под этим спонсором</p>
                                    @if ($errors->has('sponsor_id'))
                                        <p class="help-block text-danger">{{ $errors->first('sponsor_id') }}</p>
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