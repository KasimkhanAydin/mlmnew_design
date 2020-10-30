@extends('layouts.system')

@section('content')
    <div class="app-page-title">

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>Активация
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
                                <th>Пользователь</th>
                                <th>Спонсор</th>
                                <th>Программы</th>
                                <th>Активация</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>@if(!is_null(\App\User::find($item->user_id))) {{  \App\User::find($item->user_id)->name }} @endif</td>
                                    <td>@if(!is_null(\App\User::find($item->sponsor_id))) {{  \App\User::find($item->sponsor_id)->name }} @endif</td>
                                    <td>{{ \App\Models\Program::find($item->program_id)->title  }}</td>
                                    <td> <a href="/activation/{{ \App\User::find($item->user_id)->id }}/{{ $item->program_id }}" class="btn btn-success btn-rounded btn-xs" target="_blank">Акт. в {{ \App\Models\Program::find($item->program_id)->title }}</a></td>
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
