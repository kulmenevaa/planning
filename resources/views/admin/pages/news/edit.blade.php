@extends('admin.layouts.app')

@section('title', 'Редактирование новости')

@section('content')
    <nav class="breadcrumb">
        <ol>
            <li>
                <a href="{{ route('admin.home.index') }}">
                    <i class="bx bxs-home mr-2"></i>Управление
                </a>
            </li>
            <li>
                <a href="{{ route('admin.news.index') }}">Новости</a>
            </li>
            <li>
                <span>Редактирование</span>
            </li>
        </ol>
    </nav>
    <section class="section upsert">
        <form id="update_news" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="{{ $news->id }}">
            <input type="hidden" id="image" name="image" value="" class="image-path">
            <div class="row">
                <div class="col-xl-12 tabs">
                    <ul class="tabs-menu">
                        <li class="active">Содержание</li>
                        <li>Подробно</li>
                        <li>SEO</li>
                    </ul>
                    <div class="row">
                        <div class="col-2 xl-10 col-xl-9 left-block">
                            <div class="tabs-content active">
                                <div class="fields">
                                    <input type="text" id="title" name="title" value="{{ $news->title }}" placeholder=" ">
                                    <label for="title">Название</label>
                                </div>
                                <div class="fields" id="abbreviation_tiny">
                                    <textarea id="abbreviation" name="abbreviation" placeholder="Анонс">{{ $news->abbreviation }}</textarea>
                                </div>
                            </div>
                            <div class="tabs-content">
                                <div class="fields max-textarea" id="description_tiny">
                                    <textarea id="description" name="description" placeholder="Описание">{{ $news->description }}</textarea>
                                </div>  
                            </div>
                            <div class="tabs-content">
                                <div class="fields">
                                    <input type="text" id="meta_title" name="meta_title" value="{{ $news->meta_title }}" placeholder=" ">
                                    <label for="meta_title">Title</label>
                                </div>
                                <div class="fields">
                                    <input type="text" id="meta_keywords" name="meta_keywords" value="{{ $news->meta_keywords }}" placeholder=" ">
                                    <label for="meta_keywords">Keywords</label>
                                </div>
                                <div class="fields">
                                    <input type="text" id="meta_description" name="meta_description" value="{{ $news->meta_description }}" placeholder=" ">
                                    <label for="meta_description">Description</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 xl-2 col-xl-3 right-block">
                            <div class="publication-item">
                                <p>Статус публикации:</p>
                                <div class="publication-field">
                                    <input type="radio" id="status-1" name="status" value="1" @if($news->status == 1) checked @endif>
                                    <label for="status-1">Опубликовано</label>
                                </div>
                                <div class="publication-field">
                                    <input type="radio" id="status-2" name="status" value="0" @if($news->status == 0) checked @endif>
                                    <label for="status-2">Черновик</label>
                                </div>
                            </div>
                            <div class="publication-item">
                                <p>Опубликовать:</p>
                                <div class="publication-field">
                                    <label class="publication-field-checkbox">
                                        <input type="checkbox" id="publish_tg" name="publish_tg" value="1" @if($news->publish_tg == 1) checked @endif disabled>
                                        <span>Telegram</span>
                                    </label>
                                </div>
                            </div>
                            <div class="fields public_date_field">
                                <input type="datetime-local" id="public_date" name="public_date" value="{{ date('Y-m-d\TH:i', strtotime($news->public_date)) }}">
                                <label for="public_date">Дата публикации</label>
                            </div>
                            <div class="form-upload">
                                <div class="preview-image" @if($news->image) style="display: block" @endif>
                                    <img src="/{{ $news->image }}" class="img-upload">
                                    <div class="close-preview-image remove-preview">
                                        <i class="bx bx-x"></i>
                                    </div>
                                </div>
                                <div class="image-upload" @if($news->image) style="display: none" @endif>
                                    <label for="file-upload">
                                        <i class="bx bx-image-add"></i>
                                        <div class="image-upload-form">
                                            <input type="file" class="popup_selector" data-inputid="image">
                                            <p>Загрузите файл</p>
                                        </div>
                                        <p class="image-upload-info">PNG, JPG, GIF</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="buttons">
                        <a href="{{ route('admin.news.index') }}" class="btn action-outline-btn">Отмена</a>
                        <button type="submit" class="btn action-btn">Сохранить</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const request = new $.request;
            $('#update_news').on('submit', function(e) {
                e.preventDefault();
                let id = $('#id').val();
                let data = new FormData(this);
                data.append('_method', 'put');
                request.post('{{ route("admin.news.store") }}' + '/' + id, data).done(function(response) {
                    $.system.prototype.redirectionTime(redirectTimer, '{{ route("admin.news.index") }}');
                    $.swal.fire({
                        title: response.message,
                        html: 
                            '<div>Перенаправление на страницу ' +
                                '<a href="{{ route("admin.news.index") }}" class="link-redirect">Новости</a>' +
                            '</div>' +
                            '<div>произойдет через <span id="redirectTime">'+ redirectTimer +'</span> секунд</div>',
                        icon: 'success',
                        showCloseButton: true,
                        showConfirmButton: false
                    });
                });
            })
        });
    </script>
@endsection