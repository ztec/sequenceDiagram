var C_URL = "exec.php";
var value = "";

var res = $('#result')
var img = new Image();

var win = null ;

var draw = function (data) {
    if(data.errors.length>0){
        $(img).addClass('error');
    }else{
        $(img).addClass('loading');
        img= new Image();
        $(img).load(function(){
            res.html('');
            res.append(img);
        })
        img.src=data.img;
    }
    _.delay(test,100);
}

var askDraw = function (text) {
    value = text;
    localStorage.value = value ;
    $.ajax({
        type: 'POST',
        url: C_URL+"?t="+Math.random(),
        data: {
            message: value
        }
    })
        .success(draw)
        .error(function (data) {
            $(img).addClass('error');
            console.debug(arguments);
            _.delay(test,100);
        });

}

var test = function () {
    if (localStorage.value !== value) {
        askDraw(localStorage.value);
    }else{
        _.delay(test,100);
    }
}

test();
