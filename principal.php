<?php require_once './header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header"></section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Default box -->
      <!-- Small Box (Stat card) -->
      <h5 class="mb-2 mt-4">Cadastros</h5>
      <div class="row">
        <div class="col-lg-2 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $objSemestre->contaSemestres($_SESSION['usuario_id']); ?></h3>
              <p>Semestres </p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="./semestreIncluir.php" class="small-box-footer"> Novo <i class="fas fa-plus-circle"></i> </a>
            <a href="./semestreListar.php" class="small-box-footer"> Listar <i class="fas fa-arrow-circle-right"></i> </a>
          </div>
        </div> <!-- ./col -->
        <div class="col-lg-2 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $objMateria->contaMaterias($_SESSION['usuario_id']); ?></h3>
              <p>Matérias </p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="./materiaIncluir.php" class="small-box-footer"> Novo <i class="fas fa-plus-circle"></i> </a>
            <a href="./materiaListar.php" class="small-box-footer"> Listar <i class="fas fa-arrow-circle-right"></i> </a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-2 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $objTarefa->contaTarefas($_SESSION['usuario_id']); ?></h3>
              <p>Tarefas </p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="./tarefaIncluir.php" class="small-box-footer"> Novo <i class="fas fa-plus-circle"></i> </a>
            <a href="./tarefaListar.php" class="small-box-footer"> Listar <i class="fas fa-arrow-circle-right"></i> </a>
          </div>
        </div><!-- ./col -->
      </div><!-- /.row -->

      <!-- Small Box (Stat card) -->
      <h5 class="mb-2 mt-4">Movimentos</h5>
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <!-- Loading (remove the following to stop the loading)-->
            <div class="overlay">
              <i class="fas fa-3x fa-sync-alt"></i>
            </div>
            <!-- end loading -->
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-success">
            <!-- Loading (remove the following to stop the loading)-->
            <div class="overlay dark">
              <i class="fas fa-3x fa-sync-alt"></i>
            </div>
            <!-- end loading -->
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once './footer.php' ?>