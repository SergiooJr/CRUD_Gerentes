<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="font.css">
		<title> CRUD - PHP com mysqli </title>
	</head>
	<body>
		<div class="container mt-3">
			<h1>CRUD - Alteração</h1><br>
			<?php
				include_once('conexao.php');
				// recuperando 
				$codigo = $_POST['codigo'];
				$Nome = $_POST['Nome'];	
				$Endereco = $_POST['Endereco'];
				$Departamento = $_POST['Depto'];
				$DataNasc = $_POST['DataNasc'];
				
				$query = mysqli_query($conexao,"select * from tabelagerente where codigo = $codigo");
				$dados = mysqli_fetch_array($query);
				$imagem = "imagens/".$dados['Foto'];
				$nomeImagem = $dados['Foto'];
									
				$target_dir = "imagens/";
				$target_file = $target_dir . basename($_FILES["Foto"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["Foto"]["tmp_name"]);
					if($check !== false) {
						echo "<h3>Arquivo é uma imagem!" . $check["mime"] . ".</h3>";
						$uploadOk = 1;
					} else {
						echo "<h3>Arquivo não é uma imagem!</h3>";
						$uploadOk = 0;
					}
				}
				
				if (file_exists($target_file)) {
					echo "Desculpa, arquivo já existente.<br>";
					$uploadOk = 0;
				}
				
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo "Desculpa, somente arquivos JPG, JPEG, PNG & GIF são permitidos.<br>";
					$uploadOk = 0;
				}

				$sqlupdate =  "update tabelagerente set Nome='$Nome', Endereco='$Endereco', Depto='$Departamento', DataNasc='$DataNasc' where codigo=$codigo";
				
				if ($uploadOk == 0) {
					echo "<h3>Desculpe, mas não foi possível gravar a imagem do gerente!</h3>";
				} else {
						if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {
							echo "O arquivo ". htmlspecialchars( basename( $_FILES["Foto"]["name"])). " foi gravada com sucesso. <br>";
							if(file_exists($imagem) && $imagem != 'SemImagem.png')
							{
								unlink($imagem);
								echo "O arquivo " . $nomeImagem . " foi excluído<br>";
							}
							$imagem = basename( $_FILES["Foto"]["name"]);

							$sqlupdate =  "update tabelagerente set Nome='$Nome', Endereco='$Endereco', Depto='$Departamento', DataNasc='$DataNasc', Foto='$imagem' where codigo=$codigo";
						} else {
							echo "Desculpa, ocorreu um erro gravando sua imagem. <br>";
							}
						}

				// executando instrução SQL
				$resultado = @mysqli_query($conexao, $sqlupdate);
				if (!$resultado) {
					echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
					die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
				} else {
					echo "<h4>Registro Alterado com Sucesso!</h4>";
				} 
				mysqli_close($conexao);
			?>
			<br>
			<input type='button' class="btn btn-dark" onclick="window.location='alteracao.php';" value="Voltar">
		</div>
	</body>
</html>
