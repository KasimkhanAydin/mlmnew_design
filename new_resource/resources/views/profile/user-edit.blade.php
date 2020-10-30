@extends('layouts.profile')

@section('content')
    <div class="app-page-title">

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div> Изменить пользователя
                        <div class="page-title-subheading">Tables are the backbone of almost all web applications.
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                    <div class="d-inline-block dropdown">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Controls Types</h5>

                        <form action="{{url('user', [$user->id])}}" method="POST" class="form-horizontal form-material">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="position-relative form-group">
                                <label for="input-name" >ФИО</label>
                                <input type="text" class="form-control" name="name" id="input-name" value="{{ old('name', $user->name) }}" required>
                                @if ($errors->has('name'))
                                    <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="position-relative form-group">
                                <label for="input-email" >Email</label>
                                <input type="text" class="form-control" name="email" id="input-email"  value="{{ old('email', $user->email) }}" required>
                                <p class="help-block">Уникальный для каждого пользователя(не должно повторяться)</p>
                                @if ($errors->has('email'))
                                    <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="position-relative form-group">
                                <label for="input-phone" >Телефон</label>
                                <input type="text" class="form-control" name="phone" id="input-phone"  value="{{ old('phone', $user->phone) }}" required>
                                @if ($errors->has('phone'))
                                    <p class="help-block text-danger">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>
                            <div class="position-relative form-group">
                                <label>Страна</label>
                                <select style="margin-bottom:15px;" name="country_id"  value="{{ old('country_id') }}" class="form-control">
                                    @foreach($countries as $item)
                                        <option value="{{ $item->id }}" @if($user->country_id == $item->id) selected @endif>{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country_id'))
                                    <p class="help-block text-danger">{{ $errors->first('country_id') }}</p>
                                @endif
                            </div>
                            <div class="position-relative form-group">
                                <label>Город</label>
                                <select style="margin-bottom:15px;" name="city_id"  value="{{ old('city_id') }}" class="form-control">
                                    @foreach($cities as $item)
                                        <option value="{{ $item->id }}" @if($user->city_id == $item->id) selected @endif>{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('city_id'))
                                    <p class="help-block text-danger">{{ $errors->first('city_id') }}</p>
                                @endif

                            </div>
                            <div class="position-relative form-group">
                                <label>Банк</label>
                                <select style="margin-bottom:15px;" name="bank_id"  value="{{ old('bank_id') }}" class="form-control">
                                    @foreach($banks as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('bank_id'))
                                    <p class="help-block text-danger">{{ $errors->first('bank_id') }}</p>
                                @endif

                            </div>
                            <div class="position-relative form-group">
                                <label for="input-card_number">Номер карты</label>
                                <input type="text" class="form-control" name="card_number" id="input-card_number"  value="{{ old('card_number', $user->card_number) }}" required>
                                <p class="help-block">Внимательно проверяйте номер карты, по этой карте будут выплачиваться комиссионные</p>
                                @if ($errors->has('card_number'))
                                    <p class="help-block text-danger">{{ $errors->first('card_number') }}</p>
                                @endif

                            </div>
                            <div class="position-relative form-group">
                                <label for="input-password">Пароль</label>
                                <input type="text" class="form-control" name="password" id="input-password">
                                <p class="help-block">Пароль дольжен содержать не менее 6 симболов</p>
                                @if ($errors->has('password'))
                                    <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                            <div class="position-relative form-group">
                                <button type="submit" class="mt-1 btn btn-primary" style="margin-top:10px;margin-bottom:-14px;">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

