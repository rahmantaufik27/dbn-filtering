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
                <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
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
                        </div>
                        <!-- /.box-header -->
                        <input type="hidden" value="{{$data}}" id="id_user">
                        <div class="box-body">
                            <table class="table table-striped table-bordered nowrap" style="width:100" id="users-table"  width="100%">
                                <thead>
                                    <tr>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Latihan</th>
                                        <th>Paket</th>
                                        <th>Nilai</th>
                                        <th>Grade</th>
                                        <th>Kompetensi</th>
                                        <th>Miskonsepsi</th>
                                        <th>Waktu</th>
                                        <th>Action</th>
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
<script>
    $( document ).ready(function() {
        let id = $("#id_user").val();
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! url("student/data/'+id+'") !!}',
            columns: [
                { data: 'nis', name: 'nis' },
                { data: 'name', name: 'name' },
                { data: 'class', name: 'class' },
                { data: 'attempt', name: 'attempt' },
                { data: 'package', name: 'package' },
                { data: 'score', name: 'score' },
                { data: 'grade', name: 'grade' },
                { data: 'competency', name: 'competency' },
                { data: 'code', name: 'code' },
                { data: 'timer', name: 'timer' },
                {
                    "mRender": function(data, type, row) {
                        return '<a class="btn btn-info" href="/student/exercise/'+row.id_user+'"> <i class="fa fa-eye"></i> </a> '
                    }
                }
            ],
            "scrollX": true,
            'columnDefs': [ {
                'targets': [10], /* column index */
                'orderable': false, /* true or false */
            }],
            "dom": 'lBfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "language": {
                "emptyTable":     "My Custom Message On Empty Table"
            },
            "autoWidth": true,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]


        });
        $.fn.dataTable.ext.errMode = 'none';


    });
</script>