<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.all.min.js"></script>
<script src="../js/alertas.js"></script>
<?php
if ($registrado == "bien"){?>

    <script> registrado() </script>

<?php
}
elseif ($registrado == "mal") {
    ?>

    <script> no() </script>

<?php
}