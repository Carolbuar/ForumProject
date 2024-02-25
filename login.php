<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="static/images/forum.ico" type="image/x-icon">
        <title>Forum Programadores</title>
    </head>
    <body>
   
        <?php
        include 'liga_bd.php';
        //verificar se existe a variavel de sessao
        if (session_status() !== PHP_SESSION_ACTIVE){
            $sql="SELECT * FROM t_user where nick='$_POST[nick]'";
            //pesquisa apenas o registo com o nick enviado
            $resultado=mysqli_query($ligacao,$sql) or die (mysqli_error($ligacao));
            $linha=mysqli_fetch_assoc($resultado);
            //caso nao exista a variavel linha
            if ($linha==NULL)
                header('Location:erro.html');
            //caso o nickname exista tenho de verificar se as senhas sao iguais
            if(password_verify($_POST['pass'], $linha['pass'])){
                session_start();
                $_SESSION['id_user']=$linha['id_user'];
                $_SESSION['nick']=$linha['nick'];
                header('Location:login2.php');
            }
            //caso a senha esteja incorreta
            else
                header('Location:erro.html');
        }
        mysqli_close($ligacao);echo"<br/>";
        ?>
    </body>
</html>