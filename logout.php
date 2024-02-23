<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="5;url=index.html">
        <title>FORUM PROGRAMADORES</title>
    </head>
    <body>
        <?php
            session_start();
            include 'valida.php';
            // <!-- apaga todas as variaveis da sessao -->
            $_SESSION=array();
            // <!-- finalmente destrói a sessão -->
            session_destroy();
        ?>
        <h2 align="center">Sessão terminada com sucesso!</h2>

        <br/><h4>Aguarde que vai ser redirecionado</h4>
    </body>
</html>