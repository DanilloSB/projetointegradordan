<?php
include 'src/DBController.php';
$db_handle = new DBController();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Pizzaria Torrent </title>
		<meta charset="utf-8">

		<!-- Estilo customizado -->
		
		<!-- xxx -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		
	</head>

	<body id="duas-colunas" class="brasil">

		<!-- Início container -->
		<div id="container">

			<!-- Início topo -->
			<div id="topo">
				<h1 class="logo">Pizzaria cidade</h1>
						
				
				<ul id="navegacao">					
					<li class="primeiro">
						<a id="home" href="index.php">Home</a>
					</li>										
					
					<li>
						<a id="contato" href="login.php">Login</a>
					</li>
					
					<li>
						<a id="vendas" href="nova_venda.php">Vendas</a>
					</li>
					
					<li>
						<a id="relatório" href="relatorio.php">Relatório</a>
					</li>
					
				</ul>
			</div><!-- fim /topo -->

			<!-- Início conteudo -->
			<div id="conteudo">

				<div id="primario">
					
					<div class="caixa destaque">
						<h2>Login</h2>
						<div class="caixa-conteudo">
						<br><br>						
						
						
						<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						  Codigo: <input type="text" name="txtcodigo">
						  
						  <input type="submit">
						</form>

						<?php
						if ($_SERVER["REQUEST_METHOD"] == "POST") {
						  $codigo = $_REQUEST['txtcodigo'];						  
						  $senha = 0;
						  if (empty($codigo)) {
							echo "Por favor digite o código";
						  } else {
							 
							 	$query = $db_handle->execQuery("SELECT * FROM tbusuarios where codigo = $codigo");	
								if ($query)
								{
								foreach ($query as $key => $value) {									
									$senha = $query[$key]["senha"];									
								}
								 if ($senha === 0){
									echo "senha incorreta";
									
								 }	
								 else{
									 session_start();
									 $_SESSION["login"] = $senha;
									 
								 }								 
								} 
						  }  

						}
						?>
						
						</div>
					</div>
				
				</div>
				
				<!-- Início lateral -->
				<div id="lateral">
					
					<div class="caixa">
						<h2>Usuários</h2>
						<div class="caixa-conteudo">
							<ul>
							<?php
							$query = $db_handle->execQuery("SELECT * FROM tbusuarios order by iduser");	
						    foreach ($query as $key => $value) {
								$id = $query[$key]["iduser"];
								$nome = $query[$key]["usuario"];
								echo '<li>'. '<a href=' . $id . $nome .'.html>' . $id . " - " . $nome .'</a></li>';										
							}
							?>
							</ul>
						</div>
					</div>

					<div class="caixa">
						<h2>Status</h2>
						<div class="caixa-conteudo">
							
							<ul>
							<?php
							if ($_SERVER["REQUEST_METHOD"] == "POST") {
						  $codigo = $_REQUEST['txtcodigo'];						  
						  $senha = 0;
						  if (empty($codigo)) {
							echo "Por favor digite o código";
						  } else {
							 
							 	$query = $db_handle->execQuery("SELECT * FROM tbusuarios where iduser = $codigo");	
								if ($query)
								{
								foreach ($query as $key => $value) {									
									$senha = $query[$key]["usuario"];									
								}
								 if ($senha === 0){
									echo "senha incorreta";
									
								 }	
								 else{
									 session_start();
									 $_SESSION["login"] = $senha;
									 										
								 }
								} echo "" . $senha;
						  }  

						}	 
							
							?>
							</ul>
						<a href="$senha" class="dropdown-toggle" 
							data-toggles="dropdown">
							Login
							<span class="hidden-xs">          
							</span>
						</a>			
						</div>
					</div>
				</div>

				</div><!-- fim /lateral -->
				
			</div><!-- fim /conteudo -->

		</div><!-- fim /container -->
		
		

		<div id="container-rodape" style="clear: both;">
			<div id="rodape">
				&copy; Copyright 2021 Etec da Zona Leste - Pizzaria Torrent
			</div>
		</div>
		

	</body>

</html>