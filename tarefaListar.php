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
                            <h3 class="card-title">Listagem de Tarefas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm ">
                                <thead>
                                    <tr>
                                        <th>Semestre</th>
                                        <th>Matéria</th>
                                        <th>Tipo de Atividade</th>
                                        <th>Data de Vencimento</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tarefas = $objTarefa->select($_SESSION['usuario_id']);
                                    foreach ($tarefas as $item) { ?>
                                        <tr>
                                            <td><?= $item->semestre ?></td>
                                            <td><?= $item->nome_materia ?></td>
                                            <td><?= $item->tipo_atividade_id . " - " . $item->nome; ?></td>
                                            <td><?= formataData($item->data_venc); ?></td>
                                            <td>
                                                <a class="btn bg-gradient-primary btn-xs" href="./tarefaEditar.php?id=<?= base64_encode($item->id) ?>"><i class="fa fa-edit"></i> Editar </a>
                                                <a class="btn bg-gradient-primary btn-xs" href="./finalizarTarefa.php?id=<?= base64_encode($item->id) ?>"><i class="fa fa-edit"></i> Finalizar </a>
                                                <a class="btn bg-gradient-danger btn-xs" href="./tarefaExcluir.php?id=<?= base64_encode($item->id) ?>"><i class="fa fa-eraser"></i> Exluir </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="./tarefaIncluir.php" class="btn btn-primary btn-sm">Incluir Tarefa</a>
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php require_once './footer.php'; ?>