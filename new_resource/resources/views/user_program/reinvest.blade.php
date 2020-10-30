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
                    <div>Реинвест
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
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table class="mb-0 table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Логин</th>
                                <th>Этап</th>
                                <th>Программа</th>
                                <th>Дата рег</th>
                                <th>Баланс</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $key=>$item)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{$item->user['name']}}</td>
                                    <td>{{$item->is_done?'Завершил':$item->step}}</td>
                                    <td>{{$item->program['title']}}</td>
                                    <td>{{$item->created_at->format('d.m.Y H:i')}}</td>
                                    <td>{{\Facades\App\Facades\Balance::getBalance($item->user_id)}}тг</td>
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
