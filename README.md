# Introdução ao PDO

documentação: https://www.php.net/manual/en/book.pdo.php

PHP Data Objects:

    Conjuntos de objetos que auxilia no trabalho com banco de dados.

Para que serve o PDO?

    Prover uma padronização da forma com que o php se comunica com bancos de dados. Os objetos são agregados no php em formato de extenção. Os objetos pode ser habilitado ou desabilitados atravez do arquivo php ini

Qual a vantagem de se trabalhar com PDO?


![Alt text](<introducao.png>)

# Criando uma conexão entre o PHP e o MySQL com PDO

## Cria a instancia de conexão

    $conexao = new PDO($dsn, $usuario, $senha);

#### primeiro parametro:
   
- Data Source Name (DSN) ou Nome da Fonte de Dados
-  prefixo mysql diz qual o drive que sera utilizado
- host que pode ser local ou com o endereço aonde o banco se encontra 
- qual o banco de dados vai ser acessado

        $dsn = 'mysql:host=localhost;dbname=php_pdo';

#### segundo parametro:
- usuario do banco de dados

        $usuario = 'root'; 

#### terceiro parametro:
- senha do banco de dados

        $senha = '';

## Tratando exceptions (PDOException)
documentação: https://www.php.net/manual/en/class.pdoexception.php

![Alt text](exception.png)

- quando ocorre um erro, o PDO recupera esse erro e produz uma exception e pode ser capturada pelo php e ser tratado.

- PDOException é um objeto dentro de PDO que sera populado com as informações do erro

Neste exemplo temos um erro proposital no dsn:

        <?php
                $dsn = 'mysql:host=localhost;dbname=xphp_pdo';
                $usuario = 'root';
                $senha = '';

                try{
                        $conexao = new PDO($dsn, $usuario, $senha);
                }
                catch(PDOException $e){
                        echo '<pre>';
                        print_r($e);
                        echo '</pre>';
                }
        ?>

- Esse erro gera este objeto contendo atributos protegidos.
- Os metodos podem ser conferidos na documentação.

        PDOException Object
        (
                [message:protected] => SQLSTATE[HY000] [1049] Unknown database 'xphp_pdo'
                [string:Exception:private] => 
                [code:protected] => 1049
                [file:protected] => /opt/lampp/htdocs/php_pdo/index.php
                [line:protected] => 7
                [trace:Exception:private] => Array
                (
                        [0] => Array
                        (
                                [file] => /opt/lampp/htdocs/php_pdo/index.php
                                [line] => 7
                                [function] => __construct
                                [class] => PDO
                                [type] => ->
                                [args] => Array
                                (
                                        [0] => mysql:host=localhost;dbname=xphp_pdo
                                        [1] => root
                                        [2] => SensitiveParameterValue Object
                                )
                        )
                )

                [previous:Exception:private] => 
                [errorInfo] => Array
                (
                        [0] => HY000
                        [1] => 1049
                        [2] => Unknown database 'xphp_pdo'
                )
        )

Podemos pegar o codigo do erro e a mensagem do erro para tratar o erro no php, assim produzindo uma mensagem na tela ou criando uma logica mais agradavel para a aplicação.

        atributos:
                [code:protected] => 1049
                [message:protected] => SQLSTATE[HY000] [1049] Unknown database 'xphp_pdo'

        metodos:
                final public Exception::getCode(): int
                final public Exception::getMessage(): string

No php voce trata esse erro:

        <?php
                $dsn = 'mysql:host=localhost;dbname=xphp_pdo';
                $usuario = 'root';
                $senha = '';

                try{
                        $conexao = new PDO($dsn, $usuario, $senha);
                }catch(PDOException $e){
                        echo 'Erro: '. $e->getCode(). ' Mensagem: '. $e->getMessage();
                        //registrar o erro de alguma forma.
                }
        ?>

