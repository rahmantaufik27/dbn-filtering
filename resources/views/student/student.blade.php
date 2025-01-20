@extends('layouts2.app')

@section('content')
    
    <div class="container">
        <section class="content-header">
            <div class="row">
                <div class="col-xs-12">
                <h1>
                    Siswa
                <br>
                </h1>
                <p>Data siswa</p>
                <ol class="breadcrumb">
                <li><a href="{{ url('/dashboard-v3') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active"><a href="#">Siswa</a></li>
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
                            <h3 class="box-title">Siswa</h3>
                            <hr>
                            @if (Auth::user()->id_role == 1) 
                                <a href="{{ url('/student/add') }}">
                                    <button class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Siswa</button>
                                </a>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-striped table-bordered nowrap" style="width:100" id="users-table"  width="100%">
                                <thead>
                                    <tr>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        @if (Auth::user()->id_role == 1) 
                                            <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                            </table>
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
<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>


<script>
    $( document ).ready(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! url("student/data/") !!}',
            columns: [
                { data: 'nis', name: 'nis' },
                { data: 'name', name: 'name' },
                { data: 'class', name: 'class' },
                {
                    "mRender": function(data, type, row) {
                        return '<a class="btn btn-info" href="/student/data/detail/'+row.id_user+'"> <i class="fa fa-eye"></i> </a> '+
                        '<a class="btn btn-warning" href="/student/edit/'+row.id_user+'"> <i class="fa fa-pencil"></i> </a> ' + 
                        '<a class="btn btn-danger" href="/deleteStudent/'+row.id_user+'"> <i class="fa fa-trash"></i> </a> ' ;
                    }
                }
            ],
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true,
            // scrollCollapse: true,
            "scrollX": true,
            'columnDefs': [ {
                'targets': [], /* column index */
                'orderable': false, /* true or false */
            }],
            "autoWidth": true

        });
    });
</script>