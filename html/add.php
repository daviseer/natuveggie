<!-- <div class="row">


  <div class="">
    <label for="">Entre:</label>
    <form class="" action="html/ver.estoque_ver.php" enctype="multipart/form-data" method="post">
        <input type="date" name="data_inicial">
    </form>
    <label for="">e</label>
    <form class="" action="html/ver.estoque_ver.php" enctype="multipart/form-data" method="post">
        <input type="date" name="data_final">
    </form>
    <button type="submit" class="btn btn-primary" name="">Enviar</button>
  </div>
</div> -->


<div class="row justify-content-md-center align-items-center">
  <div class="col-md12">
   <h2 class="alert alert-danger">Apenas adicionar! Não diminuir</h2>
 </div>
</div>
<div class="row align-items-start">

<?php
require 'bd/Conexao.php';
$con = new Conexao();


// $data_inicial_sqlformat = date_format($data_inicial,"Y/m/d H:i:s");
//
// $data_inicial= filter_input(INPUT_POST, 'data_inicial');
// $data_final = filter_input(INPUT_POST, 'data_final');
//  echo $data_inicial;

//saldo por pacotes JUNTANDO e exibindo nomes dos produtos e tipos de pacotes dos respectivos logs

//pega do BD os nomes dos produtos
$sql2 = 'SELECT p.* FROM produtos AS p ';
$resultado2 = $con->query($sql2);
$produto = $resultado2->fetchAll(PDO::FETCH_OBJ);
//para cada item anterior (ou seja, cada nome de produto) faz parte do loop
foreach ($produto as $prod) {
  $sql_pacotes_produtos_2un ='SELECT e.PRODUTO_ID, e.PACOTE_ID, p.Produto_nome, pac.tipo,
  SUM(e.quantidade) entradas_mes
  FROM log_estoque as e
  INNER JOIN produtos as p ON e.PRODUTO_ID = p.ID
  INNER JOIN pacotes as pac ON e.PACOTE_ID = pac.idpacotes
  WHERE e.dh_movimento between "2021-01-01 00:01:00" and "2022-01-01 00:01:00"
  AND e.movimento = "E" and pac.tipo = "2un" and p.Produto_nome= "' . $prod->Produto_nome . '"
  GROUP BY 2';

  $result_pac2 = $con->query($sql_pacotes_produtos_2un);
  $pacotes_produtos2 = $result_pac2->fetchAll(PDO::FETCH_OBJ);
  if (empty($pacotes_produtos2) ){ $pacotes_produtos2 = ['0' => '0'];}



// um selesct para filtrar logs por pacotes de acordo com o tipo

//
  $sql_pacotes_produtos_5un ='SELECT e.PRODUTO_ID, e.PACOTE_ID, p.Produto_nome, pac.tipo,
  SUM(e.quantidade) entradas_mes
  FROM log_estoque as e
  INNER JOIN produtos as p ON e.PRODUTO_ID = p.ID
  INNER JOIN pacotes as pac ON e.PACOTE_ID = pac.idpacotes
  WHERE e.dh_movimento between "2021-01-01 00:01:00" and "2022-01-01 00:01:00"
  AND e.movimento = "E" and pac.tipo = "5un" and p.Produto_nome= "' . $prod->Produto_nome . '"
  GROUP BY 2';

  $result_pac5 = $con->query($sql_pacotes_produtos_5un);
  $pacotes_produtos5 = $result_pac5->fetchAll(PDO::FETCH_OBJ);
  if (empty($pacotes_produtos5) ){ $pacotes_produtos5 = ['0' => '0'];}

//
  $sql_pacotes_produtos_10un ='SELECT e.PRODUTO_ID, e.PACOTE_ID, p.Produto_nome, pac.tipo,
  SUM(e.quantidade) entradas_mes
  FROM log_estoque as e
  INNER JOIN produtos as p ON e.PRODUTO_ID = p.ID
  INNER JOIN pacotes as pac ON e.PACOTE_ID = pac.idpacotes
  WHERE e.dh_movimento between "2021-01-01 00:01:00" and "2022-01-01 00:01:00"
  AND e.movimento = "E" and pac.tipo = "10un" and p.Produto_nome= "' . $prod->Produto_nome . '"
  GROUP BY 2';

  $result_pac10 = $con->query($sql_pacotes_produtos_10un);
  $pacotes_produtos10 = $result_pac10->fetchAll(PDO::FETCH_OBJ);
  if (empty($pacotes_produtos10) ){ $pacotes_produtos10 = ['0' => '0'];}
//
  $sql_pacotes_produtos_6un ='SELECT e.PRODUTO_ID, e.PACOTE_ID, p.Produto_nome, pac.tipo,
  SUM(e.quantidade) entradas_mes
  FROM log_estoque as e
  INNER JOIN produtos as p ON e.PRODUTO_ID = p.ID
  INNER JOIN pacotes as pac ON e.PACOTE_ID = pac.idpacotes
  WHERE e.dh_movimento between "2021-01-01 00:01:00" and "2022-01-01 00:01:00"
  AND e.movimento = "E" and pac.tipo = "6un" and p.Produto_nome= "' . $prod->Produto_nome . '"
  GROUP BY 2';

  $result_pac6 = $con->query($sql_pacotes_produtos_6un);
  $pacotes_produtos6 = $result_pac6->fetchAll(PDO::FETCH_OBJ);
  if (empty($pacotes_produtos6) ){ $pacotes_produtos6 = ['0' => '0'];}


//
  $sql_pacotes_produtos_9un ='SELECT e.PRODUTO_ID, e.PACOTE_ID, p.Produto_nome, pac.tipo,
  SUM(e.quantidade) entradas_mes
  FROM log_estoque as e
  INNER JOIN produtos as p ON e.PRODUTO_ID = p.ID
  INNER JOIN pacotes as pac ON e.PACOTE_ID = pac.idpacotes
  WHERE e.dh_movimento between "2021-01-01 00:01:00" and "2022-01-01 00:01:00"
  AND e.movimento = "E" and pac.tipo = "9un" and p.Produto_nome= "' . $prod->Produto_nome . '"
  GROUP BY 2';

  $result_pac9 = $con->query($sql_pacotes_produtos_9un);
  $pacotes_produtos9 = $result_pac9->fetchAll(PDO::FETCH_OBJ);
  if (empty($pacotes_produtos9) ){ $pacotes_produtos9 = ['0' => '0'];}

  // foreach($group as $key=>$value)
  // {
  //    $sum+= $value;
  // }
  // echo $sum;

  // foreach ($pacotes_produtos9 as $pac_prod9un) {

      foreach ($pacotes_produtos2 as $pac_prod_2un) {
        foreach ($pacotes_produtos5 as $pac_prod_5un) {
          foreach ($pacotes_produtos10 as $pac_prod_10un) {


    //aqui seleciona tudo dos produtos ONDE o nome é igual aos que pegamos antes
    $sql = 'SELECT p.* FROM produtos AS p WHERE Produto_nome= "' . $prod->Produto_nome . '" ' ;
    $resultado = $con->query($sql);
    $item = $resultado->fetch(PDO::FETCH_OBJ);
    if ($item) {
        $id_item = $item->ID;
    }
?>
<!-- CARDS -->
<div class="col-md" >
  <div class="card border-dark text-center" style="width: 18rem; margin: 1%">
    <div class="card-body" style="padding-left: 0%; padding-right: 0%;" >
      <h2 class="card-title text-center "><?php echo $prod->Produto_nome; ?></h2>
      <form class="" action="bd/add_bd.php" method="post" enctype="multipart/form-data">
        <h5 class="card-header text-center" >Pacotes:</h5>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <div class="input-group input-group-md">
              <span class="input-group-text">2 un. atual = <?php  if (isset($pac_prod_2un->entradas_mes)) {  echo  $pac_prod_2un->entradas_mes; } else {echo 0; }  ?></span>

                <input type="hidden" name="id_produto" value="<?php echo $prod->ID ?>">

                <input type="number" name="2un_idprod<?php echo $prod->ID; ?>" class="form-control" placeholder="Add aqui!" >

            </div>
          </li>

          <?php switch ($prod->Produto_nome) {
            case "Almôndegas":
            case "Medalhões":
            foreach ($pacotes_produtos6 as $pac_prod_6un){
              echo '
              <li class="list-group-item">
              <div class="input-group input-group-md">
                <span class="input-group-text">6 </span>


                  <input type="number" name="6un_idprod'.$prod->ID .'" class="form-control" placeholder="';  if (isset($pac_prod_6un->entradas_mes)) {  echo $pac_prod_6un->entradas_mes; } else {echo 0; }; echo '">

              </div>
            </li>
            ';}
            foreach ($pacotes_produtos9 as $pac_prod_9un){echo '
            <li class="list-group-item">
              <div class="input-group input-group-md">
                <span class="input-group-text">9 </span>


                  <input type="number" name="9un_idprod'. $prod->ID .'" class="form-control" placeholder="';  if (isset($pac_prod_9un->entradas_mes)) {  echo $pac_prod_9un->entradas_mes; } else {echo 0; }; echo '">

              </div>
            </li>
            ';}
              break;

            default:
            echo '
                <li class="list-group-item">
                  <div class="input-group input-group-md">
                    <span class="input-group-text">5 </span>


                    <input type="number" name="5un_idprod'. $prod->ID .'" class="form-control" placeholder="'; if (isset($pac_prod_5un->entradas_mes)) {  echo  $pac_prod_5un->entradas_mes; } else {echo 0; }; echo  '">

                  </div>
                </li>
                <li class="list-group-item">
                  <div class="input-group input-group-md">
                    <span class="input-group-text">10un. atual= '; if (isset($pac_prod_10un->entradas_mes)) {  echo  $pac_prod_10un->entradas_mes; } else {echo 0; }; echo  '</span>


                    <input type="number" name="10un_idprod'. $prod->ID .'" class="form-control" placeholder="Add aqui!">

                  </div>
                </li>


                ';
                break;
              }


?>
                </ul>
        <!-- <h5 class="card-header">Total:
        <?php
  //
// O problema é multiplicar os pacotes pelos valores deles mesmos e somar tudo no final; nao é prioridade agora
  // $soma_total_select = "SELECT e.PRODUTO_ID,
  // SUM(e.quantidade) entradas_mes
  // FROM log_estoque as e
  // WHERE e.dh_movimento between '2021-01-01 00:01:00' and '2022-01-01 00:01:00'
  // and e.movimento = 'E' and e.PRODUTO_ID =' ".$prod->ID."'
  // group by 1";
  // $soma_total = $con->query($soma_total_select);
  // $soma_total_result = $soma_total->fetchAll(PDO::FETCH_OBJ);
  // echo $soma_total_result->entradas_mes;



         ?>
       </h5><br> -->
        <button type="submit" class="btn btn-primary" form="margin: 5%">Enviar</button>
      </form>
    </div>
  </div>
</div>



<?php }}}} ?>

</div>
