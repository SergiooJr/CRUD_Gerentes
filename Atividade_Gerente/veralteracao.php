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
			<h1>CRUD - Alteração</h1>
			<?php
				include_once('conexao.php');
				// recuperando 
				$codigo = $_POST['codigo'];

				// criando a linha do  SELECT
				$sqlconsulta =  "select * from tabelagerente where codigo = $codigo";
				
				// executando instrução SQL
				$resultado = @mysqli_query($conexao, $sqlconsulta);
				if (!$resultado) {
					echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
					die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
				} else {
					$num = @mysqli_num_rows($resultado);
					if ($num==0){
					echo "<b>Código </b>não localizado !!!!<br><br>";
					echo '<input type="button" onclick="window.location='."'alteracao.php'".';" value="Voltar"><br><br>';
					exit;
					}else{
						$dados=mysqli_fetch_array($resultado);
					}
				} 
				mysqli_close($conexao);
			?>
			<form name="gerentes" action="alterar.php" method="post" enctype="multipart/form-data">
				<div class="form-floating mb-3 mt-3">
					<input type="number" class="form-control" name="codigo" id="codigo" value='<?php echo $dados['codigo']; ?>' readonly placeholder="Enter name"><br><br>
					<label for="codigo">Código</label>
				</div>
				<div class="form-floating mb-3 mt-3">	
					<input type="text" class="form-control" name="Nome" id="nome" maxlength='80' style="width:550px" value='<?php echo $dados['Nome']; ?>' placeholder="Enter name">
					<label for="nome">Nome</label>
				</div>
				<div class="form-floating mb-3 mt-3">
					<input type="text" class="form-control" name="Endereco" id="endereco" maxlength='80' style="width:550px" value='<?php echo $dados['Endereco']; ?>' placeholder="Enter name">
					<label for="endereco">Endereço</label>
				</div>
				<div class="form-floating mb-3 mt-3">
					<input type="text" class="form-control" name="Depto" id="depto" maxlength='80' style="width:550px" value='<?php echo $dados['Depto']; ?>' placeholder="Enter name">
					<label for="depto">Departamento</label>
				</div>
				<div class="form-floating mb-3 mt-3">
					<input type="date" class="form-control" name="DataNasc" id="datanasc" value='<?php echo $dados['DataNasc']; ?>'>
					<label for="datanasc">Data de Nascimento</label>
				</div>
				<?php
				if (empty($dados['Foto'])){
					$imagem = 'SemImagem.png';
				}else{
					$imagem = $dados['Foto'];
				}
				echo "<div class='card' style='width:400px;'>";
					echo "<div class='card-body'>";
						echo "<h4 class='card-title' style='color: black'>Foto atual</h4>";
					echo "</div>";
					echo "<img class='card-img-top' src='imagens/$imagem' style='width:100%'>";
				echo "</div>";
				?>
				<div class="form-floating mb-3 mt-3">
					<input type="file" class="form-control" name="Foto" id="arquivo" maxlength='30'>
					<label for="arquivo">Alterar foto?</label>
				</div>
				<p><div>
					<input type="submit" class="btn btn-light" value="Ok">&nbsp;&nbsp;
					<input type="reset" class="btn btn-dark" value="Limpar">
					<input type='button' class="btn btn-dark" onclick="window.location='alteracao.php';" value="Voltar">
				</div></p>
			</form>
		</div>
	</body>
</html>
