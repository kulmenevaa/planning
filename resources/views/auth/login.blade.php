@extends('site.layouts.app')

@section('title', 'Вход')

@section('content')
    <section class="section section-white" data-anchor="login">
        <div class="wrapper">
            <div class="section-indent section-center">
                <div class="auth-block">
                    <div class="title-section">
                        <h2>Вход</h2>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="auth-fields">
                            <div class="fields">
                                <input type="email" id="email" name="email" autofocus value="{{ old('email') }}" placeholder=" ">
                                <label for="email">Email</label>
                            </div>
                            <div class="fields">
                                <input type="password" id="password" name="password" placeholder=" ">
                                <label for="password">Пароль</label>
                            </div>
                        </div>
                        <div class="auth-fields-attr">
                            <div class="remember-block">
                                <input type="checkbox" id="remember_me" name="remember">
                                <label for="remember_me">Запомнить меня</label>
                            </div>
                            <div class="forgot-block">
                                <a href="{{ route('password.request') }}">Забыли пароль?</a>
                            </div>
                        </div>
                        <button type="submit" class="btn action-btn full-btn">Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection('content')
