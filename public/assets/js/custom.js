window.addEventListener('load', function() {
    var _currentTheme = 'light'
    $('.toggle-theme').on('click', function () {
        _currentTheme = _currentTheme === 'light' ? 'dark' : 'light';
        if (_currentTheme === 'dark') {
            $('#theme').attr('href', '/assets/css/dark.css')
            $('.toggle-theme i').removeClass('ti-moon').addClass('ti-sun');
        } else {
            $('#theme').attr('href', '/assets/css/light.css')
            $('.toggle-theme i').removeClass('ti-sun').addClass('ti-moon');
        }
    });
});
