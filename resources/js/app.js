
$('.ui.dropdown').dropdown();

$('.message .close').on('click', function () {
    $(this).closest('.message').transition('fade')
})

setTimeout(() => {
    $('.message').transition('fade')
}, 5000)
