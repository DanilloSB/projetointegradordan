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
						<h2>RELATÓRIO</h2>
						<div class="caixa-conteudo">
						<input type="text" id="myInput" onkeyup="myFunction()" 
						placeholder="pesquise a pizza.." title="Minha Pizza">
						
						<table id="myTable"   >
						  <tr>
							<th>n_pedido</th>
							<th>Qtde Vendida</th>
							<th>Nome Produto</th>
							<th>Solicitante </th>
						  </tr>
						  
						  <?php
							$conexao = new mysqli("localhost", 'root','dansk886','Pizzaria');
							
							$instrucaoSql = 
							"SELECT v.idvendas as idvendas,
							   v.qtde as qtdeTotal,
							   c.nome_cli as nomePessoa,
							   p.nomeProduto       
							 FROM vendas v
							   left JOIN tbpizzasalgada p on (v.idProduto = p.codigo)
							   left JOIN tbclientes c on (c.id_cli = v.idCliente)
							   order by v.qtde desc";
							
							$resultado = $conexao->query($instrucaoSql);
							while($linha = $resultado->fetch_assoc()) {	
							   echo "<tr>" .
									"<td>" . $linha['idvendas'] . "</td>" .
									"<td>" . $linha['qtdeTotal']  . "</td>" .
									"<td>" . $linha['nomeProduto'] . "</td>" .
									"<td>" . $linha['nomePessoa'] . "</td>" .
									"</tr>";
							}
							
						  ?>
						  
						</table>				
						
						</div>
					</div>
				
				</div>
				
				<script>
					function myFunction() {
					  var input, filter, table, tr, td, i, txtValue;
					  input = document.getElementById("myInput");
					  filter = input.value.toUpperCase();
					  table = document.getElementById("myTable");
					  tr = table.getElementsByTagName("tr");
					  for (i = 0; i < tr.length; i++) {
						td = tr[i].getElementsByTagName("td")[0];
						if (td) {
						  txtValue = td.textContent || td.innerText;
						  if (txtValue.toUpperCase().indexOf(filter) > -1) {
							tr[i].style.display = "";
						  } else {
							tr[i].style.display = "none";
						  }
						}       
					  }
					}
				</script>

				
				<!-- Início lateral -->
				<div id="lateral">
					
					<div class="caixa">
						<h2>Pizzas</h2>
						<div class="caixa-conteudo">
							<ul>
							<?php
								$query = $db_handle->execQuery("SELECT * FROM tbpizzasalgada order by codigo");	
						    	foreach ($query as $key => $value) {
								$cod = $query[$key]["codigo"];
								$nome = $query[$key]["nomeProduto"];
								echo '<li>'. '<a href=' . $cod . $nome .'.html>' . $cod . " - " . $nome .'</a></li>';
										
							}
							?>
							</ul>
						</div>
					</div>

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