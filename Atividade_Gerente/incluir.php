<html>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="font.css">
	<title> CRUD - PHP com mysqli </title>
	<body>
		<div class="container mt-3">
			<h1>CRUD - Inclusão</h1>
			<?php
				include_once('conexao.php');
				// recuperando 
				$codigo = $_POST['codigo'];
				$Nome = $_POST['Nome'];	
				$Endereco = $_POST['Endereco'];
				$Departamento = $_POST['Depto'];
				$Data = $_POST['DataNasc'];
				$nomeimagem = basename($_FILES["Foto"]["name"]);
				
				$target_dir = "imagens/";
				$imagem = $target_dir . basename($_FILES["Foto"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($imagem,PATHINFO_EXTENSION));

				if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["Foto"]["tmp_name"]);
					if($check !== false) {
						echo "<h3>Arquivo é uma imagem!" . $check["mime"] . ".</h3>";
						$uploadOk = 1;
						$nomeimagem = basename($_FILES["Foto"]["name"]);
					} else {
						echo "<h3>Arquivo não é uma imagem!</h3>";
						$uploadOk = 0;
					}
				}
				
				if (file_exists($imagem)) {
				echo "Desculpa, arquivo já existente.<br>";
				$uploadOk = 0;
				}
				
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo "Desculpa, somente arquivos JPG, JPEG, PNG & GIF são permitidos.<br>";
					$uploadOk = 0;
				}
				
				if ($uploadOk == 0) {
					echo "<h3>Desculpe, mas não foi possível gravar a imagem do gerente!</h3>";
					$sqlinsert =  "insert into tabelagerente (codigo, Nome, Endereco, Depto, DataNasc)
					values ($codigo, '$Nome', '$Endereco', '$Departamento', '$Data')";
				} else {
					if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $imagem)) {
						echo "O arquivo ". htmlspecialchars( basename( $_FILES["Foto"]["name"])). " foi gravada com sucesso. <br>";
						$sqlinsert =  "insert into tabelagerente (codigo, Nome, Endereco, Depto, DataNasc, Foto)
						values ($codigo, '$Nome', '$Endereco', '$Departamento', '$Data', '$nomeimagem')";
					} else {
						echo "Desculpa, ocorreu um erro gravando sua imagem. <br>";
					}
				}
				
				//-----------------------------------------------------------------------------//
				
				
				// executando instrução SQL
				$resultado = @mysqli_query($conexao, $sqlinsert);
				if (!$resultado) {
					echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
					die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
				} else {
					echo "Registro Cadastrado com Sucesso!";
				} 
				mysqli_close($conexao);
			?>
			<br><br>
			
			<input type='button' class="btn btn-dark" onclick="window.location='index.php';" value="Voltar">
		</div>
	</body>
</html>
