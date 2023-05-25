@extends('admin.layouts.master')
@section('title', 'Yönetim Paneli')
@section('content')

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        @include('admin.layouts.partials.navbar')
        <!-- /.navbar -->

        <!-- /.SİDEBAR -->
        @include('admin.layouts.partials.siderbar')
        <!-- /.SİDEBAR -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            {{-- @include('admin.layouts.partials.header') --}}
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Anasayfa</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('adminhomepage') }}">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Panel</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $eventCount }}</h3>
                                    <p>Tüm Etkinlik Sayısı</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-12 connectedSortable">
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Tüm Etkinlikler</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 10px">#</th>
                                                                <th style="width: 30px">Başlık</th>
                                                                <th style="width: 30px">Kategori</th>
                                                                <th style="width: 30px">Başlama Tarihi</th>
                                                                <th style="width: 30px">Bitiş Tarihi</th>
                                                                <th style="width: 5px">İşlemler</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($allEvent as $takeAllEvent)
                                                                <tr>
                                                                    <td>{{ $takeAllEvent->id }}</td>
                                                                    <td>{{ $takeAllEvent->event_title }}</td>
                                                                    <td>
                                                                        {{ $takeAllEvent->event_category }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $takeAllEvent->event_start }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $takeAllEvent->event_end }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="row d-flex justify-content-end">
                                                                            <div class="col-md-6">
                                                                                <a
                                                                                    href="
                                                                                {{ route('admineventupdate', ['id' => $takeAllEvent->id]) }}
                                                                                ">
                                                                                    <button
                                                                                        class="btn btn-primary">Düzenle</button>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <a href="{{ route('admineventdelete', ['id' => $takeAllEvent->id]) }}">
                                                                                    <button
                                                                                        class="btn btn-danger">Sil</button>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer clearfix">
                                                    <ul class="pagination pagination-sm m-0 float-right">
                                                        <li class="page-item"><a class="page-link"
                                                                href="#">&laquo;</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                        <li class="page-item"><a class="page-link"
                                                                href="#">&raquo;</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </section>
                        </section>
                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>

@endsection
