document.querySelectorAll('a.sidebar-link').forEach((el) => {
    el.addEventListener('click', function (event) {
        document.querySelectorAll('.sidebar-item.active').forEach((el2) => {
            el2.classList.remove('active');
        });
        this.parentElement.classList.add('active');
    });
});
