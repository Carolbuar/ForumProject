<?php
    //validacao das variaveis de sessao
    if((!isset($_SESSION['id_user'])==true) and (!isset ($_SESSION['nick'])==true))
    {
        header('location:erro_acesso.html');
    }
?>