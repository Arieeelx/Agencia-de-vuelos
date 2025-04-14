<?php

function alertaOferta($mensaje) {
    echo "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            alert('$mensaje');
        });
    </script>";
}

?>
