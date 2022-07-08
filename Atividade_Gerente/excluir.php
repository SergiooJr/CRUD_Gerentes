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
			<h1>CRUD - Exclusão - Consulta do Gerente</h1><br>
			<?php
				include_once('conexao.php');
				// recuperando 
				$codigo = $_POST['codigo'];

				$query = mysqli_query($conexao, "select * from tabelagerente where codigo = $codigo");
				$dados = mysqli_fetch_array($query);
				$imagem = "imagens/".$dados['Foto'];
				$nomeImagem = $dados['Foto'];

				if(file_exists($imagem) && $imagem != 'SemImagem.png'){
					unlink($imagem);
					echo "O arquivo ".$nomeImagem." foi excluido com sucesso!";
				}
				// criando a linha do  DELETE
				$sqldelete =  "delete from  tabelagerente where codigo = '$codigo' ";
				
				// executando instrução SQL
				$resultado = @mysqli_query($conexao, $sqldelete);
				if (!$resultado) {
					echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
					die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
				} else {
					echo "<h4>Registro Excluído com Sucesso!</h4>";
				} 
				mysqli_close($conexao);
			?>
			<br>
			<input type='button' class="btn btn-dark" onclick="window.location='exclusao.php';" value="Voltar">
		</div>
	</body>
</html>
