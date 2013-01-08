<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body <?php if(isset($_GET['view'])){ ?> class="view" <?php } ?>>
<?php if(!isset($_GET['view'])){ ?>
<div id="contentWrap">
<textarea id="content" >title Ceci est le titre de mon histoire
participant "Un nounours" as nounours
participant "Le lapin" as lapin
participant "La june'geule" as jungle
participant "Le lecteur" as lecteur


nounours->jungle : S'y rend
loop
  nounours->jungle : vie
  nounours->jungle : mange
  nounours->jungle : s'amuse
  opt
    nounours->nounours : copule
    opt très rarement
      nounours->lapin : utilise
    end
  end
end
nounours->+lapin : Comment vas tu ?
lapin->-nounours : Très bien
nounours->+lapin: Peut tu me faire une "salade de fruit" ?
note right of lapin : Il est relou !
lapin->>+jungle : court cercher des fruits
    jungle-->jungle : Trouve des fraises
    jungle->>jungle : Trouve des oranges
    jungle-->>jungle : Trouve des bananes
    note over jungle : Mélange les trouvailles
jungle->-lapin : Propose à la ceuillette la salade de fruits
lapin->jungle : Ceuille la salde
jungle->lapin : Donne la  salade ;
alt Haha
  lapin->nounours : Jette à la figure
  note right of lapin : Prend ça !
  nounours->lapin : Paf !
  note left of nounours : Ca t'aprendra !
  note over lecteur : WTF ?!
else "En fait , non !"
  lapin-->-nounours : partage la salade
  note over lecteur : Ah, c'est mieux ;-p
end</textarea>
</div>
    <button id="openWin" >Open preview</button>
<?php } ?>
<div id="result" class="result">

</div>
<script language="Javascript" type="text/javascript" src="edit_area/edit_area_full.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.2/underscore-min.js"></script>
<?php if(!isset($_GET['view'])){ ?>
    <script src="exec.js"></script>
<?php }else{?>
    <script src="view.js"></script>
<?php }?>
</body>
</html>