export default class System {
    redirectionTime(secounds, url) {
        $('#redirectTime').text(secounds);
        var interval = setInterval(function() {
            secounds = secounds - 1;
            $('#redirectTime').text(secounds);
            if (secounds == 0) {
                location.href = url;
            }
        }, 1000);
    }
}
