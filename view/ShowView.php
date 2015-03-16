<?php //var_dump($_SESSION) ?>

<div class ="grid-100 mobile-grid-100">
    <img class="imageShow" src="<?php echo $data[0] ?>">
</div>
<script>
    var iable2 = "<a href=\"Remove\" data-ajax=\"false\" class=\"ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all\">No text</a>";
    $("#header").append(iable2);
    $("#header h1").css("margin", "0 2%");
    $("#header h1").css("text-align", "left");
</script>
