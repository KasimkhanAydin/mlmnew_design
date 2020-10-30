@extends('layouts.system')

@section('content')
    <div class="page-title">
        <h3 class="breadcrumb-header">Программы</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Добавление, изменение, отключение программ</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Наименование</th>
                                    <th>Шаги</th>
                                    <th>Дерево</th>
                                    <th>Статус</th>
                                    <th>Статус оплаты</th>
                                    <th>Статус бонуса за приглашение</th>
                                    <th>Сумма входа</th>
                                    <th>Действий</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $item)

                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->steps }}</td>
                                        <td>{{ $item->tree }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->is_payment }}</td>
                                        <td>{{ $item->is_invite }}</td>
                                        <td>{{ $item->entry_amount }}</td>
                                        <td class="list">
                                            <a href="/user/{{ $item->id }}/edit" class="btn btn-primary btn-rounded btn-xs" title="Редактировать">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{url('program', [$item->id])}}" method="POST">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-rounded btn-xs" onclick="return deleteAlert();">  <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
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
    </div>
    <div id="otherPrograms"></div>
@endsection

@push('scripts')
    <script>
        function deleteAlert() {
            if(!confirm("Вы уверены что хотите удалить?"))
                event.preventDefault();
        }
    </script>
@endpush