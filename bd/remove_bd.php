<?php
require 'Conexao.php';

$con = new Conexao();
//pega do BD os nomes dos produtos
// $query2 = 'SELECT p.* FROM pacotes AS p ';
// $resultado2 = $con->query($query2);
// $pacotes = $resultado2->fetchAll(PDO::FETCH_OBJ);

$id_produto = filter_input(INPUT_POST, 'id_produto');


if($_POST['2un_idprod'.$id_produto]>0){
  echo $_POST['2un_idprod'.$id_produto];

  $id_pacote = 1;
  $quantidade = filter_input(INPUT_POST,'2un_idprod'.$id_produto);
  $query = 'INSERT INTO log_estoque (PRODUTO_ID, MOVIMENTO, QUANTIDADE, PACOTE_ID) VALUES (:id_produto, "S", :quantidade, :id_pacote)';
  $sth = $con->prepare($query);

  $sth->bindParam(':id_produto', $id_produto);
  $sth->bindParam(':quantidade', $quantidade);
  $sth->bindParam(':id_pacote', $id_pacote);

   $sth->execute();
}else {
 echo "Registro menor que 0, não foi registrado";
}
if($_POST['5un_idprod'.$id_produto]>0){
  echo $_POST['5un_idprod'.$id_produto];
  $id_pacote = 2;
  $quantidade = filter_input(INPUT_POST,'5un_idprod'.$id_produto);
  $query = 'INSERT INTO log_estoque (PRODUTO_ID, MOVIMENTO, QUANTIDADE, PACOTE_ID) VALUES (:id_produto, "S", :quantidade, :id_pacote)';
  $sth = $con->prepare($query);

  $sth->bindParam(':id_produto', $id_produto);
  $sth->bindParam(':quantidade', $quantidade);
  $sth->bindParam(':id_pacote', $id_pacote);

   $sth->execute();
}else {
 echo "Registro menor que 0, não foi registrado";
}
if($_POST['10un_idprod'.$id_produto]>0){
  echo $_POST['10un_idprod'.$id_produto];

  $id_pacote = 3;
  $quantidade = filter_input(INPUT_POST,'10un_idprod'.$id_produto);
  $query = 'INSERT INTO log_estoque (PRODUTO_ID, MOVIMENTO, QUANTIDADE, PACOTE_ID) VALUES (:id_produto, "S", :quantidade, :id_pacote)';
  $sth = $con->prepare($query);

  $sth->bindParam(':id_produto', $id_produto);
  $sth->bindParam(':quantidade', $quantidade);
  $sth->bindParam(':id_pacote', $id_pacote);

   $sth->execute();
}else {
 echo "Registro menor que 0, não foi registrado";
}
if($_POST['6un_idprod'.$id_produto]>0){
  echo $_POST['6un_idprod'.$id_produto];

  $id_pacote = 4;
  $quantidade = filter_input(INPUT_POST,'6un_idprod'.$id_produto);
  $query = 'INSERT INTO log_estoque (PRODUTO_ID, MOVIMENTO, QUANTIDADE, PACOTE_ID) VALUES (:id_produto, "S", :quantidade, :id_pacote)';
  $sth = $con->prepare($query);

  $sth->bindParam(':id_produto', $id_produto);
  $sth->bindParam(':quantidade', $quantidade);
  $sth->bindParam(':id_pacote', $id_pacote);

   $sth->execute();
}else {
 echo "Registro menor que 0, não foi registrado";
}
if($_POST['9un_idprod'.$id_produto]>0){
  echo $_POST['9un_idprod'.$id_produto];

  $id_pacote = 5;
  $quantidade = filter_input(INPUT_POST,'9un_idprod'.$id_produto);
  $query = 'INSERT INTO log_estoque (PRODUTO_ID, MOVIMENTO, QUANTIDADE, PACOTE_ID) VALUES (:id_produto, "S", :quantidade, :id_pacote)';
  $sth = $con->prepare($query);

  $sth->bindParam(':id_produto', $id_produto);
  $sth->bindParam(':quantidade', $quantidade);
  $sth->bindParam(':id_pacote', $id_pacote);

   $sth->execute();
}else {
 echo "Registro menor que 0, não foi registrado";
 // header('Location:../?page=add&ok=no');
}



header('Location:../?page=remove&ok=yes');
 ?>
