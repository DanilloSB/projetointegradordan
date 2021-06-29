<?php

include 'DBController.php';
$db_handle = new DBController();
$idProduto = $_POST['idProduto'];
$qtde = $_POST['txtqtde'];
$idCliente = $_POST['txtqtde'];
$instrucaoSql = "insert into vendas 
(idProduto,qtde,idcliente) values ($idProduto,$qtde,$idCliente)";

$query = $db_handle->execQueryNormal($instrucaoSql);


header("location:../nova_venda.php");


?>