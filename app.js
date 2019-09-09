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