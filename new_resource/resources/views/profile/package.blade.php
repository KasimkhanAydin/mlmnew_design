@extends('layouts.profile')

@section('content')
    <div class="page-title">
        <h3 class="breadcrumb-header">Pricing Tables</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <div class="row white">
                            <div class="block">

                                @foreach($programs as $item)
                                    <?php
                                    $count_status = \App\Models\UserProgramStatus::where('user_id',Auth::user()->id)->where('program_id',$item->id)->count();
                                    $count_program = \App\Models\UserProgram::where('user_id',Auth::user()->id)->where('program_id',$item->id)->count();
                                    ?>
                                    <form action="/other-programs-activate" method="get">
                                        @csrf
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <ul class="pricing">
                                                <li>
                                                    <h1>{{ $item->title }}</h1>
                                                </li>
                                                <li>{{ $item->steps }} уровень </li>
                                                <li>{{ $item->tree }} партнер</li>
                                                <li>
                                                    <h3 style="margin-top:0;">{{  $item->entry_amount }} тг</h3>
                                                    <span>сумма входа</span>
                                                </li>
                                                @if($count_program == 0)
                                                    <li style="list-style: none; padding: 12px 8px;">
                                                        <div class="">
                                                            <label class="sr-only" for="sponsor_id">ID спонсора</label>
                                                            <input type="hidden" value="{{ $item->id }}" name="program_id">
                                                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                                            <input type="text" class="form-control" id="sponsor_id" name="sponsor_id" placeholder="ID спонсора" required>
                                                        </div>
                                                    </li>
                                                @endif
                                                @if($count_program == 0)
                                                    <li><button type="submit" class="btn btn-success btn-rounded">Войти в программу</button></li>
                                                @elseif($count_status == 0)
                                                    <li><button type="submit" class="btn btn-warning btn-rounded">Ждите активацию</button></li>
                                                @else
                                                    <li><button type="button" class="btn btn-primary btn-rounded">Вы уже в программе</button></li>
                                                @endif

                                            </ul>
                                        </div>
                                    </form>
                                @endforeach

                            </div><!-- /block -->
                        </div><!-- /row -->
                    </div>
                </div>
            </div>
        </div><!-- Row -->
    </div><!-- Main Wrapper -->
@endsection

@push('scripts')

@if ($errors->any())
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
    <script>
        $.toast({
            heading: 'Ошибка валидации!',
            text: '{{ $errors->first() }}',
            position: 'top-right',
            loaderBg:'#ffffff',
            icon: 'error',
            hideAfter: 60000,
            stack: 6
        });
    </script>
@endif

@endpush



@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" rel="stylesheet">
@endpush