<?php
    $dsn = 'mysql:host=localhost;dbname=php_pdo';
    $usuario = 'root';
    $senha = '';

    try{
        $conexao = new PDO($dsn, $usuario, $senha);

        // $query = '
        //     CREATE TABLE if not exists tb_usuarios(
        //         id int not null primary key auto_increment,
        //         nome varchar (50) not null,
        //         email varchar(100) not null,
        //         senha varchar(32) not null
        //     );
        // ';

        // $retorno = $conexao->exec($query);
        // echo $retorno;

        // $query = '
        //     delete from tb_usuarios
        // ';

        // $retorno = $conexao->exec($query);
        // echo $retorno;

        // $query = '
        //         insert into tb_usuarios(
        //             nome, email, senha 
        //         ) values (
        //             "Bianca da Silva", "bianca@teste.com.br", "123456"
        //         )
        // ';
        // $retorno = $conexao->exec($query);

        // $query = '
        //     select * from tb_usuarios
        // ';
        
        // $stmt = $conexao->query($query); //PDO Statement
        // print_r($stmt);

        // $lista = $stmt->fetchAll();//retorno associativo e numérico
        // $lista = $stmt->fetchAll(PDO::FETCH_ASSOC); //retorno associativo
        // $lista = $stmt->fetchAll(PDO::FETCH_NUM); //retorno numérico 
        // $lista = $stmt->fetchAll(PDO::FETCH_BOTH); //retorno associativo e numérico 
        // $lista = $stmt->fetchAll(PDO::FETCH_OBJ); //retorna objetos
        
        // echo '<pre>';
        //     print_r($lista);
        // echo '</pre>';

        // echo $lista[2]['email'];
        // echo $lista[2][2];
        // echo $lista[1]->nome;
        
        //fetch
        // $query = '
        //     select * from tb_usuarios order by nome desc limit 1
        // ';
        // $stmt = $conexao->query($query); //PDO Statement 

        // $usuario = $stmt->fetch(PDO::FETCH_OBJ); //retorno objeto
        // $usuario = $stmt->fetch(PDO::FETCH_NUM); //retorno numerico
        // $usuario = $stmt->fetch(PDO::FETCH_ASSOC); //retorno associativo
        
        // echo '<pre>';
        //     print_r($usuario);
        // echo '</pre>';

        // echo $usuario->nome; //para acessar o que vem o BD -  objetos
        // echo $usuario[2];
        // echo $usuario['nome'];

        // while ($usuario !== false) {
        //         echo "Nome: " . $usuario['nome'] . " - Email: " . $usuario['email'] . " - Senha: " . $usuario['senha'] . "<br>";
        //         $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        // }

        //Listando registros com Foreach

        // $query = '
        //     select * from tb_usuarios 
        // ';

        // $stmt = $conexao->query($query); //PDO Statemet

        // $lista_usuario = $stmt->fetchAll(PDO::FETCH_ASSOC); //retornará arrays

        // // echo '<pre>';
        // //  print_r($lista_usuario);
        // // echo '</pre>';

        
        // foreach($lista_usuario as $key => $value) {
        //     // print_r($value);
        //     echo $value['nome'];
        //     echo '<hr/>';
        // }

        // ou desta forma

        $query = '
            select * from tb_usuarios 
        ';

        foreach($conexao->query($query) as $chave => $valor){
            print_r($valor['nome']);
            echo '<hr>';
        }
        
        }catch(PDOException $e){
            // echo '<pre>';
            //     print_r($e);
            // echo '</pre>';

            echo 'Erro: '. $e->getCode(). ' Mensagem: '. $e->getMessage();
            //registrar o erro de alguma forma.
        }
?>