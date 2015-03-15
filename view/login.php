<?php
// CLEAN LAST SESSION:
//if (isset($_SESSION)) {
//    session_destroy();
//}

echo "Hola";

if (isset($_SESSION['msg'])) {
    echo "Hola";
    if (!is_null($_SESSION['msg'])) {
        $errorMsg = $_SESSION['msg'];
        foreach ($errorMsg as $msg) {
            $messages .= "<h3>{$msg}</h3>";
        }
        $_SESSION['msg'] = null;
    }
}
?>
<html manifest="manifest.appcache">
    <head>
        <meta charset="utf-8">
        <base href="http://localhost/Dawgram/Inicio">
        <link rel="stylesheet" type="text/css" href="view/css/unsemantic-grid-mobile.css">
        <link rel="stylesheet" type="text/css" href="view/css/dawgram.min.css">
        <link rel="stylesheet" type="text/css" href="view/css/jquery.mobile.icons.min.css">
        <link rel="stylesheet" type="text/css" href="view/css/jquery.mobile.structure-1.4.5.min.css">
        <script src="view/js/jquery-1.11.1.min.js">
        </script>
        <script src="view/js/jquery.mobile-1.4.5.min.js">
        </script>
        <title>Dawgram</title>
    </head>
    <div data-url="panel-responsive-page1" data-role="page" class="ui-responsive-panel" id="demo-page">
        <div data-role="header">
            <h1>Dawgram</h1>
        </div><!-- /header -->
        <div role="main" class="ui-content jqm-content jqm-fullwidth">
            <h1>Captura y comparte momentos con gente de todo el mundo</h1>
            <p>Dawgram es una forma rápida, genial y divertida de compartir tu vida con amigos y familiares. Haz una foto o un vídeo, elige un filtro para transformar su aspecto y, a continuación, publícalo en Instagram. Es así de fácil. Incluso puedes compartirlo en Facebook, Twitter, Tumblr y otros sitios. Es una nueva manera de ver el mundo.</p>
            <div class="ui-grid-a">
                <div class="ui-block-a"><a href="#add-form" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-b ui-mini">Inicia Sesión</a></div>
                <div class="ui-block-b"><a href="#register" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-mini">Registrate</a></div>
            </div>
        </div><!-- /content -->

        <div id="errorLog" style="display: none;">
            <div id="headerError">
                <div id="errorIcon"></div><p>Se han producido los siguientes errores:</p>
            </div>
            <div id="errorContainer">
                <?php
                echo $messages;
                if ($messages != "") {
                    ?>
                    <script>
                        $("#errorLog").css({"display": "block"});
                    </script>
                    <?php
                }
                ?>
            </div>
        </div>

        <div data-role="panel" data-position="left" data-display="reveal" data-theme="a" id="add-form">
            <form class="userform" data-ajax="false" method="post" action="Login">
                <h2>Inicia Sesión</h2>
                <label for="email">Email:</label>
                <input name="email" id="name" value="" data-clear-btn="true" data-mini="true" type="email" required>
                <label for="contrasena">Contraseña:</label>
                <input name="contrasenaLogin" id="password" value="" data-clear-btn="true" autocomplete="off" data-mini="true" type="password" required>
                <div class="ui-grid-a">
                    <div class="ui-block-a"><a href="#" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-b ui-mini">Cancel</a></div>
                    <div class="ui-block-b"><input data-mini="true" class="ui-mini ui-btn" value="Login" type="submit"></div>
                </div>
            </form>
        </div><!-- /panel -->
        <div data-role="panel" data-position="right" data-display="reveal" data-theme="a" id="register">
            <form class="userform" data-ajax="false" method="post" action="Login">
                <h2>Registrate</h2>
                <label for="usuario">Usuario:</label>
                <input name="usuario" id="usuario" value="" data-clear-btn="true" data-mini="true" type="text" required>
                <label for="email">Email:</label>
                <input name="email" id="email" value="" data-clear-btn="true" data-mini="true" type="text" required>
                <label for="contrasena">Contraseña:</label>
                <input name="contrasenaRegistro" id="password" value="" data-clear-btn="true" autocomplete="off" data-mini="true" type="password" required>
                <input type="hidden" name="registro" value="1">
                <div class="ui-grid-a">
                    <div class="ui-block-a"><a href="#" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-b ui-mini">Cancel</a></div>
                    <div class="ui-block-b"><input data-mini="true" class="ui-mini ui-btn" value="Registrate" type="submit"></div>
                </div>
            </form>
        </div><!-- /panel -->
</html>
