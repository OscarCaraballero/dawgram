<div class="mobile-grid-100">

    <div class="mobile-grid-25">
        <img class="fotoperfil" src="view/images/profile.jpg"/>
        <h1 class="nombreperfil"><?php echo("NombrePerfil") ?></h1>
    </div>
    <div class="stats mobile-grid-75">
        <div class="mobile-grid-100">
            <a href="#thubnails">
                <div class="numbers mobile-grid-33">
                    <?php echo("<b>1</b>") ?>
                    <p>publicaciones</p>
                </div>
            </a>
            <div class="numbers mobile-grid-33">
                <?php echo("<b>5</b>") ?>
                <p>seguidores</p>
            </div>
            <div class="numbers mobile-grid-33">
                <?php echo("<b>10</b>") ?>
                <p>seguidos</p>
            </div>
        </div>
        <div class="mobile-grid-100">
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
    <div id="thubnails" class=" mobile-grid-100">
        <div class="mobile-grid-100">
            <div class="grid-33">
                <img class="fotoperfil" src="view/images/angie3.jpg"/>
            </div>
            <div class="grid-33">
                <img class="fotoperfil" src="view/images/angie.jpg"/>
            </div>
            <div class="grid-33">
                <img class="fotoperfil" src="view/images/angie2.jpg"/>
            </div>
        </div>
        <div class="mobile-grid-100">
            <div class="grid-33">
                <img class="fotoperfil" src="view/images/angie4.jpg"/>
            </div>
            <div class="grid-33">
                <img class="fotoperfil" src="view/images/angie5.jpg"/>
            </div>
            <div class="grid-33">
                <img class="fotoperfil" src="view/images/angie6.jpg"/>
            </div>
        </div>
        <div class="mobile-grid-100">
            <div class="grid-33">
                <img class="fotoperfil" src="view/images/angie3.jpg"/>
            </div>
            <div class="grid-33">
                <img class="fotoperfil" src="view/images/angie.jpg"/>
            </div>
            <div class="grid-33">
                <img class="fotoperfil" src="view/images/angie2.jpg"/>
            </div>
        </div>
    </div>

</div>

<script>
    var iable2 = "<a href=\"Inicio\" class=\"perfil ui-btn ui-corner-all ui-icon-bars ui-btn-icon-notext\">Menu</a>";
    $("#header").append(iable2);
    $("#header h1").css("margin", "0 2%");
    $("#header h1").css("text-align", "left");
</script>