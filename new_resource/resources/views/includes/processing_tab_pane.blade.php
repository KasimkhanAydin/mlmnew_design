<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-white stats-widget">
            <div class="panel-body">
                <div class="pull-left">
                    <span class="stats-number">{{ $balance }} тг</span>
                    <p class="stats-info">Баланс</p>
                </div>
                <div class="pull-right">
                    <i class="icon-arrow_upward stats-icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-white stats-widget">
            <div class="panel-body">
                <div class="pull-left">
                    <span class="stats-number">{{ $out }} тг</span>
                    <p class="stats-info">Вывод</p>
                </div>
                <div class="pull-right">
                    <i class="icon-arrow_downward stats-icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-white stats-widget">
            <div class="panel-body">
                <div class="pull-left">
                    <span class="stats-number">{{ $transfer }} тг</span>
                    <p class="stats-info">Переводы</p>
                </div>
                <div class="pull-right">
                    <i class="icon-arrow_upward stats-icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-white stats-widget">
            <div class="panel-body">
                <div class="pull-left">
                    <span class="stats-number">{{ $all  }} тг</span>
                    <p class="stats-info">Общий оборот</p>
                </div>
                <div class="pull-right">
                    <i class="icon-arrow_upward stats-icon"></i>
                </div>
            </div>
        </div>
    </div>
</div><!-- Row -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab">Вывод на карту</a></li>
                        <li role="presentation"><a href="#tab2" role="tab" data-toggle="tab">Перевод</a></li>
                        <li role="presentation"><a href="#tab3" role="tab" data-toggle="tab">Выод на эл. кошелек</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab1">
                            <div class="panel-body">
                                <form action="/request" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail3">Выводимая сумма</label>
                                        <input type="number"  name="sum" class="form-control" placeholder="Выводимая сумма" max="{{ $balance }}" min="0" required>
                                        <input type="hidden"  name="user_id" class="form-control" value="{{$user}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPassword3">Password</label>
                                        <input type="number"  name="login" class="form-control" placeholder="Номер карты" required>
                                    </div>
                                    <button class="btn btn-info" type="submit">Вывести</button>
                                </form>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab2">
                            <div class="panel-body">
                                <form action="/transfer" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail3">Переводимая сумма</label>
                                        <input type="number"  name="sum" class="form-control" placeholder="Переводимая сумма" max="{{ $balance }}" min="0"  required>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPassword3">Password</label>
                                        <input type="text"  name="transfer_user_id" class="form-control" placeholder="Почта абонента" required>
                                    </div>
                                    <button class="btn btn-info" type="submit">Перевести</button>
                                </form>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab3">
                            <div class="alert alert-warning"> <i class="mdi mdi-cash-multiple"></i> Вывод на эл. кошелек не доступен.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Row -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Статус</th>
                            <th>Сумма</th>
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
                                    @elseif($item->status == 'register')
                                        Регистрация
                                    @elseif($item->status == 'cancel')
                                        Вывод отменен
                                    @else
                                        Вывод
                                    @endif
                                </td>
                                <td>{{ $item->sum }}</td>
                                <td>
                                             <span class="text-success">
                                                @if($item->status == 'transfer')
                                                     @if($item->user_id == Auth::user()->id)
                                                         Вы перевели,
                                                     @else
                                                         Вам перевели
                                                     @endif
                                                 @endif
                                                 {{ \App\User::find($item->from_user)->name }}
                                            </span>
                                </td>
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
</div><!-- Row -->
