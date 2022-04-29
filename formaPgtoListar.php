<?php
require_once './header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Listagem de Formas de Pagamento</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $formaPgto = $objFormaPgto->select();
                                    foreach ($formaPgto as $fPgto) { ?>
                                        <tr>
                                            <td><?= $fPgto->nome; ?></td>
                                            <td>
                                                <a class="btn bg-gradient-primary btn-xs" href="./formaPgtoEditar.php?id=<?= base64_encode($fPgto->id) ?>"><i class="fa fa-edit"></i> Editar </a>
                                                <a class="btn bg-gradient-danger btn-xs" href="./formaPgtoExcluir.php?id=<?= base64_encode($fPgto->id) ?>"><i class="fa fa-eraser"></i> Exluir </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="./formaPgtoIncluir.php" class="btn btn-primary btn-sm">Incluir Forma de Pagamento</a>
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php require_once './footer.php'; ?>