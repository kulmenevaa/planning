@extends('site.layouts.app')

@section('title', 'Соискателям')

@section('content')
    <section class="section section-white active" data-anchor="applicant">
        <div class="wrapper">
            <div class="section-indent">
                <div class="row party-container">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 party-content">
                        <div class="party-item">
                            <div class="party-info">
                                <h2>Актуальный банк вакансий</h2>
                                <p>Подбор подходящей работы с учетом вашей профессии, квалификации и опыта</p>
                                <div class="party-icon">
                                    <img src="{{ asset('/public/img/system/icons/hand.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 party-content">
                        <div class="party-item">
                            <div class="party-info">
                                <h2>Подайте заявление</h2>
                                <p>Ссылка на РВР</p>
                                <div class="party-icon">
                                    <img src="{{ asset('/public/img/system/icons/desktop.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 party-content">
                        <div class="party-item">
                            <div class="party-info">
                                <h2>Составим резюме</h2>
                                <p>Экспертиза резюме, консультирование по заполнению и/или корректировке </p>
                                <div class="party-icon">
                                    <img src="{{ asset('/public/img/system/icons/file.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 party-content">
                        <div class="party-item">
                            <div class="party-info">
                                <h2>Найдем ваши лучшие стороны</h2>
                                <p>Обеспечение возможности пройти тестирование и опросы по направлениям мотивации и карьерным трекам</p>
                                <div class="party-icon">
                                    <img src="{{ asset('/public/img/system/icons/circle.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 party-content">
                        <div class="party-item">
                            <div class="party-info">
                                <h2>Подготовим к собеседованию</h2>
                                <p>Подготовка к прохождению собеседования с работодателем</p>
                                <div class="party-icon">
                                    <img src="{{ asset('/public/img/system/icons/check.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 party-content">
                        <div class="party-item">
                            <div class="party-info">
                                <h2>Поможем построить карьеру</h2>
                                <p>Консультирование по вопросам карьеры и профессионального развития</p>
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
    <section class="section section-gray" data-anchor="path">
        <div class="wrapper">
            <div class="section-indent">
                <div class="title-section">
                    <h2>Мероприятия</h2>
                </div>
                <div class="section-content">
                    <div class="row events-container">
                        <div class="col-md-4">
                        <div>text2: <span class="text2">1000</span></div>
                        </div>
                        <div class="col-md-8">
                            32
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
