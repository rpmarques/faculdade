<?php
require_once './header.php';
if ($_GET) {
  if (isset($_GET['id'])) {
    $clienteId = base64_decode($_GET['id']);
    $cliente = $objClientes->pegaCli($clienteId);
  }
}
if ($_POST) {
  if (isset($_POST['id'])) {
    $clienteId = $_POST['id'];
    $ret = $objClientes->delete($clienteId);
    $cliente = $objClientes->pegaCli($clienteId);
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header"> </section> <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php
          if (isset($ret)) {
            if ($ret) {
              require_once './alertaSucesso.php';
            } else {
              require_once './alertaErro.php.php';
            }
          }
          if (!empty($cliente)) { ?>
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Exclusão de Cliente</h3>
              </div> <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <input type="hidden" value="<?= $cliente->id; ?>" name="id">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control form-control-sm" name="nome" value="<?= $cliente->nome; ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>CNPJ / CPF</label>
                        <input type="text" class="form-control form-control-sm cgc" name="cgc" value="<?= $cliente->cnpj; ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Fone 1</label>
                        <input class="form-control form-control-sm fone" name="fone1" value="<?= $cliente->fone1; ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Fone 2</label>
                        <input class="form-control form-control-sm fone" name="fone2" value="<?= $cliente->fone2; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input class="form-control form-control-sm " name="email" type="email" value="<?= $cliente->email; ?>">
                      </div>
                    </div>
                  </div>
                </div> <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
              </form>
            </div> <!-- /.card -->
          <?php }
          ?>
          <!-- general form elements -->

        </div>
        <!--/.col  -->
      </div> <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php require_once './footer.php'; ?>