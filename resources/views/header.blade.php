<header>
    <div class="header">
        <div class="header-brand">
            <div class="header-title">
                <h1>Тестовое Название</h1>
            </div>
        </div>

        <div class="nav-menu">
            <div class="nav-menu-tabs">Что-то</div>
            <div class="nav-menu-tabs">Мои Таски</div>
            <div class="nav-menu-tabs">Что-то ещё</div>
        </div>
        @if(Auth::check())
        <div id="user" class="header-user">
            {{Auth::user()->name}}
        </div>
        @else
            <div id="user" class="header-user">
                <a href="/login">Login</a>
                <a href="/registration">Register</a>
            </div>
        @endif
    </div>
</header>


