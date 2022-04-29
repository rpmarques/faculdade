<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="./principal.php" class="nav-link"> <i class="nav-icon fas fa-tachometer-alt"></i>
                <p> Principal </p>
            </a>
        </li>
        <!-- CADASTROS -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p> Cadastros<i class="right fas fa-angle-left"></i> </p>
            </a>
            <ul class="nav nav-treeview">
                <!-- CLIENTES -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Clientes <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./clienteIncluir.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Incluir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./clienteListar.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Listar</p>
                            </a>
                        </li>
                    </ul>
                </li> <!-- CLIENTES -->
                <!-- FORNECEDORES -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Fornecedores <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./fornecedorIncluir.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Incluir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./fornecedorListar.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Listar</p>
                            </a>
                        </li>
                    </ul>
                </li> <!-- FORNECEDORES -->
            </ul>
        </li>
        <!-- MODULOS -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p> Módulos<i class="right fas fa-angle-left"></i> </p>
            </a>
            <ul class="nav nav-treeview">
                <!-- CONTAS A PAGAR -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Contas à Pagar <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./ctPagIncluir.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Incluir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./ctPagListar.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Listar</p>
                            </a>
                        </li>
                    </ul>
                </li> <!-- CONTAS A PAGAR -->
                <!-- CONTAS A RECEBER -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Contas à Receber <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./ctRecIncluir.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Incluir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./ctRecListar.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Listar</p>
                            </a>
                        </li>
                    </ul>
                </li> <!-- CONTAS A RECEBER -->
            </ul>
        </li>
        <!-- CADASTROS AUXILIARES-->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p> Cadastros Auxiliares<i class="right fas fa-angle-left"></i> </p>
            </a>
            <ul class="nav nav-treeview">
                <!-- FORMA DE PAGAMENTO -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Formas de Pagamento <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./formaPgtoIncluir.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Incluir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./formaPgtoListar.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Listar</p>
                            </a>
                        </li>
                    </ul>
                </li> <!-- CLIENTES -->
            </ul>
        </li>
        <li class="nav-item">
            <a href="./logout.php" class="nav-link"> <i class="nav-icon fas fa-tachometer-alt"></i>
                <p> Sair </p>
            </a>
        </li>

        <li class="nav-header">EXEMPLOS</li>
        <li class="nav-item">
            <a href="#" class="nav-link"> <i class="fas fa-circle nav-icon"></i>
                <p>Exemplo</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                    Level 1
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Level 2</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Level 2
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Level 3</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Level 3</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Level 3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Level 2</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>