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
		<div class="centro">
			<h1>CRUD - Consulta Geral - Datelhes do Gerente</h1><br>
			<?php

				function convertedata($data){
					$data_vetor = explode('-', $data);
					$novadata = implode('/', array_reverse ($data_vetor));
					return $novadata;
				}

				include_once('conexao.php');
				// recuperando a informação da URL
				// verifica se parâmetro está correto e dento da normalidade 
				if(isset($_GET['codigo']) && is_numeric(base64_decode($_GET['codigo']))){
						$codigo = base64_decode($_GET['codigo']);
				} else {
					header('Location: index.php');
				}
				// realizando a pesquisa com o id recebido
				$query = mysqli_query($conexao,"select * from tabelagerente where codigo = $codigo");

				if (!$query) {
					echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
					die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
				}

				$dados=mysqli_fetch_array($query);
				
				if (empty($dados['Foto'])){
						$imagem = 'SemImagem.png';
					}else{
						$imagem = $dados['Foto'];
					}
				echo "<div class='card' style='width:400px; margin-left:750px;'>";
							echo "<img class='card-img-top' src='imagens/$imagem' style='width:100%'>";
							echo "<div class='card-body'>";
								echo "<h4 class='card-title' style='color: black'>".$dados['Nome']."</h4>";
								echo "<p style='color: black'>Código: ".$dados['codigo']."</h4>";
								echo "<p style='color: black'>Data de Nascimento: ".convertedata($dados['DataNasc'])."</p>";	
								echo "<p style='color: black'>Endereço: ".$dados['Endereco']."</p>";	
								echo "<p style='color: black'>Departamento: ".$dados['Depto']."</p>";
						echo "</div>";
					echo "</div>";	
				
				
				mysqli_close($conexao);
			?>
			<br>
			<p><input type='button' class="btn btn-dark" onclick="window.location='geral.php';" value="Voltar"></p>
		</div>
	</body>
</html>
