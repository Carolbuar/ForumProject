<html>
    <head>
        <meta charset="utf-8">
        <title>FORUM</title>
    </head>
    <body>
        <?php session_start();
        include 'valida.php'; ?>
        
        <h1>Inserir Posts</h1>
        
        <form action="inserirP2.php" method="post" name="f1">
        Id user: <input type="text" name="id_user" size="20" maxlength="20" readonly value="<?php echo $_SESSION['id_user']?>"><br><br>
        Tema: <input type="text" name="tema" size="20" maxlength="20" required><br><br>
        
        Título: <input type="text" name="titulo" size="50" maxlength="50" required><br><br>
        Texto: <br><textarea cols="80" rows="4" name="texto" size="20" required></textarea><br><br>
        Foto(url): <br><textarea cols="80" rows="4" name="foto"></textarea><br><br>

        <input type="submit" value="Colocar Post"><br><br>
        <input type="reset" value="Limpar"><br><br>
        <input type="button" value="Voltar" onclick="window.history.go(-1)">
        <br><br>
            
        </form>

    </body>
</html>