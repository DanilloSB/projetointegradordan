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
						<h2>VENDA</h2>
						<div class="caixa-conteudo">
						<br><br>						
												
						<form method="post" action="src/novavenda.php">
						  Código   : <input type="text" name="idProduto"></br>
						  Qtde     : &nbsp&nbsp&nbsp&nbsp<input type="text" name="txtqtde"></br>						  
						  Idcliente: <input type="text" name="txtqtde"></br></br>						  
						  <input type="submit" onclick("escurecerTela")>
						</form>	
			
						
						</div>
					</div>
				
				</div>
				
				
				<!-- Início lateral -->
				<div id="lateral">
					
					<div class="caixa">
						<h2>Pizzas</h2>
						<div class="caixa-conteudo">
							<ul>
							<?php
							$query = $db_handle->execQuery("SELECT * FROM tbpizzasalgada order by codigo");	
						    foreach ($query as $key => $value) {
								$codigo = $query[$key]["codigo"];
								$produto = $query[$key]["nomeProduto"];
								
								echo '<li>'. '<a href=' . $codigo . $produto . '.html>' . $codigo . " - " . $produto . '</a></li>';
								
							}
							?>
							</ul>
							
						</div>
					</div>
					
					<div class="caixa">
						<h2>Pizzas doces</h2>
						<div class="caixa-conteudo">

							<ul>
								
							<?php
								$query = $db_handle->execQuery("SELECT * FROM tbpizzadoce order by nomeProduto");	
						    	foreach ($query as $key => $value) {
								$cod = $query[$key]["codigo"];
								$nome = $query[$key]["nomeProduto"];
								echo '<li>'. '<a href=' . $cod . $nome .'.html>' . $cod . " - " . $nome .'</a></li>';
								
							}
							?>
								
							</ul>	
											
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