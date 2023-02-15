<?php
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "cadastroAdm";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Pega os dados do formulário
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

// Insere os dados no banco de dados
$sql = "INSERT INTO administradores (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

if ($conn->query($sql) === TRUE) {
  echo "Cadastro realizado com sucesso!";
} else {
  echo "Erro ao cadastrar: " . $conn->error;
}

$conn->close();
?>

<?php
// Verifica se os campos obrigatórios foram preenchidos
if (!isset($_POST["nome"]) || !isset($_POST["email"]) || !isset($_POST["senha"])) {
  echo "Por favor, preencha todos os campos!";
  exit;
}

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

// Verifica se o e-mail é válido
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "E-mail inválido!";
  exit;
}

// Insere os dados no banco de dados
// ...
?>

<form action="cadastro.php" method="post" onsubmit="return validarFormulario()">
  <!-- Campos do formulário -->
</form>

<script>
function validarFormulario() {
  var nome = document.getElementById("nome").value;
  var email = document.getElementById("email").value;
  var senha = document.getElementById("senha").value;

  if (nome.trim() === "") {
    alert("Por favor, preencha o campo Nome!");
    return false;
  }

  if (email.trim() === "") {
    alert("Por favor, preencha o campo E-mail!");
    return false;
  }

  if (senha.trim() === "") {
    alert("Por favor, preencha o campo Senha!");
    return false;
  }

  return true;
}
</script>

