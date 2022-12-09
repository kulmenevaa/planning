@extends('admin.layouts.app')

@section('title', 'Новости')

@section('content')
    <nav class="breadcrumb">
        <ol>
            <li>
                <a href="{{ route('admin.home.index') }}">
                    <i class="bx bxs-home mr-2"></i>Управление
                </a>
            </li>
            <li>
                <span>Новости</span>
            </li>
        </ol>
    </nav>
    <section class="section">
        <div class="title-page">
            <div class="title">
                <h2>Новости</h2>
                <p class="count" id="count_news"></p>
            </div>
            <div class="action-block">
                <div class="title-action table-control mr-3"></div>
                <div class="title-action">
                    <a href="{{ route('admin.news.create') }}" class="btn action-btn">
                        <i class="bx bx-plus"></i>Добавить
                    </a>
                </div>
            </div>
        </div>
        <div class="table-wrapper">
            <table class="table responsive">
                <thead>
                    <tr>
                        <th class="py-3 px-6">Название</th>
                        <th class="py-3 px-6">Анонс</th>
                        <th class="py-3 px-6">Дата публикации</th>
                        <th class="py-3 px-6"></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Название</th>
                        <th>Анонс</th>
                        <th>Дата публикации</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const request = new $.request;
            var table = $('.table').DataTable({
                ajax: {
                    url: '{{ route("admin.news.all") }}',
                    type: 'get',
                    dataType: 'json',
                    dataSrc: 'news'
                },
                columns: [
                    {data:'title', name:'title'},
                    {data:'abbreviation', name:'abbreviation'},
                    {data:'public_date', name:'public_date'},
                    {data:'id', orderable:false, searchable: false, render:function(data) {
                        return '<a href="{{ route("admin.news.index") }}'+ '/' + data +'/edit">Изменить</a>' +
                               '<button type="button" id="delete" value="'+ data +'">Удалить</button>';
                    }}
                ],
                initComplete: function(settings, json) { 
                    var info = this.api().page.info(); 
                },
                language: {'url': '/public/js/ru.js'},
                order: [[2, 'desc']],
                stateSave: true,
                responsive: true
            });

            $(document).on('click', '#delete', function() {
                var id = $(this).val();
                $.swal.fire({
                    title: 'Вы уверены?',
                    text: 'Запись будет удалена без права восстановления!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(var(--darkblue))',
                    cancelButtonColor: 'rgb(var(--darkblue), .2)',
                    confirmButtonText: 'Да, удалить!',
                    cancelButtonText: 'Отмена',
                    showCloseButton: true,
                }).then(result => {
                    if(result.isConfirmed) {
                        request.delete('{{ route("admin.news.index") }}'+ '/' + id).done(function(response) {
                            table.ajax.reload();
                            $.swal.fire({
                                title: response.message,
                                icon: 'success',
                                showCloseButton: true,
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        });
                    }
                });
            });
        });
    </script>
@endsection