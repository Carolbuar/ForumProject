<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="static/images/forum.ico" type="image/x-icon">
        <title>Forum Programadores</title>
    </head>
    <body>
        <?php
        session_start();
        include 'valida.php';
        ?>
        <h1>Pesquisa de Utilizadores</h1>
        <hr>
        <br>
        <form action="pesquisar_U2.php" method="post">
            Qual o campo a pesquisar:<select name="tema">
                <option value="nick">Nick</option>
                <option value="nome">Nome</option>
                <option value="email">E-mail</option>
                <option value="data_nasc">Data de nascimento</option>
            </select>
            <br><br>
            Valor: <input type="text" size="50" name="valor" required> <br><br>
            <input type="submit" value="Pesquisar">
            <input type="reset" value="Limpar">
            <input type="button" value="Voltar" onclick="window.history.go(-1)">
            <br><br>
            
        </form>

    </body>
</html>