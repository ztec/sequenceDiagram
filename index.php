<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body <?php if(isset($_GET['view'])){ ?> class="view" <?php } ?>>
<?php if(!isset($_GET['view'])){ ?>
<div id="contentWrap">
    <textarea id="content" width="400px" height="200px">
        Alice->bob: hello
    </textarea>
</div>
    <button id="openWin" >Open preview</button>
<?php } ?>
<div id="result" class="result">

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.2/underscore-min.js"></script>
<?php if(!isset($_GET['view'])){ ?>
    <script src="exec.js"></script>
<?php }else{?>
    <script src="view.js"></script>
<?php }?>
</body>
</html>