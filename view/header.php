<div id="header" data-role="header">
    <?php
    //var_dump($_SERVER['REQUEST_URI']);
    switch ($_SERVER['REQUEST_URI']) {
        case '/Dawgram/Perfil':
            echo "<h1>{$_SESSION['user']}</h1>";
            break;
        case '/Dawgram/Inicio':
            echo "<h1>Dawgram</h1>";
            break;
    }
    ?>
</div><!-- /header -->