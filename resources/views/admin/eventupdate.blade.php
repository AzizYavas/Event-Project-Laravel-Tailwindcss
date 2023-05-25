@extends('admin.layouts.master')
@section('title', 'Etkinlik Güncelle')
@section('content')

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- Navbar -->
        @include('admin.layouts.partials.navbar')
        <!-- /.navbar -->
        <!-- /.SİDEBAR -->
        @include('admin.layouts.partials.siderbar')
        <!-- /.SİDEBAR -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Etkinlik Güncelleme Formu</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('adminhomepage') }}">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Etkinlik Güncelle</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8 mx-auto">
                            <!-- general form elements -->
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Etkinlik Güncelleme</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('admineventupdatepost') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <!-- DATA İD Sİ -->
                                        <input type="hidden" name="dataId" value="{{ $eventUpdateData->id }}">
                                        <!-- DATA İD Sİ -->

                                        <!-- KATEGORİ -->
                                        <div class="form-group">
                                            <label for="">Kategori</label>
                                            <input type="text" class="form-control" placeholder="Etkinlik Kategorisi" name="eventCategory" value="{{ $eventUpdateData->event_category }}">
                                        </div>
                                        <!-- KATEGORİ -->
                                        <!-- BAŞLIK -->
                                        <div class="form-group">
                                            <label for="">Başlık</label>
                                            <input type="text" class="form-control" placeholder="Etkinlik Başlığı" name="eventTitle"  value="{{ $eventUpdateData->event_title }}">
                                        </div>
                                        <!-- BAŞLIK -->
                                        <!-- Tarih ve Saat Seçimi -->
                                        <div class="container">
                                            <div class="row">
                                                <div class='col-md-6'>
                                                    <label for="">Etkinlik Başlangıç</label>
                                                    <div class="form-group">
                                                        <div class="input-group date" id="datetimepicker7"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"
                                                                data-target="#datetimepicker7" name="eventStart" value="{{ $eventUpdateData->event_start }}" />
                                                            <div class="input-group-append" data-target="#datetimepicker7"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-md-6'>
                                                    <label for="">Etkinlik Bitiş</label>
                                                    <div class="form-group">
                                                        <div class="input-group date" id="datetimepicker8"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"
                                                                data-target="#datetimepicker8" name="eventEnd" value="{{ $eventUpdateData->event_end }}" />
                                                            <div class="input-group-append" data-target="#datetimepicker8"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Tarih ve Saat Seçimi -->

                                        <!-- ADRES -->
                                        <div class="form-group">
                                            <label for="">Adres</label>
                                            <input type="text" class="form-control" placeholder="Etkinlik Adresi" name="eventAdress" value="{{ $eventUpdateData->event_adress }}">
                                        </div>
                                        <!-- ADRES -->

                                        <!-- Etkinlik Açıklama -->
                                        <div class="form-group">
                                            <label>Açıklama</label>
                                            <textarea class="form-control" rows="3" placeholder="Etkinlik Kısa Açıklama" name="eventDescription">{{ $eventUpdateData->event_text }}</textarea>
                                        </div>
                                        <!-- Etkinlik Açıklama -->

                                        <div class="form-group">
                                            <label for="exampleInputFile">Etkinlik Kapak Fotoğrafı</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="eventImage" ">
                                                    <label class="custom-file-label" for="exampleInputFile">Dosya
                                                        Seçiniz</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Yükle</span>
                                                </div>
                                            </div>
                                        </div>

                                        @if (!$eventUpdateData->event_imageBase64)

                                        <div class="form-group">
                                            <label for="exampleInputFile">Etkinlik Kapak Fotoğrafı</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="eventImage" >
                                                    <label class="custom-file-label" for="exampleInputFile">Dosya
                                                        Seçiniz</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Yükle</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        @else

                                        <img src="{{ $eventUpdateData->event_imageBase64 }}" alt="" width="150" height="100">

                                        @endif
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success text-dark">Güncelle</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <!-- /.content -->
        </div>
    </div>

@endsection
@section('footer')
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker7').datetimepicker();
            $('#datetimepicker8').datetimepicker({
                useCurrent: false
            });
            $("#datetimepicker7").on("change.datetimepicker", function(e) {
                $('#datetimepicker8').datetimepicker('minDate', e.date);
            });
            $("#datetimepicker8").on("change.datetimepicker", function(e) {
                $('#datetimepicker7').datetimepicker('maxDate', e.date);
            });
        });
    </script>
@endsection
