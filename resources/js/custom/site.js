import isvek from './../packages/bvi/js/bvi'

$(document).ready(function() {
    var counterScreen = 0, counterScreenList = [];
    $('#fullpage > section').each(function() {
        var elem = $(this).attr('data-anchor');
        if(elem !== undefined || elem !== null) {
            counterScreenList.push(elem);
            counterScreen++
        }
    });
    $('#fullpage').fullpage({
        navigation: true,
        scrollBar: false,
        autoScrolling: true,
        fitToSection: false,
        anchors: counterScreenList,
        afterLoad: function(anchorLink, index) {
            if(index.anchor === 'analytics') {
                $('.counter').countUp({
                    last: $('.counter').data('stop')
                });
            }
        }
    });

    $('#logout').on('click', function(e) {
        e.preventDefault();
        this.closest('form').submit()
    });

    $('.auth-menu').on('click', function() {
        $('.auth-menu-items').toggle();
    });

    $('.popup-right-block').on('click', function() {
        $('.shadow-window').toggle();
        $('.view-popup-right-block').toggle();
    });
    
    $('.close-popup-right-block').on('click', function() {
        $('.shadow-window').toggle();
        $('.view-popup-right-block').toggle();
    });

    // class instance Bvi
    new isvek.Bvi({
        speech: false
    }); 

    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: 'Предыдущий',
        nextText: 'Следующий',
        currentText: 'Сегодня',
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
        dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
        dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);
});