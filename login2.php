<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="static/images/forum.ico" type="image/x-icon">
        <title>Forum Programadores</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <h1>FORUM PROGRAMADORES</h1>
    <hr>
    <br>
        <?php
            session_start();
            include 'valida.php';
            echo "<h2>Login realizado com sucesso!</h2>";
            echo "<h2>Bem-vindo!".$_SESSION['nick']."</h2>";
        ?>
        <input type="button" value="Editar perfil" onclick="window.open('perfil.php','_self')">
        <input type="button" value="Colocar posts" onclick="window.open('inserirP.php','_self')">
        <input type="button" value="Listar posts" onclick="window.open('listarP.php?tema=Todos','_self')">
        <input type="button" value="Meus posts" onclick="window.open('meusP.php','_self')">
        <input type="button" value="Minhas respostas" onclick="window.open('minhasR.php','_self')">
        <input type="button" value="Logout" onclick="window.open('logout.php','_self')">
        <br><br>
        <?php
            if (strcmp($_SESSION['nick'], "admin")==0)
            {
            ?>
            <br><br>
            <h2>Área de Administração</h2>
            <input type="button" value="Gerir Utilizadores" onclick="window.open('gerir_U.php','_self')">
            <input type="button" value="Pesquisar Utilizadores" onclick="window.open('pesquisar_U.php','_self')">
            <input type="button" value="Gerir Posts" onclick="window.open('gerir_P.php','_self')">
            <input type="button" value="Gerir Respostas" onclick="window.open('gerir_R.php','_self')">
        <?php
            }
        ?>


    </body>
</html>