$(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
});

function likeDislike(key) {
    $.ajax({
        url: 'api/api-like-dislike.php',
        method: 'GET',
        data: { propId: key }
    }).done((response) => {
        $('#Right' + key).children().first().toggleClass('opacity');
        if (response == '0') {
            $('#Right' + key).children().first().children().first().toggleClass('fas');
        }
        else {
            $('#Right' + key).children().first().children().first().toggleClass('fas');
            $('#Right' + key).children().first().children().first().addClass('far');
        }
    })
}

function resetLabels() {
    $('#lblErrorsEditProfile').text('');
    $('#lblErrorsChangePassword').text('');
}

$('#btnSendEmail').click(function () {
    const email = $('#txtSendEmail').val();
    window.location = '/Real-Estate-Project/api/api-send-email?email=' + email;
})

function deleteProperty(key) {
    $.ajax({
        url: "api/api-delete-property.php",
        method: "GET",
        data: { "id": key },
        dataType: "JSON"
    })
        .done(function (response) {
            if (response.status === 1) {
                $('#' + key).remove();
            }
        })
}

$('#txtSearch').on('input', function () {
    let val = $('#txtSearch').val();
    $.ajax({
        url: "api/api-search.php",
        method: "GET",
        data: { "search": val },
        dataType: "JSON"
    })
        .done(function (response) {
            $('.property').hide();
            $('.fa-map-marker').hide();
            for (let key of response) {
                $('#Right' + key).show();
                $('#' + key).show();
            }
        })
});

$('#LikedProperties').click(function () {
    if (window.location.pathname !== '/Real-Estate-Project/index') {
        window.location.pathname = '/Real-Estate-Project/index';
    }
    $.ajax({
        url: "api/api-liked-properties.php",
        dataType: "JSON"
    })
        .done(function (response) {
            $('.property').hide();
            $('.fa-map-marker').hide();
            for (let key of response) {
                $('#Right' + key).show();
                $('#' + key).show();
            }
        });
});
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

$('#btnChangePassword').click(function () {
    $.ajax({
        url: "api/api-change-password.php",
        method: "POST",
        data: $('#formChangePassword').serialize(),
        dataType: "JSON"
    })
        .done(function (response) {
            $('#lblErrorsChangePassword').css('font-weight', '900');
            if (response.status === 1) {
                $('#lblErrorsChangePassword').text(response.message);
                $('#lblErrorsChangePassword').css('color', 'green');
            }
            else {
                $('#lblErrorsChangePassword').text(response.message);
                $('#lblErrorsChangePassword').css('color', 'red');
            }
        })
})

$('#btnAddProperty').click(function (e) {
    e.preventDefault();
    var formData = new FormData(document.getElementById('formAddProperty'));

    $.ajax({
        url: "api/api-add-property.php",
        method: "POST",
        data: formData,
        cache: false,
        dataType: 'JSON',
        contentType: false,
        processData: false
    })
        .done(function (response) {

            if (response.status === 1) {
                window.location.pathname = '/Real-Estate-Project/index';
            }
            else {
                $('#lblErrorsAddProperty').css('font-weight', '900');
                $('#lblErrorsAddProperty').text(response.message);
                $('#lblErrorsAddProperty').css('color', 'red');
            }
        })
})
$('#btnUpdateProperty').click(function (e) {
    e.preventDefault();
    var formData = new FormData(document.getElementById('formUpdateProperty'));

    $.ajax({
        url: "api/api-update-property.php",
        method: "POST",
        data: formData,
        cache: false,
        dataType: 'JSON',
        contentType: false,
        processData: false
    })
        .done(function (response) {
            if (response.status === 1) {
                window.location.pathname = '/Real-Estate-Project/manage-properties';
            }
            else {
                $('#lblErrorsUpdateProperty').css('font-weight', '900');
                $('#lblErrorsUpdateProperty').text(response.message);
                $('#lblErrorsUpdateProperty').css('color', 'red');
            }
        })
})

