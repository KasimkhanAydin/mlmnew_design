@extends('layouts.profile')
@php
    use \App\Models\UserProgramStatus;
@endphp
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                    </i>
                </div>
                <div>Иерархия
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

        @if(\App\Models\FreeProgram::where('user_id',\Auth::user()->id)->get())
            @foreach(\App\Models\FreeProgram::where('user_id',\Auth::user()->id)->get() as $freeplaces)
                @if($freeplaces->status=='pending')
                    Вы отправили заявку . Ждите ответа администратора
                @else
                    У вас  есть одно бесплатное место в программе {{$freeplaces->program['title']}}
                    <form action="getFreeProgram" method="post">
                        @csrf
                        <input type='hidden' name="free_place_id" value="{{$freeplaces->id}}">
                        <input type='hidden' name="program_id" value="{{$freeplaces->program_id}}">
                        <input type='number' name="sponsor_id" placeholder="id спонсора">
                        <input type="submit" value="Получить">
                    </form>
                @endif
            @endforeach
        @endif

        <div class="col-lg-12">
            <div id="accordion" class="accordion-wrapper mb-3">

                @foreach($user_programs as $item)
                    <div class="panel panel-white home">
                        <div class="mb-3 card card-body">
                            Пользователь: {{ \App\User::find($user_id)->name }} <br>
                            Наименование программы - {{ $item->title }} <br>
                            Сумма входа - {{ $item->entry_amount }} тг <br>
                            Пользователей в команде - {{ Facades\App\Facades\Hierarchy::followersCount($user_id,$item->program_id )  }} <br>
                            Ваш спонсор - @if(!is_null(\App\User::find($item->sponsor_id))) {{ \App\User::find($item->sponsor_id)->name }} @else  Вы админ  @endif
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                                @for($i = 1; $i <= $item->steps; $i++)

                                    <div class="card">
                                        <div id="headingOne" class="card-header @if($i <= $item->step) panel-success @else panel-danger @endif">
                                            <button type="button" data-toggle="collapse" data-target="#collapseOne{{$i}}" aria-expanded="true"
                                                    aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                <h5 class="m-0 p-0">Шаг #{{ $i }}</h5>
                                            </button>
                                        </div>
                                        <div data-parent="#accordion" id="collapseOne{{$i}}" aria-labelledby="headingOne" class="collapse @if($i == $item->step) show @endif">
                                            <div class="card-body">
                                                @if($i <= $item->step)
                                                    <ul class="tree vertical">
                                                        <li>
                                                            <div>{{ \App\User::find($user_id)->name }}(ID:{{ $user_id }})</div>
                                                            <ul>
                                                                <?php $users = Facades\App\Facades\Hierarchy::getStepUsers($user_id,$item->id,$i);?>
                                                                @if($i == $item->step)
                                                                    @foreach($users as $user)
                                                                        <li>
                                                                            <div>{{ $user->name }}(ID:{{ $user->id }}|<a href="/home?tree={{ $user->id }}">В команде:{{ Facades\App\Facades\Hierarchy::followersCount($user->id,$item->program_id)  }}</a>)</div>
                                                                        </li>
                                                                    @endforeach

                                                                    <?php $counter = $item->tree - count($users) ?>
                                                                    @for($j=1; $j<=$counter; $j++)
                                                                        <li>
                                                                            <div>Пусто</div>
                                                                        </li>
                                                                    @endfor

                                                                @else
                                                                    @foreach(Facades\App\Facades\Hierarchy::getAllUsers(Auth::user()->id,$item->id) as $user)
                                                                        <li>
                                                                            <div>{{ $user->name }}(ID:{{ $user->id }}|<a href="/home?tree={{ $user->id }}">В команде:{{ Facades\App\Facades\Hierarchy::followersCount($user->id,$item->program_id)  }}</a>)</div>
                                                                        </li>
                                                                    @endforeach
                                                                @endif
                                                            </ul>
                                                        </li>
                                                    </ul>

                                                    @if($i != $item->step) <p class="text-primary">Этот шаг пройден.</p>@endif
                                                @else
                                                    <div class="alert alert-danger" role="alert" style="margin-bottom:0;">
                                                        Вы еще не дошли до этого шага!
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!--------------------------------Бесплатно алынган программалар-------------------------------------------->
        @if(isset($otherusers))
            @foreach($otherusers as $key=>$user)

                    <div class="col-lg-12">
                        <div id="accordion{{$key}}" class="accordion-wrapper mb-3">

                    @if(\App\Models\FreeProgram::where('user_id',$user->id)->get())
                        @foreach(\App\Models\FreeProgram::where('user_id',$user->id)->get() as $freeplaces)
                            @if($freeplaces->status=='pending')
                                Вы отправили заявку . Ждите ответа администратора
                            @else
                                У вас  есть одно бесплатное место в программе {{$freeplaces->program['title']}}
                                <form action="getFreeProgram" method="post">
                                    @csrf
                                    <input type='hidden' name="free_place_id" value="{{$freeplaces->id}}">
                                    <input type='hidden' name="program_id" value="{{$freeplaces->program_id}}">
                                    <input type='number' name="sponsor_id" placeholder="id спонсора">
                                    <input type="submit" value="Получить">
                                </form>
                            @endif
                        @endforeach
                    @endif

                    @php
                        $user_programs = UserProgramStatus::whereUserId($user->id)->join('programs','user_program_statuses.program_id','=','programs.id')->get();
                    @endphp
                    @foreach($user_programs as $key=>$item)
                        <div class="panel panel-white home">
                            <div class="mb-3 card card-body">
                                Пользователь: {{ \App\User::find($user->id)->name }} <br>
                                ID: {{ $user->id }} <br>
                                Наименование программы - {{ $item->title }} <br>
                                Сумма входа - {{ $item->entry_amount }} тг <br>
                                Пользователей в команде - {{ Facades\App\Facades\Hierarchy::followersCount($user->id,$item->program_id )  }} <br>
                                Ваш спонсор - @if(!is_null(\App\User::find($item->sponsor_id))) {{ \App\User::find($item->sponsor_id)->name }} @else  Вы админ  @endif
                            </div>

                                    @for($i = 1; $i <= $item->steps; $i++)

                                        <div class="card">
                                            <div id="headingOne" class="card-header @if($i <= $item->step) panel-success @else panel-danger @endif">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne{{$key}}{{$i}}" aria-expanded="true"
                                                        aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <h5 class="m-0 p-0">Шаг #{{ $i }}</h5>
                                                </button>
                                            </div>
                                            <div data-parent="#accordion{{$key}}" id="collapseOne{{$key}}{{$i}}" aria-labelledby="headingOne" class="collapse @if($i == $item->step) show @endif">
                                                <div class="card-body">
                                                    @if($i <= $item->step)
                                                        <ul class="tree vertical">
                                                            <li>
                                                                <div>{{ \App\User::find($user->id)->name }}(ID:{{ $user->id }})</div>
                                                                <ul>
                                                                    <?php $users = Facades\App\Facades\Hierarchy::getStepUsers($user->id,$item->id,$i);?>
                                                                    @if($i == $item->step)
                                                                        @foreach($users as $user)
                                                                            <li>
                                                                                <div>{{ $user->name }}(ID:{{ $user->id }}|<a href="/home?tree={{ $user->id }}">
                                                                                        В команде:{{ Facades\App\Facades\Hierarchy::followersCount($user->id,$item->program_id)  }}</a>)
                                                                                </div>
                                                                            </li>
                                                                        @endforeach

                                                                        <?php $counter = $item->tree - count($users) ?>
                                                                        @for($j=1; $j<=$counter; $j++)
                                                                            <li>
                                                                                <div>Пусто</div>
                                                                            </li>
                                                                        @endfor

                                                                    @else
                                                                        @foreach(Facades\App\Facades\Hierarchy::getAllUsers($user->id,$item->id) as $user)
                                                                            <li>
                                                                                <div>{{ $user->name }}(ID:{{ $user->id }}|<a href="/home?tree={{ $user->id }}">В команде:{{ Facades\App\Facades\Hierarchy::followersCount($user->id,$item->program_id)  }}</a>)</div>
                                                                            </li>
                                                                        @endforeach
                                                                    @endif
                                                                </ul>
                                                            </li>
                                                        </ul>

                                                        @if($i != $item->step) <p class="text-primary">Этот шаг пройден.</p>@endif
                                                    @else
                                                        <div class="alert alert-danger" role="alert" style="margin-bottom:0;">
                                                            Вы еще не дошли до этого шага!
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        @endforeach
    @endif
    <!---------------------------------------------------------------------------------------------------------->

@endsection

@push('styles')
    <link href="/ecaps/theme/assets/css/tree.css" rel="stylesheet">
@endpush
