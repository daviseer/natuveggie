<div class="row">


  <div class="">
    <label for="">Entre:</label>
    <form class="" action="html/ver.estoque_ver" enctype="multipart/form-data" method="post">
        <input type="date" name="data_inicial">
    </form>
    <label for="">e</label>
    <form class="" action="html/ver.estoque_ver" enctype="multipart/form-data" method="post">
        <input type="date" name="data_final">
    </form>
  </div>
</div>
<div class="row">

<?php
require 'bd/Conexao.php';
$con = new Conexao();
//saldo por pacotes JUNTANDO e exibindo nomes dos produtos e tipos de pacotes dos respectivos logs
$sql_pacotes_produtos ='SELECT e.PRODUTO_ID, e.PACOTE_ID, p.Produto_nome, pac.tipo,
  SUM(e.quantidade) entradas_mes
  FROM log_estoque as e
  INNER JOIN produtos as p ON e.PRODUTO_ID = p.ID
  INNER JOIN pacotes as pac ON e.PACOTE_ID = pac.idpacotes
  WHERE e.dh_movimento between "2021-01-01 00:01:00" and "2022-01-01 00:01:00"
  AND e.movimento = "E"
  GROUP BY 2';

  $result_pac = $con->query($sql_pacotes_produtos);
  $pacotes_produtos = $result_pac->fetchAll(PDO::FETCH_OBJ);

//pega do BD os nomes dos produtos
$sql2 = 'SELECT p.Produto_nome FROM produtos AS p ';
$resultado2 = $con->query($sql2);
$produto = $resultado2->fetchAll(PDO::FETCH_OBJ);
//para cada item anterior (ou seja, cada nome de produto) faz parte do loop
foreach ($produto as $prod) {

    //aqui seleciona tudo dos produtos ONDE o nome é igual aos que pegamos antes
    $sql = 'SELECT p.* FROM produtos AS p WHERE Produto_nome= "' . $prod->Produto_nome . '" ' ;
    $resultado = $con->query($sql);
    $item = $resultado->fetch(PDO::FETCH_OBJ);
    if ($item) {
        $id_item = $item->ID;
    }
?>

<div class="col" >
  <div class="card" style="width: 18rem; margin: 2%">
    <div class="card-body" >
      <h2 class="card-title"><?php echo $prod->Produto_nome; ?></h2>
      <form class="" action="bd/add_bd.php" method="post" enctype="multipart/form-data">
        <h5>Pacotes:</h5>
        <label for="">2un:<?php  ?></label><br>
        <label for="">5un:</label><br>
        <label for="">10un:</label><br><br>
        <h5>Total:</h5><br>
      </form>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
  </div>
</div>


<?php } ?>

</div>
