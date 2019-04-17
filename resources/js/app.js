import Vue from 'vue';
// import axios from 'axios';

// axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// let token = document.head.querySelector('meta[name="csrf-token"]');

// if (token) {
//     axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
// } else {
//     console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
// }


const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

const app = new Vue({
    el: '#app'
});

$('.ui.dropdown').dropdown();

$('.message .close').on('click', function () {
    $(this).closest('.message').transition('fade');
});

setTimeout(() => {
    $('.message').transition('fade');
}, 5000);
