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
                    <div>Пользователи
                        <div class="page-title-subheading">Tables are the backbone of almost all web applications.
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                            Buttons
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-inbox"></i>
                                        <span>
                                                            Inbox
                                                        </span>
                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span>
                                                            Book
                                                        </span>
                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-picture"></i>
                                        <span>
                                                            Picture
                                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                        <i class="nav-link-icon lnr-file-empty"></i>
                                        <span>
                                                            File Disabled
                                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Table striped</h5>

                        <form  action="" class="form-inline">
                            <div class="form-group">
                                <input type="text" class="form-control" name="s" placeholder="ID, ФИО, спонсор ..." value="{{ old('s') }}">
                            </div>
                            <button type="submit" class="btn btn-danger">Искать!</button>
                        </form>

                        <table class="mb-0 table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ФИО</th>
                                <th>Email</th>
                                <th>Телефон</th>
                                <th>Программы</th>
                                <th>Активация</th>
                                <th>Бесплатное место</th>
                                <th>Действий</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @foreach ($item->programs as $program)
                                            <?php $count_status = \App\Models\UserProgramStatus::where('user_id',$item->id)->where('program_id',$program->program_id)->count()?>
                                            @if($count_status == 0)
                                                <a href="/activation/{{ $item->id }}/{{ $program->program_id }}" class="btn btn-success btn-rounded btn-xs" target="_blank">Акт. в {{ \App\Models\Program::find($program->program_id)->title }}</a>
                                            @else
                                                {{ \App\Models\Program::find($program->program_id)->title }},
                                            @endif
                                        @endforeach
                                    </td>
                                    <td> <button onclick="otherPrograms({{ $item->id }})" class="btn btn-success btn-rounded btn-xs" target="_blank">Выберите пакет</button></td>
                                    <td>{{is_null($item->programs[0]->original_user_id)?'Нет':'Да'}}</td>
                                    <td class="list">
                                        <a href="" class="btn btn-success btn-rounded btn-xs" title="Посмотреть">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="/user/{{ $item->id }}/edit" class="btn btn-primary btn-rounded btn-xs" title="Редактировать">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{url('user', [$item->id])}}" method="POST">
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
    </div>
@endsection
@push('scripts')
    <script>
        function deleteAlert() {
            if(!confirm("Вы уверены что хотите удалить?"))
                event.preventDefault();
        }

        function otherPrograms(user_id) {
            $.ajax({
                type:'GET',
                url:'/other-programs/'+user_id,
                success:function(data){
                    $("#otherPrograms").html(data);
                    $('#myModal').modal('show')
                }
            });
        }
    </script>


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
