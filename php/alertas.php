<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.all.min.js"></script>
<script src="../js/alertas.js"></script>

<?php

if ($entrar == "acceso"){?>

    <script> acceso() </script>

<?php
}
if ($entrar == "acceso1"){?>

    <script> acceso1() </script>

<?php
}
if ($entrar == "acceso2"){?>

    <script> acceso2() </script>

<?php
}
?>
<?php

if ($entrar == "no"){?>

<script> denegado() </script>

<?php
}
?>