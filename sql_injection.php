<?php
    // print_r($_POST);
    if(!empty($_POST['usuario']) && !empty($_POST['senha'])){
        $dsn = 'mysql:host=localhost;dbname=php_pdo';
        $usuario = 'root';
        $senha = '';

        try{
            $conexao = new PDO($dsn, $usuario, $senha);

            //query
            $query = "select * from tb_usuarios where ";
            $query .= " email = '{$_POST['usuario']}' ";
            $query .= " AND senha = '{$_POST['senha']}' ";
            echo $query;

            $stm = $conexao->query($query);
            $usuario = $stm->fetch();

            echo "<pre>";
            // print_r($usuario);   
            echo "</pre>";
    
        }catch(PDOException $e){
            echo 'Erro: '. $e->getCode(). ' Mensagem: '. $e->getMessage();
        }
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
    <form method="post" action="sql_injection.php">
        <input type="text" placeholder="usuário" name="usuario">
        <br/>
        <input type="password" placeholder="senha" name="senha">
        <br/>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>

