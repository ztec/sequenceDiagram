(function (){
    var value = "";
    if (localStorage.value) {
        value = localStorage.value;
        $('#content').val(value);
    }

    var win = null ;

    var askDraw = function (text) {
        value = text;
        localStorage.value = value ;
    }

    var test = function () {
        if ($('#content').val() !== value) {
            askDraw($('#content').val());
        }
    }
    var openWin = function(){
        win = window.open(window.location+'?view=42','_blank');
    }
    $('#content').on('keyup',test);
    $('#content').on('click', test);

    $('#openWin').on('click', openWin);
    askDraw($('#content').val());

})();