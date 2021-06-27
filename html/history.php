<div class="row align-items-center">

  <?php
  require_once 'bd/Conexao.php';
  $con = new Conexao();


  // $data_inicial_sqlformat = date_format($data_inicial,"Y/m/d H:i:s");
  //
  // $data_inicial= filter_input(INPUT_POST, 'data_inicial');
  // $data_final = filter_input(INPUT_POST, 'data_final');
  //  echo $data_inicial;

  //saldo por pacotes JUNTANDO e exibindo nomes dos produtos e tipos de pacotes dos respectivos logs

  //pega do BD os nomes dos produtos
  $sql2 = 'SELECT e.*, p.Produto_nome, pac.tipo FROM log_estoque as e
  INNER JOIN produtos as p ON e.PRODUTO_ID = p.ID
  INNER JOIN pacotes as pac ON e.PACOTE_ID = pac.idpacotes
  ORDER BY e.DH_MOVIMENTO DESC';
  $resultado2 = $con->query($sql2);
  $log_estoque = $resultado2->fetchAll(PDO::FETCH_OBJ);

  ?>
  <script>


  function funcaoPesquisa() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
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
  function funcaoEntradas() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("E");
    alert("input");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    th = table.getElementsByTagName("th");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 1; i < tr.length; i++) {
    // Hide the row initially.
    tr[i].style.display = "none";

    td = tr[i].getElementsByTagName("td");
    for (var j = 0; j < td.length; j++) {
      cell = tr[i].getElementsByTagName("td")[j];
      if (cell) {
        if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          break;
        }
      }
    }
}
  }
  function funcaoSaidas() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("S");
    alert("input");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    th = table.getElementsByTagName("th");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 1; i < tr.length; i++) {
    // Hide the row initially.
    tr[i].style.display = "none";

    td = tr[i].getElementsByTagName("td");
    for (var j = 0; j < td.length; j++) {
      cell = tr[i].getElementsByTagName("td")[j];
      if (cell) {
        if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          break;
        }
      }
    }
}
  }
  </script>

  <div class="col-12">

<input type="text" id="myInput" onkeyup="funcaoPesquisa()" placeholder="Pesquise aqui" style=" margin: 2%">
<br>

    <table class="table table-bordered table-striped table-responsive-md table-hover" id="myTable">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Produto</th>
          <th scope="col">Tipo de Pacote</th>
          <th scope="col">Entrada ou Saída
              

          </th>
          <th scope="col">Quantidade</th>
          <th scope="col">Data e hora</th>
        </tr>
      </thead>
      <tbody>


        <?php
        //cada item do histórico vai se repetir

        foreach ($log_estoque as $log) { ?>
          <tr>
            <td scope="row">
              <?php
              echo $log->Produto_nome;

              ?>
            </td>
            <td>
              <?php
              echo $log->tipo;
              ?>
            </td>
            <td class="mov">
              <?php
              echo $log->MOVIMENTO;
              ?>
            </td>
            <td>
              <?php
              echo $log->QUANTIDADE;
              ?>
            </td>
            <td>
              <?php
              echo $log->DH_MOVIMENTO;
              ?>
            </td>

          </tr>
        <?php
      };
        ?>
      </tbody>
    </table>
  </div>
</div>
