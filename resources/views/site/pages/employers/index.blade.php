@extends('site.layouts.app')

@section('title', 'Работодателям')

@section('content')
    <section class="section section-white active" data-anchor="employer">
        <div class="wrapper">
            <div class="section-indent">
                <div class="row party-container">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 party-content">
                        <div class="party-item">
                            <div class="party-info">
                                <h2>Подать вакансии</h2>
                                <p>Подбор подходящей работы с учетом вашей профессии,  квалификации и опыта</p>
                                <div class="party-icon">
                                    <img src="{{ asset('/public/img/system/icons/hand.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 party-content">
                        <div class="party-item">
                            <div class="party-info">
                                <h2>Подать отчет</h2>
                                <p>Ссылка на РВР</p>
                                <div class="party-icon">
                                    <img src="{{ asset('/public/img/system/icons/desktop.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 party-content">
                        <div class="party-item">
                            <div class="party-info">
                                <h2>Квотирование рабочих мест</h2>
                                <p>Обеспечение возможности пройти тестирование и опросы по направлениям мотивации и карьерным трекам</p>
                                <div class="party-icon">
                                    <img src="{{ asset('/public/img/system/icons/circle.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 party-content">
                        <div class="party-item">
                            <div class="party-info">
                                <h2>Моя поддержка</h2>
                                <p>Подготовка к прохождению собеседования с работодателем</p>
                                <div class="party-icon">
                                    <img src="{{ asset('/public/img/system/icons/diagram.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" data-anchor="analytics">
        <span class="counter" data-stop="50">0</span>
    </section>
@endsection

