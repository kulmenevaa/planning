<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('/public/favicon.ico') }}" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('/public/css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body id="site" class="loading">
    <div class="preloader">
        <div class="preloader__row">
            <div class="preloader__item"></div>
            <div class="preloader__item"></div>
        </div>
    </div>
    <div class="shadow-window"></div>
    <div class="page">
        <header>
            <div class="header-container wrapper">
                <div class="header-content">
                    <div class="logo">
                        <a href="{{ route('site.home.index') }}">
                            <img src="{{ asset('/public/img/system/logo_RR.svg') }}"/>
                        </a>
                    </div>
                    @include('site.layouts.navbar')
                    <div class="extra">
                        <div class="bvi-open">
                            <i class="bx bx-show-alt"></i>
                        </div>
                        <button type="button" class="switch-theme">
                            <i class="bx bx-moon moon"></i>
                            <i class="bx bx-sun sun"></i>
                        </button>
                        <button type="button" class="popup-right-block">
                            <i class="bx bx-menu"></i>
                        </button>
                        @auth
                        <button type="button" class="auth-menu">
                            <i class="bx bx-user"></i>
                        </button>
                        <div id="dropdown" class="auth-menu-items">
                            <ul>
                                @role('admin')
                                <li>
                                    <a href="{{ route('admin.home.index') }}">Управление</a>
                                </li>
                                @endrole
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="button" id="logout">Выйти</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </header>
        <div class="view-popup-right-block">
            <h5 class="title-right-block">Тайтл</h5>
            <button type="button" class="close-popup-right-block">
                <i class="bx bx-x"></i>
            </button> 
        </div>
        <main id="fullpage">
            @yield('content')
            <footer class="section fp-auto-height" data-anchor="#">
                <div class="footer-container wrapper">
                    <div class="footer-content row">
                        <div class="logo col-xl-2 col-md-6">
                            <a href="{{ route('site.home.index') }}">
                                <img src="{{ asset('/public/img/system/logo_RR.svg') }}"/>
                            </a>
                        </div>
                        <div class="col-xl-2 col-md-6 footer-item">
                            <p>Все права защищены</p>
                        </div>
                        <div class="col-xl-6 col-md-6 footer-item"> 
                            <p>Любое копирование собственных материалов сайта разрешено с обязательным использованием ссылки на ресурс.</p>
                        </div>
                        <div class="col-xl-2 col-md-6 footer-item">
                            <p class="footer-social-title">Мы в социальных сетях</p>
                            <div class="footer-social">
                                <a href="https://vk.com/czn_tomsk" target="_blank">
                                    <i class="bx bxl-vk"></i>
                                </a>
                                <a href="https://t.me/czn_tsk" target="_blank">
                                    <i class="bx bxl-telegram"></i>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </main>
    </div>
    <script src="{{ asset('/public/js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>