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
            <h1>CRUD - Filtrar - Consulta do Gerente</h1><br>
			<?php
            
                include_once('conexao.php');
                
                $verifica = 1;
                $verifica2 = 1;
                function convertedata($data){
					$data_vetor = explode('-', $data);
					$novadata = implode('/', array_reverse ($data_vetor));
					return $novadata;
				}

                $filtrarPor = $_POST['filtrarpor'];
                echo "<div class='container mt-3'><h4>";
                switch($filtrarPor){
                    case "2":
                        echo 'Filtrando por código ';
                        $verifica = 2;
                        break;
                    case "3":
                        echo 'Filtrando por nome ';
                        $verifica = 3;
                        break;
                    case "4":
                        echo 'Filtrando por endereço ';
                        $verifica = 4;
                        break;
                    case "5":
                        echo 'Filtrando por departamento ';
                        $verifica = 5;
                        break;   
                }
                $ordem = $_POST['ordem'];
                switch($ordem){
                    case "cmc":
                        echo 'que começa por';
                        $verifica2 = 2;
                        break;
                    case "cont":
                        echo 'que contém';
                        $verifica2 = 3;
                        break;
                    case "term":
                        echo 'que termina';
                        $verifica2 = 4;
                        break;   
                }

                if($verifica == 2 && $verifica2 == 2){
                    $filtro = $_POST['filtrar']; 
                    $filtrar = mysqli_query($conexao, "select * from tabelagerente where codigo like '$filtro%'");
                }
                else if($verifica == 2 && $verifica2 == 3){
                    $filtro = $_POST['filtrar']; 
                    $filtrar = mysqli_query($conexao, "select * from tabelagerente where codigo like '%$filtro%'");
                }
                else if($verifica == 2 && $verifica2 == 4){
                    $filtro = $_POST['filtrar']; 
                    $filtrar = mysqli_query($conexao, "select * from tabelagerente where codigo like '%$filtro'");
                }
                else if($verifica == 3 && $verifica2 == 2){
                    $filtro = $_POST['filtrar']; 
                    $filtrar = mysqli_query($conexao, "select * from tabelagerente where Nome like '$filtro%'");
                }
                else if($verifica == 3 && $verifica2 == 3){
                    $filtro = $_POST['filtrar']; 
                    $filtrar = mysqli_query($conexao, "select * from tabelagerente where Nome like '%$filtro%'");
                }
                else if($verifica == 3 && $verifica2 == 4){
                    $filtro = $_POST['filtrar']; 
                    $filtrar = mysqli_query($conexao, "select * from tabelagerente where Nome like '%$filtro'");
                }
                else if($verifica == 4 && $verifica2 == 2){
                    $filtro = $_POST['filtrar']; 
                    $filtrar = mysqli_query($conexao, "select * from tabelagerente where Endereco like '$filtro%'");
                }
                else if($verifica == 4 && $verifica2 == 3){
                    $filtro = $_POST['filtrar']; 
                    $filtrar = mysqli_query($conexao, "select * from tabelagerente where Endereco like '%$filtro%'");
                }
                else if($verifica == 4 && $verifica2 == 4){
                    $filtro = $_POST['filtrar']; 
                    $filtrar = mysqli_query($conexao, "select * from tabelagerente where Endereco like '%$filtro'");
                }
                else if($verifica == 5 && $verifica2 == 2){
                    $filtro = $_POST['filtrar']; 
                    $filtrar = mysqli_query($conexao, "select * from tabelagerente where Depto like '$filtro%'");
                }
                else if($verifica == 5 && $verifica2 == 3){
                    $filtro = $_POST['filtrar']; 
                    $filtrar = mysqli_query($conexao, "select * from tabelagerente where Depto like '%$filtro%'");
                }
                else if($verifica == 5 && $verifica2 == 4){
                    $filtro = $_POST['filtrar']; 
                    $filtrar = mysqli_query($conexao, "select * from tabelagerente where Depto like '%$filtro'");
                }
                
                echo ': "',$filtro,'"';
                echo "</div></h4>";
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

                while($dados=mysqli_fetch_array($filtrar)) 
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
                    echo "<td align='center'><a href='verproduto.php?codigo=$codigo'><img src='imagens/$imagem' width='70px' heigth='70px'></a>";
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