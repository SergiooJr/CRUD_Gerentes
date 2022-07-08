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
			<h1>CRUD - Consulta Geral</h1>
			<p><b>* Clique na foto para ver detalhes</b></p>
			<form name="produto" action="filtrar.php" method="post">
				<!--<div class="form-floating mb-3 mt-3">-->
				<p>
					Filtrar por
					<select name = "filtrarpor">
						<option value="2">Código</option>
						<option value="3">Nome</option>
						<option value="4">Endereço</option>
						<option value="5">Departamento</option>
					</select>
					Que
					<select name = "ordem">
						<option value="cmc">Começa com</option>
						<option value="cont">Contém</option>
						<option value="term">Termina com</option>
					</select>
					Valor:  
					<input type="text" name="filtrar">
					<input type="submit" class="btn btn-light" value="Ok">
				</p>
			</form>
			<?php
				include_once('conexao.php');
				
				function convertedata($data){
					$data_vetor = explode('-', $data);
					$novadata = implode('/', array_reverse ($data_vetor));
					return $novadata;
				}

				// ajustando a instrução select para ordenar por nome
				$query = mysqli_query($conexao,"select * from tabelagerente order by Nome");

				if (!$query) {
					echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
					die('<b>Query Inválida:</b>' . @mysqli_error($conexao));  
				}

				echo "<table class='table table-bordered'>";
					echo "<thead>";
						echo "<tr class='table-dark'>
								<th width='30px' align='center'>Código</th>
								<th width='100px'>Nome</th>
								<th width='250px'>Endereço</th>
								<th width='100px'>Departamento</th>
								<th width='100px'>Data de Nasc.</th>
								<th width='100px'>Foto</th>
							</tr>";
					echo "</thead>";

				while($dados=mysqli_fetch_array($query)) 
				{
					echo "<tr class='table-dark'>";
					echo "<td align='center'>". $dados['codigo']."</td>";
					echo "<td>". $dados['Nome']."</td>";
					echo "<td>". $dados['Endereco']."</td>";
					echo "<td>". $dados['Depto']."</td>";
					echo "<td>".convertedata($dados['DataNasc'])."</td>";				
					// buscando a na pasta imagem
					if (empty($dados['Foto'])){
						$imagem = 'SemImagem.png';
					}else{
						$imagem = $dados['Foto'];
					}
					$codigo = base64_encode($dados['codigo']);
					echo "<td align='center'><a href='vergerente.php?codigo=$codigo'><img src='imagens/$imagem' width='70px' heigth='70px'></a>";
					echo "</tr>";
				}
				echo "</table>";
				
				mysqli_close($conexao);
			?>
			<br>
			<p><input type='button' class="btn btn-dark" onclick="window.location='index.php';" value="Voltar"></p>
		</div>
	</body>
</html>
