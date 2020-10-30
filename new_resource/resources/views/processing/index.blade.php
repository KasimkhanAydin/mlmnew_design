@extends('layouts.template')

@section('content')
    <div class="app-page-title">

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
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                    <div class="d-inline-block dropdown">


                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table class="mb-0 table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Статус</th>
                                @if(isset($_GET['status']) && $_GET['status'] == 'request')<th>Ответ</th>@endif
                                <th>Сумма</th>
                                <th>Пользователь</th>
                                <th>Инициатор</th>
                                <th>Программы</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>
                                        @if($item->status == 'step')
                                            Бонус за закрытие шага
                                        @elseif($item->status == 'invite')
                                            Реферальный бонус
                                        @elseif($item->status == 'transfer')
                                            Перевод
                                        @elseif($item->status == 'request')
                                            Запрос на Вывод
                                        @elseif($item->status == 'cancel')
                                            Вывод отменен
                                        @else
                                            Вывод
                                        @endif
                                    </td>
                                    @if(isset($_GET['status'])  && $_GET['status'] == 'request')
                                        <td  class="actions">
                                            <form action="/processing/{{ $item->id }}" method="POST" style="display: inline-block;">
                                                {{ csrf_field() }}
                                                @method('PUT')
                                                <input type="hidden" name="status" value="out">
                                                <button class="btn btn-success" type="submit"><i class="fa fa-check"></i></button>
                                            </form>
                                            <form action="/processing/{{ $item->id }}" method="POST"  style="display: inline-block;">
                                                {{ csrf_field() }}
                                                @method('PUT')
                                                <input type="hidden" name="status" value="cancel">
                                                <button class="btn btn-danger" type="submit"><i class="fa fa-close"></i></button>
                                            </form>
                                        </td>
                                    @endif
                                    <td>{{ $item->sum }}</td>
                                    <td>{{ \App\User::find($item->user_id)->name }}</td>
                                    <td>{{ \App\User::find($item->from_user)->name }}</td>
                                    <td>{{ \App\Models\Program::find($item->program_id)->title  }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
