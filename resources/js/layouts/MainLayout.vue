<template>
    <div class="hold-transition sidebar-mini layout-fixed" style="height: 100vh;">
        <div class="wrapper">


            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                </ul>


            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="../assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
                         class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">AdminLTE 3</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="../assets/img/user2-160x160.jpg" class="img-circle elevation-2"
                                 alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Alexander Pierce</a>
                        </div>
                    </div>


                    <sidebar></sidebar>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="height: 100vh">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">

                            <div class="col-sm-6">
                                <h1 class="m-0">
                                <slot name="main-title"></slot>
                                </h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">
                                        <router-link    to="/">
                                            Главная
                                        </router-link>
                                    </li>
                                    <li class="breadcrumb-item active"><slot name="main-title"></slot></li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <slot name="main-content"></slot>

                    </div>

                </section>
                <!-- /.content-wrapper -->


                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->
            </div>
        </div>
    </div>
</template>

<script>
    //AdminLte styles
    import '../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'
    import '../assets/plugins/fontawesome-free/css/all.min.css';
    import  '../assets/plugins/jqvmap/jqvmap.min.css';
    import  '../assets/dist/css/adminlte.min.css';
    import  '../assets/dist/css/toaster.css';

    import  '../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css';
    import  '../assets/plugins/daterangepicker/daterangepicker.css';
    import  '../assets/plugins/summernote/summernote-bs4.min.css';
    //AdminLte js
    import '../assets/plugins/jquery/jquery.min.js';
    import '../assets/dist/js/toaster.min.js';

    import  '../assets/plugins/jquery-ui/jquery-ui.min.js'
    import '../assets/plugins/bootstrap/js/bootstrap.bundle.min.js';
    import '../assets/plugins/chart.js/Chart.min.js';
    import '../assets/plugins/sparklines/sparkline.js';
    import '../assets/plugins/jqvmap/jquery.vmap.min.js';
    import '../assets/plugins/jqvmap/maps/jquery.vmap.usa.js';
    import '../assets/plugins/jquery-knob/jquery.knob.min.js';
    //import '../assets/plugins/moment/moment.min.js';
    //import '../assets/plugins/daterangepicker/daterangepicker.js';
    //import '../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js;
    import '../assets/plugins/summernote/summernote-bs4.min.js';
    import '../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js';
    import '../assets/dist/js/adminlte.js';
    //End AdminLte

    import Sidebar from './includes/Sidebar.vue';
    export default {
        components:{
          Sidebar : Sidebar
        },
        name: "MainLayout"
    }


</script>

<style scoped>

</style>