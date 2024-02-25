<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="static/images/forum.ico" type="image/x-icon">
        <title>Forum Programadores</title>
    </head>
    <body>
        <h1>Gerir Utilizadores</h1>
        <hr>
        <br>
        <?php
        session_start();
        include 'valida.php';
        include 'liga_bd.php';
        $sql ="SELECT * FROM t_user";
        // o primeiro parametro é a base dados e o segundo a instrução sql
        $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao)); 
        //variavel para contar os registos
        $num_reg=0;
        $num_bloq=0;
        //enquanto conseguir ler dados do array resultado imprime
        while($linha = mysqli_fetch_assoc($resultado)){
            //para colocar cor no fundo
            if($linha['apagado']==1)
                echo "<div style='background-color: gray'>";

            echo "<br>Id: ". $linha['id_user']. "<br/>";
            echo "Nick: ". $linha['nick']. "<br/>";
            echo "Nome: ". $linha['nome']. "<br/>";
            echo "Email: ". $linha['email']. "<br/>";
            echo "Data de nascimento: ". $linha['data_nasc']. "<br/>";
            if($linha["foto"]!=null)
                echo "Foto:<br/> <img height='100' src='". $linha['foto']."'><br/>";

            echo "<br/>";
            echo "<form action='alterar_U.php' method='post'>";
            echo "<input type='hidden' name='id_user' value='".$linha['id_user']."'>";
            echo "<input type='submit' value='Alterar'>
                </form><br>";
            
            if($linha['apagado']==0){//o utilizador encontra-se ativo
                echo "<form action='bloquear_U.php' method='post'>";
                echo "<input type='hidden' name='id_user' value='".$linha['id_user']."'>";
                echo "<input type='submit' value='Bloquear'>
                </form><br>";
            }
            else{ //o utilizador esta bloqueado
                
                echo "<form action='desbloquear_U.php' method='post'>";
                echo "<input type='hidden' name='id_user' value='".$linha['id_user']."'>";
                echo "<input type='submit' value='Desbloquear'></form>";
                echo "</div>";
                $num_bloq +=1;
            }
            echo "<hr/>";
            $num_reg=$num_reg+1;
        }
        mysqli_close($ligacao);
        echo "<br/>";
        echo "<br>Numero total de utilizadores -> " . $num_reg . "</br>";
        echo "<br/>";
        echo "<br>Numero de utilizadores bloqueados -> " . $num_bloq . "</br>";
        //fecho a instrução de escrita em php
        ?>
        <br/>
        <a href="login2.php " target="_self">Volta ao Menu</a>
    </body>
</html>