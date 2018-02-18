$(function(){
    var alturaWrapper = $('#wrapper').height();
    if(alturaWrapper > 500) {
        $('#sidebar').css('height', alturaWrapper + 'px');
    }
});