function like(key) {
    $('#' + key).children().first().children().first().toggleClass('fas');
    $('#' + key).children().first().toggleClass('opacity');
}

$('#btnLogin').click(function () {
    $.ajax({
        url: "api/api-login.php",
        method: "POST",
        data: $('#formLogin').serialize(),
        dataType: "JSON"
    })
        .done(function (response) {
            if (response.status === 1) {
                window.location.pathname = '/Real-Estate-Project/index';
            }
            else {
                $('#lblErrorsLogin').text(response.message);
                $('#lblErrorsLogin').css('color', 'red');
                $('#lblErrorsLogin').css('font-weight', '900');
            }
        })
})

$('#btnRegister').click(function () {
    $.ajax({
        url: "api/api-register.php",
        method: "POST",
        data: $('#formRegister').serialize(),
        dataType: "JSON"
    })
        .done(function (response) {
            if (response.status === 1) {
                window.location.pathname = '/Real-Estate-Project/index';
            }
            else {
                $('#lblErrorsRegister').text(response.message);
                $('#lblErrorsRegister').css('color', 'red');
                $('#lblErrorsRegister').css('font-weight', '900');
            }
        })
})