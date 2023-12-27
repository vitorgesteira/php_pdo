# Introdução ao PDO

PHP Data Objects:

    Conjuntos de objetos que auxilia no trabalho com banco de dados.

Para que serve o PDO?

    Prover uma padronização da forma com que o php se comunica com bancos de dados. Os objetos são agregados no php em formato de extenção. Os objetos pode ser habilitado ou desabilitados atravez do arquivo php ini

Qual a vantagem de se trabalhar com PDO?


![Alt text](<introducao.png>)

# Criando uma conexão entre o PHP e o MySQL com PDO

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

### Cria a instancia de conexão

    $conexao = new PDO($dsn, $usuario, $senha);


