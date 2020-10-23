<?php
$session = new Classes\ClassSession();
$session->destructSession();

echo "<script>
        alert('Você saiu do sistema');
        window.location.href = '".DIRPAGE."';
     </script>";