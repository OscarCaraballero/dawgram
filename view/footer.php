<div class="prefix-20 grid-60 suffix-20 mobile-grid-100">
    <div data-role="footer" class="ui-bar" data-position="fixed">
        <div data-role="navbar">
            <ul>
                <li><a data-ajax="false" href="Inicio" data-icon="home"></a></li>
                <li><a href="#" data-icon="search"></a></li>
                <li>
                    <form id="shot" data-ajax="false" action ="Upload" method="post" enctype="multipart/form-data">
                        <input name="fileToUpload" id="fileToUpload" type="file" accept="image/*" capture="camera">
                    </form>
                </li>
                <li><a href="#" data-icon="heart"></a></li>
                <li><a data-ajax="false" href="Perfil" data-icon="user"></a></li>
            </ul>
        </div><!-- /navbar -->
    </div><!-- /footer -->
</div>
<script>
    $("#fileToUpload").change(function () {
        $("#shot").submit();
    });
</script>