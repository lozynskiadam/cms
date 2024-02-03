window.addEventListener('load', function() {
    var _currentTheme = 'light'
    $('.toggle-theme').on('click', function () {
        _currentTheme = _currentTheme === 'light' ? 'dark' : 'light';
        $('#theme').attr('href', '/assets/css/' + _currentTheme + '.css')
    });
});
