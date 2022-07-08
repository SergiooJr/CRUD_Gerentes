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
			<form name="produto" action="veralteracao.php" method="post">
				<b>Código:</b> <input type="number" name="codigo" required="required"><br><br>
				<input type="submit" class="btn btn-light" value="Ok">
				<input type="reset" class="btn btn-dark" value="Limpar">
				<input type='button' class="btn btn-dark" onclick="window.location='index.php';" value="Voltar">
			</form>
		</div>
	</body>
</html>
