import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Alpine from "alpinejs";
window.Alpine = Alpine;

import flatpickr from "flatpickr";
window.flatpickr = flatpickr;

import "./../../node_modules/flatpickr/dist/flatpickr.css";
import './../../vendor/power-components/livewire-powergrid/dist/powergrid'
import './../../vendor/power-components/livewire-powergrid/dist/bootstrap5.css'
import './livewire-modal.js'
