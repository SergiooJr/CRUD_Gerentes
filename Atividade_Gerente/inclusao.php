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
			<h1>CRUD - Inclusão</h1>
			<form name="produto" action="incluir.php" method="post" enctype="multipart/form-data">
				<div class="form-floating mb-3 mt-3">
					<input type="number" class="form-control" name="codigo" id="codigo" value='<?php echo $dados['codigo']; ?>' placeholder="Enter name" required><br><br>
					<label for="codigo">Código</label>
				</div>
				<div class="form-floating mb-3 mt-3">
					<input type="text"  class="form-control" id="nome" name="Nome" maxlength='50' placeholder="Enter name" required>
					<label for="nome">Nome</label>
				</div>
				<div class="form-floating mb-3 mt-3">
					<input type="text" class="form-control" id="endereco" name="Endereco" maxlength='50' placeholder="Enter name" required>
					<label for="endereco">Endereço</label>
				</div>
				<div class="form-floating mb-3 mt-3">
					<input type="text" class="form-control" id="departamento" name="Depto" maxlength='20' placeholder="Enter name" required>
					<label for="departamento">Departamento</label>
				</div>
				<div class="form-floating mb-3 mt-3">
					<input type="date" class="form-control" id="datanasc" name="DataNasc" required>
					<label for="datanasc">Data de Nascimento</label>
				</div>
				<div class="form-floating mb-3 mt-3">
					<input type="file" class="form-control" name="Foto" id="arquivo" maxlength='30'>
					<label for="arquivo">Foto</label>
				</div>
				<input type="submit" class="btn btn-light" value="Ok">
				<input type="reset" class="btn btn-dark" value="Limpar">
				<input type='button' class="btn btn-dark" onclick="window.location='index.php';" value="Voltar">
			</form>
		</div>
	</body>
</html>
