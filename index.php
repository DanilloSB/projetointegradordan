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
		<link rel="manifest" href="manifest.webmanifest">
		<script src="./js/main.js" defer></script>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		
	</head>
	
	

	<body id="duas-colunas" class="brasil">
		<script>

			if ('serviceWorker' in navigator) {
				console.log("main.js => Vamos registrar o service worker!!!");
				navigator.serviceWorker.register('/service-worker-minimum-to-intall-pwa.js')
				.then(registration => {
				console.log("main.js => Service Worker Registrado com Sucesso");
				console.dir(registration);
			})
				.catch(error => {
				console.log("main.js => Erro ao registrar Service Worker");
				console.dir(error);
			});
		}

		</script>

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
						<h2>DESTAQUE DO DIA!!!</h2>
						<div class="caixa-conteudo">

							<h3>Promoção Marguerita</h3>
							<img class="imagem-principal" src="imagens/pizza.jpg" width="100%">
							<p>
								Queijo mussarela, parmesão, manjericão fresco e tomates.
							</p>
							<a href="pizza.php">Leia mais!</a>

						</div>
					</div>

					<div class="caixa">
						<h2>Dicas</h2>
						<div class="caixa-conteudo">

							<ul id="caixa-conteudo">
								<li>
									<a href="bordas.php">
										<img src="imagens/borda.jpg" width="80">
										<h3>Bordas Recheadas</h3>
										
									</a>
								</li>
								<li>
									<a href="vinho.php">
										<img src="imagens/vinho.jpg" width="80">
										<h3>Coma sua pizza com um bom vinho!!!</h3>
										
									</a>
								</li>
					<div class="caixa">
								<h2>Status</h2>
								<div class="caixa-conteudo">
								<a href="login.php" class="dropdown-toggle" 
								data-toggles="dropdown">
								Login
								<span class="hidden-xs">          
							</span>
						</a>			
					</div>
								
							</ul>

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
							$query = $db_handle->execQuery("SELECT * FROM tbpizzasalgada order by nomeProduto");	
						    foreach ($query as $key => $value) {
								$produto = $query[$key]["nomeProduto"];
								$valor = $query[$key]["valorProduto"];
								echo '<li>'. '<a href=' . $produto . $valor .'.html>' . $produto . " R$ " . $valor .'</a></li>';
								
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
								$produto = $query[$key]["nomeProduto"];
								$valor = $query[$key]["valorProduto"];
								echo '<li>'. '<a href=' . $produto . $valor .'.html>' . $produto . " R$ " . $valor .'</a></li>';
								
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