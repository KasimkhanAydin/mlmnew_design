<li class="app-sidebar__heading">Dashboards</li>
<li>
    <a href="/dashboard" class="mm-active">
        <i class="metismenu-icon pe-7s-rocket"></i>
        Статистика
    </a>
</li>
<li class="app-sidebar__heading">UI Components</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-diamond"></i>
        Пользователи
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li>
            <a href="/user">
                <i class="metismenu-icon"></i>
                Все пользователи
            </a>
        </li>
        @foreach(\App\Models\Program::all() as $item)
            <li>
                <a href="/user?program={{ $item->id  }}">
                    <i class="metismenu-icon"></i>
                    {{ $item->title }}
                </a>
            </li>
        @endforeach
        <li>
            <a href="/user/create">
                <i class="metismenu-icon">
                </i>Добавить
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-diamond"></i>
        Активация
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li>
            <a href="/user-program">
                <i class="metismenu-icon"></i>
                Все заявки
            </a>
        </li>
        @foreach(\App\Models\Program::all() as $item)
            <li>
                <a href="/user-program?program={{ $item->id  }}">
                    <i class="metismenu-icon">
                    </i>{{ $item->title }}
                </a>
            </li>
        @endforeach
    </ul>
</li>
<li>
    <a href="/reinvests">
        <i class="metismenu-icon pe-7s-display2"></i>
        Рейинвесты
    </a>
</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-diamond"></i>
        Процессинг
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li>
            <a href="/processing">
                <i class="metismenu-icon"></i>
                Все движения
            </a>
        </li>
        <li>
            <a href="/processing?status=request">
                <i class="metismenu-icon">
                </i>Запросы на вывод
            </a>
        </li>
    </ul>
</li>
<li class="app-sidebar__heading">Widgets</li>
<li>
    <a href="/home">
        <i class="metismenu-icon pe-7s-display2"></i>
        Профиль
    </a>
</li>
