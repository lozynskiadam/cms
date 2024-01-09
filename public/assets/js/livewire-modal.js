Livewire.modal = {
    _storage: {},

    open: function(component, data = {}) {
        const id = component.split('.').join('--');
        Livewire.modal._storage[id] = data;
        (new bootstrap.Modal(document.querySelector('#' + id))).show();
    },

    close: function (component) {
        const id = component.split('.').join('--');
        bootstrap.Modal.getInstance(document.querySelector('#' + id)).hide();
    },
}

document.addEventListener('show.bs.modal', function (event) {
    const component = event.target.id.split('--').join('.');
    const data = Livewire.modal._storage[event.target.id] ?? {};
    Livewire.dispatchTo(null, component, 'initialize', {data: data});
});

document.addEventListener('hidden.bs.modal', function (event) {
    const component = event.target.id.split('--').join('.');
    Livewire.dispatchTo(null, component, 'terminate');
});
