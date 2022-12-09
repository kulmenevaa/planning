export class Mode {
    constructor() {
        this.tiny = new Tiny();
        this.mode = localStorage.getItem('mode');
        if (this.mode && this.mode === 'dark-mode') {
            $('body').addClass("dark");
            $('.switch-theme').addClass('active');
            this.tiny.setThemeTinymce('dark');
        } else this.tiny.setThemeTinymce('default')
    }

    toggle() {
        $('.switch-theme').toggleClass('active');
        $('body').toggleClass('dark');
        if ($('body').hasClass('dark')) {
            localStorage.setItem('mode', 'dark-mode');
            this.tiny.setThemeTinymce('dark'); 
        } else {
            localStorage.setItem('mode', 'light-mode');
            this.tiny.setThemeTinymce('default');
        }
    }
}

export class Aside {
    constructor() {
        this.get = localStorage.getItem('aside');
        if (this.get && this.get === 'close-aside') {
            $('.admin').addClass('close-aside');
        }
    }

    toggle() {
        var aside = $('.admin').toggleClass('close-aside');
        if (aside.hasClass('close-aside')) {
            localStorage.setItem('aside', 'close-aside');
        } else {
            localStorage.setItem('aside', 'view-aside');
        }
    }
}

export class Tiny {
    setThemeTinymce(content_css) {
        let tinyOptions = {
            selector: 'textarea', 
            plugins:  [
                'preview', 'searchreplace', 'visualblocks',
                'code', 'link', 'image', 'media', 'table', 
                'charmap', 'emoticons', 'pagebreak', 
                'help', 'wordcount'
            ],
            toolbar: 'undo redo | bold italic underline strikethrough | ' +
                     'alignleft aligncenter alignright alignjustify | ' +
                     'outdent indent | ' +
                     'forecolor backcolor removeformat | ' + 
                     'pagebreak | ' +
                     'charmap emoticons | ' + 
                     'code preview print | ' +
                     'image media link table searchreplace',
            menubar: '',
            language: 'ru',
            setup: (editor) => {
                editor.on('focus', (e) => {
                    e.target.editorContainer.classList.toggle('focused');
                });
                editor.on('blur', (e) => {
                    e.target.editorContainer.classList.toggle('focused');
                });
            },
            image_title: true,
            automatic_uploads: true,
            file_picker_callback: function (callback, value, meta) {
                tinymce.activeEditor.windowManager.openUrl({
                    title: 'File Manager',
                    url: '/elfinder/tinymce5',
                    onMessage: function (dialogApi, details) {
                        if (details.mceAction === 'fileSelected') {
                            const file = details.data.file;
                            const info = file.name;
                            if (meta.filetype === 'file') callback(file.url, {text: info, title: info});
                            if (meta.filetype === 'image') callback(file.url, {alt: info});
                            if (meta.filetype === 'media') callback(file.url);
                            dialogApi.close();
                        }
                    }
                });
            }
        }
        if(typeof tinymce !== 'undefined') {
            tinymce.remove()
            if(content_css === 'dark') {
                tinyOptions['skin'] = 'oxide-' + content_css;
                tinyOptions['content_css'] = content_css;
                tinyOptions['content_style'] = `
                    body {
                        background-color: rgb(55 65 81);
                    }
                    .mce-content-body[data-mce-placeholder]:not(.mce-visualblocks)::before {
                        color: rgb(156 163 175);
                    }
                `;
            } else {
                tinyOptions['skin'] = 'oxide';
                tinyOptions['content_css'] = content_css;
                tinyOptions['content_style'] = `
                    body {
                        background-color: rgb(255 255 255);
                    }
                    .mce-content-body[data-mce-placeholder]:not(.mce-visualblocks)::before {
                        color: rgb(107 114 128);
                    }
                `;
            }
            tinymce.init(tinyOptions);
        } 
    }
}

export class Modal {
    open(params) {
        $(params.type).addClass('open');
        $(params.type + ' h3').html('');
        $(params.type + ' h3').text(params.text);
        if($(params.type).hasClass('open')) {
            $('body').css('overflow-y', 'hidden');
        }
    }

    close(type) {
        $(type).removeClass('open');
        $('body').css('overflow-y', 'auto');
    }
}

export class Table {    
    getTableControl(titleHead) {
        var control = '';
        control += '\
            <button type="button" id="toggleDropTable" class="action-outline">\
                Видимость\
                <i class="bx bx-chevron-down rotate-dropdown"></i>\
            </button>\
            <div class="table-dropdown">\
                <ul>';
                    $(titleHead).each(function(key, value) {
                        control += '\
                            <li>\
                                <label>\
                                    <input type="checkbox" id="col'+ (key+1) +'">\
                                    <span id="col'+ (key+1) +'">'+ value +'</span>\
                                </label>\
                            </li>\
                        ';
                    });
                    control += '\
                </ul>\
            </div>\
        ';
        $(document).on('click', '#toggleDropTable', function() {
            $('.table-dropdown').toggle();
            $('.rotate-dropdown').toggleClass('rotate180');
        });
        $('.table-control').html('').append(control);
    }

    getTable(titleHead, content, storage) {
        var block = '';
        var head = '';
        this.getTableControl(titleHead, storage);
        head += '\
            <tr>';
                $(titleHead).each(function(key, value) {
                    head += '<th data-col="col'+ (key+1) +'">'+ value +'</th>';
                });
                head += '\
            </tr>\
        ';
        block += '\
            <table class="table">\
                <thead>'+ head +'</thead>\
                <tbody>'+ content +'</tbody>\
                <tfoot>'+ head + '</tfoot>\
            </table>\
        ';
        $('.table-wrapper').html('').append(block);
        this.checkedViewColumn(storage)
    }

    checkedViewColumn(storage) {
        let news_control = JSON.parse(localStorage.getItem(storage));
        $(news_control).each(function(key, value) {
            $('#'+ value).prop('checked', true);
            if($('#'+ value).is(':checked')) {
                $("[data-col='" + value + "']").hide();
            };
        });
    }

    changeViewColumn(selector, storage) {
        var arr = [];
        var colHide = $(selector).attr('id');    
        if(selector.checked) $("[data-col='" + colHide + "']").hide();        
        else $("[data-col='" + colHide + "']").show();
        $('.table-control input[type="checkbox"]').each(function(key, value) {
            if($(value).is(':checked')) arr.push(value.id);     
        });
        localStorage.setItem(storage, JSON.stringify(arr));
    }
}

