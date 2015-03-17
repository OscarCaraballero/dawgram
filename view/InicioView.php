<?php var_dump($_SESSION) ?>

<?php foreach ($data as $img): ?>

    <div class="grid-100 mobile-grid-100">
        <img class="imageShow" src="<?= $img ?>">
    </div>

<?php endforeach; ?>
<script>
    var sesion = <?php echo json_encode($_SESSION); ?>;
    console.log(sesion);
    $(document).ready(function () {
        if(sesion['username']){
            localStorage.setItem('user', sesion['username']);
            localStorage.setItem('id', sesion['id']);
        }
    });
</script>