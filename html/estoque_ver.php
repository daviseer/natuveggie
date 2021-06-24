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
<div class="row align-items-center">

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
  $sql2 = 'SELECT p.*
  FROM produtos AS p ';
  $resultado2 = $con->query($sql2);
  $produto = $resultado2->fetchAll(PDO::FETCH_OBJ);

  ?>


  <div class="col-12">


    <table class="table table-bordered table-striped table-responsive-md table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Produto</th>
          <th scope="col">2 un</th>
          <th scope="col">5 un</th>
          <th scope="col">10 un</th>
        </tr>
      </thead>
      <tbody>


        <?php
        //para cada item anterior (ou seja, cada nome de produto) faz parte do loop

        foreach ($produto as $prod) {


          $sql_pacotes_produtos_2un ='SELECT e.PRODUTO_ID, e.PACOTE_ID, p.Produto_nome, pac.tipo,
          CASE
          WHEN e.MOVIMENTO = "E" then e.QUANTIDADE
          ELSE e.QUANTIDADE * -1
          END entradas,
          (select
            sum(el.quantidade) from log_estoque el
            where el.PRODUTO_ID = e.PRODUTO_ID
            and el.movimento = "E") -
            (select sum(el.quantidade) from log_estoque el
            where el.PRODUTO_ID = e.PRODUTO_ID
            and el.movimento = "S") AS saldo
            FROM log_estoque as e
            INNER JOIN produtos as p ON e.PRODUTO_ID = p.ID
            INNER JOIN pacotes as pac ON e.PACOTE_ID = pac.idpacotes
            WHERE e.dh_movimento between "2021-01-01 00:01:00" and "2022-01-01 00:01:00"
            AND e.movimento = "E" and pac.tipo = "2un" and p.Produto_nome= "' . $prod->Produto_nome . '"
            GROUP BY 2';

            $result_pac2 = $con->query($sql_pacotes_produtos_2un);
            $pacotes_produtos2 = $result_pac2->fetchAll(PDO::FETCH_OBJ);
            if (empty($pacotes_produtos2) ){ $pacotes_produtos2 = ['0' => '0'];}



            // um select para filtrar logs por pacotes de acordo com o tipo

            //
            $sql_pacotes_produtos_5un ='SELECT e.PRODUTO_ID, e.PACOTE_ID, p.Produto_nome, pac.tipo,
            CASE
            WHEN e.MOVIMENTO = "E" then e.QUANTIDADE
            ELSE e.QUANTIDADE * -1
            END entradas,
            (select
              sum(el.quantidade) from log_estoque el
              where el.PRODUTO_ID = e.PRODUTO_ID
              and el.movimento = "E") -
              (select sum(el.quantidade) from log_estoque el
              where el.PRODUTO_ID = e.PRODUTO_ID
              and el.movimento = "S") AS saldo
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
              CASE
              WHEN e.MOVIMENTO = "E" then e.QUANTIDADE
              ELSE e.QUANTIDADE * -1
              END entradas,
              (select
                sum(el.quantidade) from log_estoque el
                where el.PRODUTO_ID = e.PRODUTO_ID
                and el.movimento = "E") -
                (select sum(el.quantidade) from log_estoque el
                where el.PRODUTO_ID = e.PRODUTO_ID
                and el.movimento = "S") AS saldo
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
                CASE
                WHEN e.MOVIMENTO = "E" then e.QUANTIDADE
                ELSE e.QUANTIDADE * -1
                END entradas,
                (select
                  sum(el.quantidade) from log_estoque el
                  where el.PRODUTO_ID = e.PRODUTO_ID
                  and el.movimento = "E") -
                  (select sum(el.quantidade) from log_estoque el
                  where el.PRODUTO_ID = e.PRODUTO_ID
                  and el.movimento = "S") AS saldo
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
                  CASE
                  WHEN e.MOVIMENTO = "E" then e.QUANTIDADE
                  ELSE e.QUANTIDADE * -1
                  END entradas,
                  (select
                    sum(el.quantidade) from log_estoque el
                    where el.PRODUTO_ID = e.PRODUTO_ID
                    and el.movimento = "E") -
                    (select sum(el.quantidade) from log_estoque el
                    where el.PRODUTO_ID = e.PRODUTO_ID
                    and el.movimento = "S") AS saldo
                    FROM log_estoque as e
                    INNER JOIN produtos as p ON e.PRODUTO_ID = p.ID
                    INNER JOIN pacotes as pac ON e.PACOTE_ID = pac.idpacotes
                    WHERE e.dh_movimento between "2021-01-01 00:01:00" and "2022-01-01 00:01:00"
                    AND e.movimento = "E" and pac.tipo = "9un" and p.Produto_nome= "' . $prod->Produto_nome . '"
                    GROUP BY 2';

                    $result_pac9 = $con->query($sql_pacotes_produtos_9un);
                    $pacotes_produtos9 = $result_pac9->fetchAll(PDO::FETCH_OBJ);
                    if (empty($pacotes_produtos9) ){ $pacotes_produtos9 = ['0' => '0'];}





                          //aqui seleciona tudo dos produtos ONDE o nome é igual aos que pegamos antes
                          $sql = 'SELECT p.* FROM produtos AS p WHERE Produto_nome= "' . $prod->Produto_nome . '" ' ;
                          $resultado = $con->query($sql);
                          $item = $resultado->fetch(PDO::FETCH_OBJ);
                          if ($item) {
                            $id_item = $item->ID;
                          }

                          switch ( $prod->Produto_nome) {
                            case 'Medalhões':
                            case 'Almondegas': ?>

                            <div class="row align-items-center">
                              <div class="col-12">
                                <table class="table table-bordered table-striped table-responsive-md table-hover">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">Produto</th>
                                      <th scope="col">2 un</th>
                                      <th scope="col">6 un</th>
                                      <th scope="col">9 un</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                <?php
                                  foreach ($pacotes_produtos6 as $pac_prod_6un){
                                    foreach ($pacotes_produtos9 as $pac_prod_9un){


                                    echo '
                                    <tr>
                                    <th scope="row">'; if ($prod->Produto_nome == "Almôndegas" && "Medalhões") {
                                      echo
                                    $prod->Produto_nome .'</th>
                                    <td>
                                    ';
                                    if (isset($pac_prod_2un->saldo) ) {  echo  $pac_prod_2un->saldo; } else {echo 0; }
                                    ; echo'
                                    </td>
                                    <td>
                                    ';

                                    if (isset($pac_prod_6un->saldo)) {  echo  $pac_prod_6un->saldo; } else {echo 0; }
                                    ; echo'
                                    </td>
                                    <td>
                                    ';

                                    if (isset($pac_prod_9un->saldo)) {  echo  $pac_prod_9un->saldo; } else {echo 0; }

                                    ; echo'
                                    </td>
                                    </tr>

                                    ';}}?>
                                    <?php
                                    break;

                                  }
                                 ?>
                                </tbody>
                               </table>
                              </div>
                            </div>
                            <?php
                            //para  unidades 2, 5 e 10:
                            default:

                                                foreach ($pacotes_produtos2 as $pac_prod_2un) {
                                                  foreach ($pacotes_produtos5 as $pac_prod_5un) {
                                                    foreach ($pacotes_produtos10 as $pac_prod_10un) {

                          echo '
                          <tr>
                          <th scope="row">'. $prod->Produto_nome .'</th>
                          <td>
                          ';
                          if (isset($pac_prod_2un->saldo) ) {  echo  $pac_prod_2un->saldo; } else {echo 0; }
                          ; echo'
                          </td>
                          <td>
                          ';

                          if (isset($pac_prod_5un->saldo)) {  echo  $pac_prod_5un->saldo; } else {echo 0; }
                          ; echo'
                          </td>
                          <td>
                          ';

                          if (isset($pac_prod_10un->saldo)) {  echo  $pac_prod_10un->saldo; } else {echo 0; }

                          ; echo'
                          </td>
                          </tr>

                          ';}}}?>
                          <?php break;}
                        }
                          ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
