function like(key) {
    $('#' + key).children().first().children().first().removeClass('far');
    $('#' + key).children().first().children().first().addClass('fas');
    $('#' + key).children().first().css('opacity', '1');
    $('#' + key).children().first().attr("onclick", "dislike(\'" + key + "\')");
}
function dislike(key) {
    $('#' + key).children().first().children().first().removeClass('fas');
    $('#' + key).children().first().children().first().addClass('far');
    $('#' + key).children().first().css('opacity', '0.3');
    $('#' + key).children().first().attr("onclick", "like(\'" + key + "\')");
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
                $('#lblErrorsLogin').css('color','red');
                $('#lblErrorsLogin').css('font-weight','900');
            }
        })
})