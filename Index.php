<?php

require_once 'config.php';
//$listaProdutos = Produtos::listaProdutos();
//echo json_encode($listaProdutos);
//$sql = new Sql();
//$produto = new Produtos();
//$produto->loadById(2);
//echo $produto;

//$user = new Usuarios();
//$user->loadById(2);
//echo $user;

//$lista = Usuarios::getList();
//echo json_encode($lista);

$busca = Usuarios::search('t');
echo json_encode($busca);


?>

