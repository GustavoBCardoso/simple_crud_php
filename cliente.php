<?php
	session_start();
  if (!isset($_SESSION['login'])) { header("Location: ./"); exit; }
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Clientes</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">VIRTUA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cadastros<span class="sr-only">(current)</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="cliente.php">Clientes</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link float-right" href="index.php?sair=1">Sair</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <hr>
      <div class="row">
        <div class="col-md-10">
          <div class="form-group">
            <input type="text" class="form-control" value='' id="search" placeholder="Digite algo para pesquisar..." onkeyup='listaClientes(this.value)'>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadastroModal"> Novo Cliente </button>
          </div>
        </div>
        
      </div>

      <div class="form-body">
        <div class="row">
          <div class="col-md-12">
            <table width='100%' class="table">
              <thead>
                <tr>
                  <!-- <th scope="col">#</th> -->
                  <th scope="col">Nome</th>
                  <th scope="col">CPF/CNPJ</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Cidade</th>
                  <th scope="col">UF</th>
                  <th scope="col">AÇÕES</th>
                </tr>
              </thead>
              <tbody id='rows_clientes'>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>


       <!-- Modal de Cadastro -->
      <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="cadastroCliente">Cadastro de Clientes</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="nome">Nome</label>
                      <input type="text" class="form-control" id="nome_cliente">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="tipopessoa">Tipo de Pessoa</label>
                      <select class="form-control" id="tipopessoa">
                        <option value="F">Pessoa Fisica</option>
                        <option value="J">Pessoa Juridica</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="cpf_cnpj">CPF/CNPJ</label>
                      <input type="text" class="form-control" id="cpf_cnpj"  maxlength="14">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="telefone">Telefone</label>
                      <input type="text" class="form-control" id="telefone" maxlength="14">
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="endereco">Endereco</label>
                  <input type="text" class="form-control" id="endereco" maxlength="80">
                </div>

                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="bairro">Bairro</label>
                      <input type="text" class="form-control" id="bairro" maxlength="50">
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="cidade">Cidade</label>
                      <input type="text" class="form-control" id="cidade" maxlength="50">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="uf">UF</label>
                      <input type="text" class="form-control" id="uf" maxlength="2">
                    </div>
                  </div>
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-primary" id="bt_cadastrar" onclick="clienteCadastrar();">Cadastrar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal de Edição-->
      <div class="modal fade" id="editaModal" tabindex="-1" role="dialog" aria-labelledby="editaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="cadastroCliente">Editar Cliente</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <input type="hidden" class="form-control" id="e_id">

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="e_nome">Nome</label>
                      <input type="text" class="form-control" id="e_nome">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="e_tipopessoa">Tipo de Pessoa</label>
                      <select class="form-control" id="e_tipopessoa">
                        <option value="F">Pessoa Fisica</option>
                        <option value="J">Pessoa Juridica</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="e_cpf_cnpj">CPF/CNPJ</label>
                      <input type="text" class="form-control" id="e_cpf_cnpj"  maxlength="14">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="e_telefone">Telefone</label>
                      <input type="text" class="form-control" id="e_telefone" maxlength="14">
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="e_endereco">Endereco</label>
                  <input type="text" class="form-control" id="e_endereco" maxlength="80">
                </div>

                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="e_bairro">Bairro</label>
                      <input type="text" class="form-control" id="e_bairro" maxlength="50">
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="e_cidade">Cidade</label>
                      <input type="text" class="form-control" id="e_cidade" maxlength="50">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="e_uf">UF</label>
                      <input type="text" class="form-control" id="e_uf" maxlength="2">
                    </div>
                  </div>
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-primary" id="bt_cadastrar" onclick="clienteEditar();">Salvar</button>
            </div>
          </div>
        </div>
      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="js/ajax_cliente.js" type="text/javascript"></script>
  </body>
</html>