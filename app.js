function like(key) {
    $('#' + key).children().first().children().first().toggleClass('fas');
    $('#' + key).children().first().toggleClass('opacity');
}
function resetLabels() {
    $('#lblErrorsEditProfile').text('');
    $('#lblErrorsChangePassword').text('');
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

$('#btnEditProfile').click(function () {
    $.ajax({
        url: "api/api-update-profile.php",
        method: "POST",
        data: $('#formEditProfile').serialize(),
        dataType: "JSON"
    })
        .done(function (response) {
            $('#lblErrorsEditProfile').css('font-weight', '900');
            if (response.status === 1) {
                $('#lblErrorsEditProfile').text(response.message);
                $('#lblErrorsEditProfile').css('color', 'green');
            }
            else {
                $('#lblErrorsEditProfile').text(response.message);
                $('#lblErrorsEditProfile').css('color', 'red');
            }
        })
})