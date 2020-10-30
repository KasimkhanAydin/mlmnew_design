<li class="app-sidebar__heading">Dashboards</li>
<li>
    <a href="/home" class="mm-active">
        <i class="metismenu-icon pe-7s-rocket"></i>
        Иерархия
    </a>
</li>
<li class="app-sidebar__heading">UI Components</li>
<li>
    <a href="/edit-user">
        <i class="metismenu-icon pe-7s-display2"></i>
        Профиль
    </a>
</li>
<li>
    <a href="/package">
        <i class="metismenu-icon pe-7s-display2"></i>
        Пакеты
    </a>
</li>
<li>
    <a href="/user-processing">
        <i class="metismenu-icon pe-7s-display2"></i>
        Процессинг
    </a>
</li>

<li class="app-sidebar__heading">Widgets</li>
<li>
    <a href="/dashboard">
        <i class="metismenu-icon pe-7s-display2"></i>
        Админ панель
    </a>
</li>

<li>
    <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="metismenu-icon pe-7s-display2"></i>
        Выход
    </a>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</li>
