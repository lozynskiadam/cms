document.querySelectorAll('a.sidebar-link').forEach((el) => {
    el.addEventListener('click', function (event) {
        document.querySelectorAll('.sidebar-item.active').forEach((el2) => {
            el2.classList.remove('active');
        });
        this.parentElement.classList.add('active');
    });
});

window.addEventListener('load', function() {
    var _currentTheme = 'light'
    $('.toggle-theme').on('click', function () {
        _currentTheme = _currentTheme === 'light' ? 'dark' : 'light';
        $('#theme').attr('href', '/assets/css/' + _currentTheme + '.css')
    });
});
