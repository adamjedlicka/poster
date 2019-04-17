import Vue from 'vue';

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
