import './bootstrap';

/* Libraries */
import $ from 'jquery'
import './packages/fullpage/fullpage.min'
import './packages/jquery-ui/jquery.ui'
import './packages/countup/jquery.countup'

import './packages/datatable/dataTables.min'
import './packages/tinymce/tinymce'
import './packages/tinymce/ru'
import './packages/barryvdh/jquery.colorbox-min'
import './packages/barryvdh/elfinder/js/standalonepopup'
import swal from './packages/sweetalert/sweetalert2.min'

/* Custom */
import * as components from './services/components'
import request from './services/requests'
import system from './services/system'

import './custom/global'
import './custom/admin'
import './custom/site'

// Setting the corrected date 
export default Date.prototype.setDateValue = function(local) {
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,16);
}

try {
    window.$ = window.jQuery = $;
    window.redirectTimer = 10;
    window.loadingTimer = 500;

    $.extend({
        components, 
        request,
        system,
        swal
    });
} catch(e) {
    console.log('Error: ' + e.name + ":" + e.message + "\n" + e.stack);
}