
        <?php
        require("../layout/topo.php");
        require("../layout/menu.php");

        ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tarefas Cadastradas</h1>
                        <ol class="breadcrumb mb-4">

                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            Listar Tarefas
                            </div>
                            <div>
                              <div class="container">

                                  <div class="row">
                                      <div class="col-lg-3">
                                          <div class="input-group">
                                              <input type="text" class="form-control" id="palavra" placeholder="Buscar por...">
                                              <span class="input-group-btn">
                                                  <button class="btn btn-default" id="buscar" type="button">Buscar</button>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                                  <div id="dados">Aqui será inserindo o resultado da consulta...</div>
                              </div>

                              <script>
                                  function buscar()
                                  {
                                      //O método $.ajax(); é o responsável pela requisição
                                      $.ajax
                                              ({
                                                  //Configurações
                                                  type: 'POST',//Método que está sendo utilizado.
                                                  dataType: 'php',//É o tipo de dado que a página vai retornar.
                                                  url: '/templates/listagemtarefas.php',//Indica a página que está sendo solicitada.
                                                  //função que vai ser executada assim que a requisição for enviada
                                                  beforeSend: function () {
                                                      $("#dados").php("Carregando...");
                                                  },
                                                  data: {palavra: palavra},//Dados para consulta
                                                  //função que será executada quando a solicitação for finalizada.
                                                  success: function (msg)
                                                  {
                                                      $("#dados").php(msg);
                                                  }
                                              });
                                  }


                                  $('#buscar').click(function () {
                                      buscar($("#palavra").val())
                                  });
                              </script>


                            </div>
                        </div>
                    </div>
                </main>
  <?php
  require("../layout/rodape.php");
?>
