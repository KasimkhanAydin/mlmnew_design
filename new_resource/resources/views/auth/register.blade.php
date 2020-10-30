@extends('layouts.template')

@section('global')
    <?php
        $countries =\App\Models\Country::all();
        $cities    =\App\Models\City::all();
        $banks     =\App\Models\Bank::all();
        $programs  =\App\Models\Program::all();
    ?>
    <!-- Page Container -->
    <div class="page-container">
        <!-- Page Inner -->
        <div class="page-inner login-page">
            <div id="main-wrapper" class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-md-3 login-box">
                        <h4 class="login-title">Создать аккаунт</h4>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="ФИО" name="name"  value="{{ old('name') }}" id="exampleInputName" required>
                                @error('name')
                                <span class="invalid-feedback text-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  placeholder="Email"  name="email" value="{{ old('email') }}" id="exampleInputEmail" required>
                                @error('email')
                                <span class="invalid-feedback text-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Пароль"  name="password" value="{{ old('password') }}" id="exampleInputPassword" required>
                                @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone"  placeholder="Телефон"  value="{{ old('phone') }}" id="exampleInputPhone" required>
                                @error('phone')
                                <span class="invalid-feedback text-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select style="margin-bottom:15px;" name="country_id"  class="form-control" required>
                                    <option value="" disabled selected>Страна</option>
                                    @foreach($countries as $item)
                                        <option value="{{ $item->id }}" @if(old('country_id') == $item->id) selected @endif>{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country_id'))
                                    <p class="help-block text-danger">{{ $errors->first('country_id') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                    <select style="margin-bottom:15px;" name="city_id"  class="form-control" required>
                                        <option value="" disabled selected>Город</option>
                                        @foreach($cities as $item)
                                            <option value="{{ $item->id }}" @if(old('city_id') == $item->id) selected @endif>{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('city_id'))
                                        <p class="help-block text-danger">{{ $errors->first('city_id') }}</p>
                                    @endif
                            </div>
                            <div class="form-group">
                                <select style="margin-bottom:15px;" name="bank_id"  class="form-control" required>
                                    <option value="" disabled selected>Банк</option>
                                    @foreach($banks as $item)
                                        <option value="{{ $item->id }}"  @if(old('bank_id') == $item->id) selected @endif>{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('bank_id'))
                                    <p class="help-block text-danger">{{ $errors->first('bank_id') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Номер карты"  name="card_number" value="{{ old('card_number') }}" id="exampleInputCardNumber" required>
                                @error('card_number')
                                <span class="invalid-feedback text-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select style="margin-bottom:15px;" name="program_id" class="form-control" required>
                                    <option value="" disabled selected>Программа</option>
                                    @foreach($programs as $item)
                                        <option value="{{ $item->id }}" @if(old('program_id') == $item->id) selected @endif>{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('program_id'))
                                    <p class="help-block text-danger">{{ $errors->first('program_id') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="ID спонсора"  name="sponsor_id" value="{{ old('sponsor_id') }}" id="exampleInputSponsorId" required >
                                @error('sponsor_id')
                                <span class="invalid-feedback text-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Регистрация</button>
                            <a href="/login" class="btn btn-default">Войти</a><br>
                            <a href="{{ route('password.request') }}" class="forgot-link">Забыл пароль?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /Page Content -->
    </div><!-- /Page Container -->
@endsection
