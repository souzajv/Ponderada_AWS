<?php include "../inc/dbinfo.inc"; ?>

<html>
<body>
<h1>Cadastro de Usuário</h1>
<?php

/*conectar ao PostgreSQL e selecionar o banco de dados. */
$constring = "host=" . DB_SERVER . " dbname=" . DB_DATABASE . " user=" . DB_USERNAME . " password=" . DB_PASSWORD ;
$connection = pg_connect($constring);

if (!$connection){
    echo "Falha ao conectar ao PostgreSQL";
    exit;
}

/*garantir que a tabela USUARIOS exista. */
VerifyUsuariosTable($connection, DB_DATABASE);

/*se os campos do formulário estiverem preenchidos, adicionar um novo usuário na tabela USUARIOS. */
$nome_usuario = htmlentities($_POST['NOME']);
$email_usuario = htmlentities($_POST['EMAIL']);
$data_nascimento = htmlentities($_POST['DATA_NASCIMENTO']);

if (strlen($nome_usuario) || strlen($email_usuario) || strlen($data_nascimento)) {
  AddUsuario($connection, $nome_usuario, $email_usuario, $data_nascimento);
}

?>

<!-- formulário de cadastro -->
<form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
    <table border="0">
        <tr>
            <td>Nome</td>
            <td>Email</td>
            <td>Data de Nascimento</td>
        </tr>
        <tr>
            <td>
                <input type="text" name="NOME" maxlength="100" size="30" />
            </td>
            <td>
                <input type="email" name="EMAIL" maxlength="100" size="30" />
            </td>
            <td>
                <input type="date" name="DATA_NASCIMENTO" />
            </td>
            <td>
                <input type="submit" value="Cadastrar" />
            </td>
        </tr>
    </table>
</form>

<!-- exibir dados cadastrados -->
<table border="1" cellpadding="2" cellspacing="2">
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>Email</td>
        <td>Data de Nascimento</td>
    </tr>

<?php

// consultar todos os usuários cadastrados
$result = pg_query($connection, "SELECT * FROM USUARIOS");

while($query_data = pg_fetch_row($result)) {
    echo "<tr>";
    echo "<td>",$query_data[0], "</td>", // ID
         "<td>",$query_data[1], "</td>", // nome
         "<td>",$query_data[2], "</td>", // email
         "<td>",$query_data[3], "</td>"; // data de Nascimento
    echo "</tr>";
}
?>
</table>

<!-- Lilpeza e fechamento da conexão -->
<?php

    pg_free_result($result);
    pg_close($connection);
?>
</body>
</html>

<?php

/* função para adicionar um novo usuário na tabela. */
function AddUsuario($connection, $nome, $email, $data_nascimento) {
    $n = pg_escape_string($nome);
    $e = pg_escape_string($email);
    $d = pg_escape_string($data_nascimento);

    $query = "INSERT INTO USUARIOS (NOME, EMAIL, DATA_NASCIMENTO) VALUES ('$n', '$e', '$d');";

    if(!pg_query($connection, $query)) echo("<p>Erro ao adicionar usuário.</p>"); 
}

/* função para verificar se a tabela existe e, se não, criá-la. */
function VerifyUsuariosTable($connection, $dbName) {
    if(!TableExists("USUARIOS", $connection, $dbName)) {
        $query = "CREATE TABLE USUARIOS (
        ID serial PRIMARY KEY,
        NOME VARCHAR(100),
        EMAIL VARCHAR(100),
        DATA_NASCIMENTO DATE
        )";

    if(!pg_query($connection, $query)) echo("<p>Erro ao criar tabela de usuários.</p>"); 
    }
}

/* função para verificar a existência de uma tabela no banco de dados. */
function TableExists($tableName, $connection, $dbName) {
    $t = strtolower(pg_escape_string($tableName)); // nome da tabela é sensível a maiúsculas/minúsculas
    $d = pg_escape_string($dbName); // verificando no banco de dados correto

    $query = "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t';";
    $checktable = pg_query($connection, $query);

    if (pg_num_rows($checktable) >0) return true;
    return false;
    }
?>
