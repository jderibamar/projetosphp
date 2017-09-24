<?php

require_once 'config.php';
//$listaProdutos = Produtos::listaProdutos();
//echo json_encode($listaProdutos);
//$sql = new Sql();
//$produto = new Produtos();
//$produto->loadById(2);
//echo $produto;
/*==================================================================================*/
//Rotina para inserção de usuário
//$user = new Usuarios('MariaJo', 'Maria Joaquina', '123');
//$user->inserir();
//echo $user;

/*==================================================================================*/
//Rotina para atualizar usuário
//$usuario = new Usuarios();
//$usuario->loadById(4);
//$usuario->update('MariaJo', 'Maria Joaquina', '123');
//echo $usuario;

/*=========================Rotina para deletar um usuário==============================*/

$usuario = new Usuarios();
$usuario->loadById(4);
$usuario->delete();
echo $usuario;

/*====================Seleciona um usuário====================================*/
//$user = new Usuarios();
//$user->loadById(3);
//echo $user;

//$lista = Usuarios::listaUsuarios();
//echo json_encode($lista);

//$busca = Usuarios::search('t');
//echo json_encode($busca);


?>

