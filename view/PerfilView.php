<?php $data = $data[0];
 //var_dump($data);
?>

<div class="grid-100 mobile-grid-100">
    <div class="grid-25 mobile-grid-25">
        <img class="fotoperfil" src="view/images/thumbnail/profile.jpg"/>
        <h1 class="nombreperfil"><?php echo("NombrePerfil") ?></h1>
    </div>
    <div class="stats grid-75 mobile-grid-75">
        <div class="grid-100 mobile-grid-100">
            <a href="#thubnails">
                <div class="numbers grid-33 mobile-grid-33">
                    <?php echo("<b>1</b>") ?>
                    <p>publicaciones</p>
                </div>
            </a>
            <div class="numbers grid-33 mobile-grid-33">
                <?php echo("<b>5</b>") ?>
                <p>seguidores</p>
            </div>
            <div class="numbersgrid-33 mobile-grid-33">
                <?php echo("<b>10</b>") ?>
                <p>seguidos</p>
            </div>
        </div>
        <div class="grid-100 mobile-grid-100">
            <a href="#" class="ui-btn ui-mini">EDITAR TU PERFIL</a>
        </div>
    </div>



    <div class="menuperfil mobile-grid-100 grid-100">
        <div class="mobile-grid-25 grid-25">
            <a href="#" class="iconos ui-btn ui-icon-grid ui-btn-icon-notext">No text</a>
        </div>
        <div class="mobile-grid-25 grid-25">
            <a href="#" class="iconos ui-btn ui-icon-bars ui-btn-icon-notext">No text</a>
        </div>
        <div class="mobile-grid-25 grid-25">
            <a href="#" class="iconos ui-btn ui-icon-location ui-btn-icon-notext">No text</a>
        </div>
        <div class="mobile-grid-25 grid-25">
            <a href="#" class="iconos ui-btn ui-icon-user ui-btn-icon-notext">No text</a>
        </div>
    </div>
    <div id="thubnails" class="grid-100 mobile-grid-100">
        
        <?php 
           $longitud = count($data);
           $grid = count($data)/3;
           $grid = (Int)  round($grid);
           
//           foreach($data as $array){
//               var_dump($array);
//               echo "<br>";
//               echo "<br>";
//               echo "<br>";
//           }
           
           for($images=0;$images<$longitud;$images=$images+3){
               echo "<div class=\"grid-100 mobile-grid-100\">";
               for($i=0;$i<$grid;$i++){
                   if(($images+$i)<$longitud){
                        $pinta = "<div class=\"grid-33 mobile-grid-33\">"
                                . "<form data-ajax=\"false\" action=\"Show\" method=\"post\">"
                                . "<input type=\"hidden\" name=\"id\" value=\"{$data[$images+$i]['id']}\"  />"
                                . "<input type=\"hidden\" name=\"idUser\" value=\"{$data[$images+$i]['idUser']}\"  />"
                                . "<input class=\"fotoperfil\" type=\"image\" src=\"{$data[$images+$i]['pathThumb']}\" alt=\"Submit Form\" />"
//                                . "<img class=\"fotoperfil\" src=\"{$data[$images+$i]['pathThumb']}\"/>"
                                . "</form>"
                                . "</div>";

                        echo $pinta;
                       
                   }
               }
               echo "</div>";
           }
        
        ?>

<script>
    var iable2 = "<a href=\"Inicio\" class=\"perfil ui-btn ui-corner-all ui-icon-bars ui-btn-icon-notext\">Menu</a>";
    $("#header").append(iable2);
    $("#header h1").css("margin", "0 2%");
    $("#header h1").css("text-align", "left");
</script>