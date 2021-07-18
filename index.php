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

      <link rel="stylesheet" href="css/fontawesome-free-5.15.3-web/css/all.min.css">

  </head>
  <body>


    <div class="container">
      <div class="row align-items-center">
        <div class="col-sm-12 text-center" style="background-color: white !important; margin: 3% auto 3% auto">
          <h1 class="display-5 ">Estoque Natuveggie</h1>

        </div>

      </div>
      <div class="row  justify-content-center" style="margin-top: 5%">
        <div class="col-sm text-center "style="margin: 2% auto 2% auto" >
          <a href="?page=estoque_ver">
            <button type="button" class="btn btn-primary btn-lg">Ver estoque</button>
          </a>
        </div>
        <div class="col-sm text-center "style="margin: 2% auto 2% auto" >
          <a href="?page=add">
            <button  type="button" class="btn btn-success btn-lg">Adicionar produtos</button>
          </a>
          </div>
          <div class="col-sm text-center "style="margin: 2% auto 2% auto" >
          <a href="?page=remove">
            <button  type="button" class="btn btn-danger btn-lg">Retirar produtos</button>
          </a>
          </div>
          <div class="col-sm text-center "style="margin: 2% auto 2% auto" >
          <a href="?page=history">
            <button  type="button" class="btn btn-info btn-lg">Histórico</button>
          </a>
          </div>
        </div>
      </div>




            <?php $ok_confirm = filter_input(INPUT_GET, 'ok');  ;
            switch ($ok_confirm) {
              case 'yes':

              echo '<div class="row justify-content-sm-center align-items-center" style="margin: 2%">
                      <div class="col-sm-12">
                        <h4 class="alert alert-success">Registrado com sucesso!</h4>
                      </div>
                    </div>';

              break;
              case 'no':
              echo '<div class="row justify-content-sm-center align-items-center" style="margin: 2%">
                      <div class="col-sm-12">
                        <h4 class="alert alert-danger">Não registrado! Registro menor que 0, não foi registrado</h4>
                      </div>
                    </div>';
              break;
            }


            ?>


            <div class="container">

      <div class="row align-items-center justify-content-sm-center" style="margin-top: 5%">
        <div class="col-sm-12 align-items-center" >
          <?php
//                    PAGINAS
          $page = filter_input(INPUT_GET, 'page');
          switch ($page) {
              case 'estoque_ver':
                require 'html/estoque_tipo1.php';
                require 'html/estoque_tipo2.php';
                break;
              case 'add':
                require 'html/add.php';
                break;
              case 'remove':
                require 'html/remove.php';
                break;
              case 'history':
                require 'html/history.php';
                break;
              default:
              require 'html/estoque_tipo1.php';
              require 'html/estoque_tipo2.php';
              break;
          }
          ?>
        </div>

      </div>

    </div>








  </body>

</html>
