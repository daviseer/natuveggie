<!DOCTYPE html>
<html>
  <head>
    <title> Estoque Natuveggie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!-- <link href="style-mobile.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" media="screen and (min-width:770px)"> -->

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  </head>
  <body>


    <div class="container">
      <div class="row fixed-top align-items-center">
        <div class="col-12 text-center" style="background-color: white !important">
          <h1 class="display-4 ">Estoque Natuveggie</h1>

        </div>

      </div>
      <div class="row align-items-center" style="margin-top: 10%">
        <div class="col-md-12 align-items-center" >
          <a href="?page=estoque_ver">
            <button type="button" class="btn btn-primary btn-lg">Ver estoque</button>
          </a>
          <a href="?page=add">
            <button  type="button" class="btn btn-success btn-lg">Adicionar produtos</button>
          </a>
          <a href="?page=remove">
            <button  type="button" class="btn btn-danger btn-lg">Retirar produtos</button>
          </a>
          <a href="?page=history">
            <button  type="button" class="btn btn-info btn-lg">Histórico</button>
          </a>
        </div>
      </div>


            <?php $ok_confirm = filter_input(INPUT_GET, 'ok');  ;
            switch ($ok_confirm) {
              case 'yes':

              echo '<div class="row justify-content-md-center align-items-center" style="margin: 2%">
                      <div class="col-md-12">
                        <h4 class="alert alert-success">Adicionado com sucesso!</h4>
                      </div>
                    </div>';

              break;
              case 'no':
              echo '<div class="row justify-content-md-center align-items-center" style="margin: 2%">
                      <div class="col-md-12">
                        <h4 class="alert alert-danger">Não adicionado! Registro menor que 0, não foi registrado</h4>
                      </div>
                    </div>';
              break;
            }


            ?>



        <div class="row justify-content-md-center align-items-center">
          <div class="col-md-12">



          </div>
        </div>

      <div class="row align-items-center"style="margin-top: 5%">
        <div class="col-md-12 align-items-center" >
          <?php
//                    PAGINAS
          $page = filter_input(INPUT_GET, 'page');
          switch ($page) {
              case 'estoque_ver':
                require 'html/estoque_ver.php';
                break;
              case 'add':
                require 'html/add.php';
                break;
              case 'remove':
                require 'html/remove.php';
                break;
          }
          ?>
        </div>

      </div>

    </div>







  </body>

</html>
