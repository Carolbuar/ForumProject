<html>
    <head>
        <meta charset="utf-8">
        <title>Gestão de  Utilizadores</title>
        <!-- ao fim de 5 segundo redireciona para o index-->
        <meta http-equiv="refresh" content="5;url=index.html">
    </head>
    <body>
        <h1>Registar Utilizadores</h1>
        <?php
        include 'liga_bd.php';
        $sql ="INSERT INTO t_user (nick, nome, email, data_nasc, pass, foto) VALUES
            ('$_POST[nick]','$_POST[nome]', '$_POST[email]', '$_POST[data_nasc]', '$_POST[pass]', '$_POST[foto]')";
        
        // caso consiga executar a ação mostra a mensagem de sucesso
        if (mysqli_query($ligacao, $sql))
            echo "<h3>Registo efetuado com sucesso!</h3>"; 
        mysqli_close($ligacao); echo "<br/>";
        ?>
        <br/><h4>Aguarde que vai ser redirecionado</h4><a href="index.html" target="_self">Volta ao Menu</a>
    </body>
</html>