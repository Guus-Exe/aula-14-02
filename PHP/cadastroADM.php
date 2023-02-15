<!DOCTYPE html>
<html>

<head>
	<title>Cadastro e login de administradores</title>
	<link rel="stylesheet" href="../CSS/style.css">

</head>
<body>
	<h1>Cadastro de Administrador</h1>

	<?php
		// Verifica se o formulário foi enviado
		if (isset($_POST['submit'])) {
			// Conecta ao banco de dados
			$servername = "localhost:3306";
			$username = "root";
			$password = "root";
			$dbname = "cadastroAdm";
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Verifica se a conexão foi bem sucedida
			if (!$conn) {
			    die("Falha na conexão: " . mysqli_connect_error());
			}

			// Coleta as informações do formulário
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$senha = $_POST['senha'];

			// Insere um novo registro na tabela "administradores"
			$sql = "INSERT INTO administradores (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

			if (mysqli_query($conn, $sql)) {
			    echo "<p>Administrador cadastrado com sucesso!</p>";
			} else {
			    echo "Erro ao cadastrar o administrador: " . mysqli_error($conn);
			}

			// Fecha a conexão com o banco de dados
			mysqli_close($conn);
		}
	?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	  <label for="nome">Nome:</label>
	  <input type="text" id="nome" name="nome" required>
	  <br>
	  <label for="email">E-mail:</label>
	  <input type="email" id="email" name="email" required>
	  <br>
	  <label for="senha">Senha:</label>
	  <input type="password" id="senha" name="senha" required>
	  <br>
	  <button type="submit" name="submit">Cadastrar</button>
	</form>

	<h1>Login de Administrador</h1>

	<?php
		// Verifica se o formulário de login foi enviado
		if (isset($_POST['login'])) {
			// Conecta ao banco de dados
			$servername = "localhost:3306";
			$username = "root";
			$password = "root";
			$dbname = "cadastroAdm";
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Verifica se a conexão foi bem sucedida
			if (!$conn) {
			    die("Falha na conexão: " . mysqli_connect_error());
			}

			// Coleta as informações do formulário
			$email = $_POST['email'];
			$senha = $_POST['senha'];

			// Verifica se o e-mail e a senha correspondem a um registro na tabela "administradores"
			$sql = "SELECT * FROM administradores WHERE email='$email' AND senha='$senha'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Login bem sucedido
                echo "<p>Login bem sucedido!</p>";
            } else {
                // Login falhou
                echo "<p>Login falhou. Verifique suas credenciais e tente novamente.</p>";
            }
    
            // Fecha a conexão com o banco de dados
            mysqli_close($conn);
        }
    ?>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>
      <br>
      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" required>
      <br>
      <button type="submit" name="login">Entrar</button>
    </form>
    </body>
    </html>
