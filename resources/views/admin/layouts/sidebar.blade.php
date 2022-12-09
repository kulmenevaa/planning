<aside>
    <div class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="logo">
                <a href="" class="brand">
                    <img src="/public/img/system/logo.png"/>
                    <span>Управление</span>
                </a>
                <div class="hide-aside toggle-aside">
                    <i class="bx bx-x"></i>
                </div>
            </div>
            <ul class="main-menu">
                <li> 
                    <a href="#">
                        <i class="bx bxs-pie-chart-alt-2"></i>
                        <span class="name">Статистика</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/news*') ? 'active' : '' }}">
                    <a href="{{ route('admin.news.index') }}">
                        <i class="bx bx-news"></i>
                        <span class="name">Новости</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/events*') ? 'active' : '' }}">
                    <a href="{{ route('admin.events.index') }}">
                        <i class="bx bx-calendar-event"></i>
                        <span class="name">Мероприятия</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bx bx-message-rounded-dots"></i>
                        <span class="name">Вопросы/Ответы</span>
                    </a>
                </li>
                <li class="">
                    <a href="">
                        <i class="bx bxs-user-circle"></i>
                        <span class="name">Пользователи</span>
                    </a>
                </li>
                <li>
                    <button type="button" class="toggle-sub-menu">
                        <i class="bx bxs-user-circle"></i>
                        <span class="name">Выпадающее меню</span>
                        <i class="bx bx-chevron-right rotate"></i>
                    </button>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">Products</a>
                        </li>
                        <li>
                            <a href="#">Billing</a>
                        </li>
                        <li>
                            <a href="#">Invoice</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button" class="toggle-sub-menu">
                        <i class="bx bxs-user-circle"></i>
                        <span class="name">Выпадающее меню</span>
                        <i class="bx bx-chevron-right rotate"></i>
                    </button>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">Products</a>
                        </li>
                        <li>
                            <a href="#">Billing</a>
                        </li>
                        <li>
                            <a href="#">Invoice</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="bx bxs-user-circle"></i>
                        <span class="name">Сообщения</span>
                        <span class="badge">3</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidebar-footer">
            <ul>
                <li>
                    <a href="{{ route('site.home.index') }}">
                        <i class="bx bx-chevron-left-circle"></i>
                        <span>Вернуться на сайт</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>