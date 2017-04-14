import Vue from 'vue';
import axios from 'axios';
import Form from './helpers/Form';
import jquery from 'jquery';

require('bootstrap-sass');

window.Vue = Vue;
window.axios = axios;

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};

window.Form = Form;

window.$ = window.jQuery = jquery;