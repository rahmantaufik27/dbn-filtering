@extends('layouts2.app')

@section('content')
    <div class="container">
        <section class="content-header">
            <div class="row">
                <div class="col-xs-12">
                <h1>
                Material
                <br>
                </h1>
                <p>Bahan materi untuk pembelajaran siswa</p>
                <ol class="breadcrumb">
                <li><a href="{{ url('/dashboard-v3') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active"><a href="#">Materi</a></li>
                </ol>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
            
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Materi</h3>
                            <hr>
                            @if (Auth::user()->id_role == 2 || Auth::user()->id_role == 1)
                                <a href="{{ url('/material/add') }}">
                                    <button class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Materi</button>
                                </a>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if (Auth::user()->id_role == 3 || Auth::user()->id_role == 4 ) 
                                <table class="table table-striped table-bordered nowrap" style="width:100" id="material-student"  width="100%">
                                    <thead>
                                        <tr>
                                            <th>Aksi</th>
                                            <th>Nama</th>
                                            <th>Topik</th>
                                            {{-- <th>Sumber</th> --}}
                                            <th>Deskripsi</th>
                                            {{-- <th>Tanggal</th> --}}
                                        </tr>
                                    </thead>
                                </table>
                            @else
                                <table class="table table-striped table-bordered nowrap" style="width:100" id="material"  width="100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Topik</th>
                                            {{-- <th>Sumber</th> --}}
                                            <th>Deskripsi</th>
                                            {{-- <th>Tanggal</th> --}}
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
    $( document ).ready(function() {
        $('#material').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! url("material/data") !!}',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'topic_name', name: 'topic_name' },
                // { data: 'source', name: 'source' },
                { data: 'description', name: 'description' },
                // { data: 'created_at', name: 'created_at' },
                {
                    "mRender": function(data, type, row) {
                        console.log(row)
                        return '<a class="btn btn-primary" href="'+row.source+'"> <i class="fa fa-download"></i> </a> ' +
                        '<a class="btn btn-warning" href="/editMaterial/'+row.id+'"> <i class="fa fa-pencil"></i> </a> ' + 
                        '<a class="btn btn-danger" href="/deleteMaterial/'+row.id+'"> <i class="fa fa-trash"></i> </a> ' ;
                    }
                }
            ],
            "scrollX": true,
            'columnDefs': [ {
                'targets': [3], 
                'orderable': false, 
            }]

        });
    });


    $( document ).ready(function() {
        $('#material-student').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! url("material/data") !!}',
            columns: [
                {
                    "mRender": function(data, type, row) {
                        console.log(row)
                        return '<a class="btn btn-primary" href="'+row.source+'" target="_blank"> <i class="fa fa-download"></i> </a> ';
                    }
                },
                { data: 'name', name: 'name' },
                { data: 'topic_name', name: 'topic_name' },
                // { data: 'source', name: 'source' },
                { data: 'description', name: 'description' },
                // { data: 'created_at', name: 'created_at' },
               
            ],
            "scrollX": true,
            'columnDefs': [ {
                'targets': [3], 
                'orderable': false, 
            }]

        });
    });
</script>