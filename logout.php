<?php
    // A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) 
        session_start();
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php"); exit;
?>
