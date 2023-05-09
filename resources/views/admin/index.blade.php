@extends('admin.master.master')

@section('head_links')
    <link rel="stylesheet" href="dashboards/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="dashboards/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="dashboards/adminlte/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="dashboards/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="dashboards/adminlte/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="dashboards/adminlte/plugins/summernote/summernote-bs4.css">
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ \App\Models\Categorie::count() }}</h3>
                                <p>Categories</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{\App\Models\SubCategorie::count()}}</h3>
                                <p>Sub Categorie</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{\App\Models\Product::count()}}</h3>
                                <p>products</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="dashboards/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="dashboards/adminlte/plugins/sparklines/sparkline.js"></script>
    <script src="dashboards/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="dashboards/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="dashboards/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="dashboards/adminlte/plugins/moment/moment.min.js"></script>
    <script src="dashboards/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="dashboards/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="dashboards/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="dashboards/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
@endsection
