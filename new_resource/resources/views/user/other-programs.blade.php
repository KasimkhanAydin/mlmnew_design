<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="GET" action="{{ route('other-programs-activate') }}"  class="form-horizontal">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Добавить пользователя в другую программу</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="input-name" class="col-sm-2 control-label">ФИО</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="input-name" value="{{ $user->name }}" disabled>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Программа</label>
                        <div class="col-sm-10">
                            <select style="margin-bottom:15px;" name="program_id" class="form-control" value="{{ old('program_id') }}" >
                                @foreach($programs as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('program_id'))
                                <p class="help-block text-danger">{{ $errors->first('program_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-sponsor_id" class="col-sm-2 control-label">ID спонсора</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="sponsor_id" id="input-sponsor_id"  value="{{ old('sponsor_id') }}" required>
                            <p class="help-block">Регистрируемый пользователь окажется под этим спонсором</p>
                            @if ($errors->has('sponsor_id'))
                                <p class="help-block text-danger">{{ $errors->first('sponsor_id') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Отправить</button>
                </div>
            </div>
        </form>
    </div>
</div>