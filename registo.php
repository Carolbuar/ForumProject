<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="static/images/forum.ico" type="image/x-icon">
        <title>Forum Programadores</title>
        <meta http-equiv="refresh" content="5;url=index.html">
    </head>
    <body>
        <h1>Registar Utilizadores</h1>
        <hr>
        <br>
        <?php
        include 'liga_bd.php';
        $sql2 ="SELECT * FROM t_user";
        $resultado2 = mysqli_query($ligacao, $sql2) or die(mysqli_error($ligacao));
        $linha2 = mysqli_fetch_assoc($resultado2);

        while($linha2 = mysqli_fetch_assoc($resultado2))
        {
            if ($_POST['nick']==$linha2['nick'])
                echo "<h3>Username já utilizado!</h3>";
                header('location:erroUsername.html');
                exit;
        }
        
        $tmp=password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $sql ="INSERT INTO t_user (nick, nome, email, data_nasc, pass, foto) VALUES
            ('$_POST[nick]','$_POST[nome]', '$_POST[email]', '$_POST[data_nasc]', '".$tmp."', '$_POST[foto]')";
        echo $sql;
        
        // caso consiga executar a ação mostra a mensagem de sucesso
        if (mysqli_query($ligacao, $sql))
            echo "<h3>Registo efetuado com sucesso!</h3>"; 
        mysqli_close($ligacao); echo "<br/>";
        ?>
        <br/><h4>Aguarde que vai ser redirecionado</h4><a href="index.html" target="_self">Volta ao Menu</a>
    </body>
</html>