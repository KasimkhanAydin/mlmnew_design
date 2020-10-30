@extends('layouts.template')

@section('global')
    <!-- Page Container -->
    <div class="page-container">
        <!-- Page Inner -->
        <div class="page-inner login-page">
            <div id="main-wrapper" class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-md-3 login-box">
                        <h4 class="login-title">Войдите в аккаунт</h4>
                        <form method="POST"   action="{{ route('login') }}" >
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputText1">ID</label>
                                <input type="text" class="form-control" name="id" id="exampleInputText1">
                                @error('id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Пароль</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                                @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Войти</button>
                            <a href="/register" class="btn btn-default">Регистрация</a><br>
                            <a href="{{ route('password.request') }}" class="forgot-link">Забыл пароль?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /Page Content -->
    </div><!-- /Page Container -->
@endsection
