<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Управление | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('/public/favicon.ico') }}" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('/public/css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body id="admin" class="loading">
    <div class="preloader">
        <div class="preloader__row">
            <div class="preloader__item"></div>
            <div class="preloader__item"></div>
        </div>
    </div>
    <div class="shadow-window"></div>
    <div class="admin">
        @include('admin.layouts.sidebar')
        <main class="admin-wrapper">
            <nav class="admin-nav">
                <div class="nav-wrapper">
                    <div class="toggle-sidebar">
                        <button type="button" class="toggle-aside">
                            <i class="bx bx-menu"></i>
                        </button>
                    </div>
                    <div class="nav-content">
                        <div class="switch-theme">
                            <i class="bx bx-moon moon"></i>
                            <i class="bx bx-sun sun"></i>
                        </div>
                        <button type="button" class="toggle-profile-menu">
                            <img src="/public/img/system/no_ava.png">
                        </button>
                        <div class="profile-menu">
                            <div class="profile-menu-info">
                                <span class="info1">Кульменев Андрей</span>
                                <span class="info2">andrey.kulmenev@yandex.ru</span>
                            </div>
                            <ul>
                                <li>
                                    <a href="#">Профиль</a>
                                </li>
                                <li>
                                    <a href="#">Настройки</a>
                                </li>
                                <li>
                                    <a href="#">Выйти</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('/public/js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>