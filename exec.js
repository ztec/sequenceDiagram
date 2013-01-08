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

    var test = function (el) {
        var val = "" ;
        if(el){
            val = el.textarea.value ;
        }else{
            val = $('#content').val() ;
        }
        if (val !== value) {
            askDraw(val);
        }
        //_.delay(test,200);
    }
    var openWin = function(){
        win = window.open(window.location+'?view=42','_blank');
    }
    $('#content').on('keyup',test);
    $('#content').on('click', test);

    $('#openWin').on('click', openWin);
    askDraw($('#content').val());


    editAreaLoader.init({
        id: "content"	// id of the textarea to transform
        ,start_highlight: true	// if start with highlight
        ,allow_resize: "both"
        ,allow_toggle: false
        ,word_wrap: false
        ,replace_tab_by_spaces:'2'
        ,language: "en"
        ,syntax: "uml"
        ,autocompletion:true
        ,change_callback:"zoneonChange"
    });

    test();

    window.zoneonChange = test ;

})();