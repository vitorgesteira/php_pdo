<?php
    $dsn = 'mysql:host=localhost;dbname=php_pdo';
    $usuario = 'root';
    $senha = '';

    try{
        $conexao = new PDO($dsn, $usuario, $senha);

        $query = '
            CREATE TABLE if not exists tb_usuarios(
                id int not null primary key auto_increment,
                nome varchar (50) not null,
                email varchar(100) not null,
                senha varchar(32) not null
            );
        ';

        $retorno = $conexao->exec($query);
        echo $retorno;

        // $query = '
        //         insert into tb_usuarios(
        //             nome, email, senha 
        //         ) values (
        //             "Jorge Sant Ana", "jorge@teste.com.br", "123456"
        //         )
        // ';

        $query = '
            delete from tb_usuarios
        ';

        $retorno = $conexao->exec($query);
        echo $retorno;

    }catch(PDOException $e){
        // echo '<pre>';
        //     print_r($e);
        // echo '</pre>';

        echo 'Erro: '. $e->getCode(). ' Mensagem: '. $e->getMessage();
        //registrar o erro de alguma forma.
    }
?>