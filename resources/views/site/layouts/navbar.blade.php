<nav class="navbar">    
    <ul class="navbar-links">
        <li>
            <a href="#" class="active">
                <i class="bx bx-user-voice"></i>
                <span>Объявления</span>
            </a>
        </li>
        <li class="{{ request()->is('events*') ? 'active' : '' }}">
            <a href="{{ route('site.events.index') }}">
                <i class="bx bx-calendar-event"></i>
                <span>Мероприятия</span>
            </a>
        </li>
        <li class="{{ request()->is('news*') ? 'active' : '' }}">
            <a href="{{ route('site.news.index') }}">
                <i class="bx bx-news"></i>
                <span>Новости</span>
            </a>
        </li>
        <span class="indicator"></span>
    </ul>
    <ul class="navbar-roles">
        <li class="{{ request()->is('applicants*') ? 'active' : '' }}">
            <a href="{{ route('site.applicants.index') }}">Соискателям</a>
        </li>
        <li class="{{ request()->is('employers*') ? 'active' : '' }}">
            <a href="{{ route('site.employers.index') }}">Работодателям</a>
        </li>
    </ul>
</nav>
