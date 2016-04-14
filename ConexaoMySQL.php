<?php
/*
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Not connected : ' . mysql_error());
}else{
    echo "CONECTADO! <br>";
}

// 
$db_selected = mysql_select_db('teste', $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}else{
    echo "Banco selecionado! <br>";
}

//traz registro do banco
$result = mysql_query('SELECT * FROM pessoa');
VAR_DUMP($result);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}else{
    echo "";
}
*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Confere conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}else{
    echo 'Conectado com Sucesso!!!';
}

$sql = "";


//mysqli_query($conn,"update pessoa set nome = 'Ericsson' where idpessoa = 1");

/*
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: \t" . $row["idpessoa"]. " - Name: \t" . $row["nome"]. " - Email: \t" . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}
*/

//fecha a conexão
$conn->close();
?>
