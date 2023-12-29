<?php
    $dsn = 'mysql:host=localhost;dbname=xphp_pdo';
    $usuario = 'root';
    $senha = '';

    try{
        $conexao = new PDO($dsn, $usuario, $senha);
    }catch(PDOException $e){
        // echo '<pre>';
        //     print_r($e);
        // echo '</pre>';

        echo 'Erro: '. $e->getCode(). ' Mensagem: '. $e->getMessage();
        //registrar o erro de alguma forma.
    }
?>