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
                <p>Data hasil latihan siswa</p>
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
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12"> 
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item col-md-4 col-xs-12">
                                        <a class="nav-link text-center" onclick="reset()" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="false">SELURUH SISWA</a>
                                    </li>
                                    <li class="nav-item col-md-4 col-xs-12">
                                        <a class="nav-link text-center"  id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">PER LATIHAN</a>
                                    </li>
                                    <li class="nav-item col-md-4 col-xs-12">
                                        <a class="nav-link text-center"  id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">PER SOAL</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="tabs" >
                                    <div class="tab-pane fade" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                        <div class="row">
                                            <br>
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered nowrap" style="width:100" id="per-student"  width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>NIS</th>
                                                            <th>Nama</th>
                                                            <th>Tipe Siswa</th>
                                                            <th>Kelas</th>
                                                            <th>Knowledge Level</th>
                                                            <th>Miskonsepsi</th>
                                                            <th>Paket Soal</th>
                                                            <th>Total Attempt</th>
                                                            <th>Rata Rata Nilai</th>
                                                            <th>Total Waktu</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                                        <div class="row">
                                            <br>
                                                <div class="col-md-12">
                                                    <table class="table table-striped table-bordered nowrap" style="width:100" id="per-exercise"  width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>NIS</th>
                                                                <th>Nama</th>
                                                                <th>Tipe</th>
                                                                <th>Kelas</th>
                                                                <th>Latihan</th>
                                                                <th>Paket</th>
                                                                <th>Nilai</th>
                                                                <th>Grade</th>
                                                                <th>Kompetensi</th>
                                                                <th>Miskonsepsi</th>
                                                                <th>Miskonsepsi ML</th>
                                                                <th>Waktu</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                                        <div class="row">
                                                <br>
                                                    <div class="col-md-12">
                                                        <table class="table table-striped table-bordered nowrap" style="width:100" id="per-question"  width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>NIS</th>
                                                                    <th>Nama</th>
                                                                    <th>Kelas</th>
                                                                    <th>Latihan</th>
                                                                    <th>Paket Soal</th>
                                                                    <th>Soal</th>
                                                                    <th>Benar</th>
                                                                    <th>Miskonsepsi</th>
                                                                    <th>Waktu</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
                                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
                                    </div>
                                </div>
                            </div>
                            
                           
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
   
    function reset() {
        $("#per-question").dataTable().fnDestroy()
        $("#per-exercise").dataTable().fnDestroy()
        $('#per-question').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! url("student/result/per-question") !!}',
            columns: [
                { data: 'nis', name: 'nis' },
                { data: 'student_name', name: 'student_name' },
                { data: 'class', name: 'class' },
                { data: 'attempt', name: 'attempt' },
                { data: 'package', name: 'package' },
                { data: 'code', name: 'code' },
                { data: 'correctness', name: 'correctness' },
                { data: 'misconceptions', name: 'misconceptions' },
                { data: 'timer', name: 'timer' },
            ],
            "scrollX": true,
            "dom": 'lBfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "autoWidth": true,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]


        });

        $('#per-exercise').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! url("student/result/per-execise") !!}',
            columns: [
                { data: 'nis', name: 'nis' },
                { data: 'name', name: 'name' },
                { data: 'role', name: 'role' },
                { data: 'class', name: 'class' },
                { data: 'attempt', name: 'attempt' },
                { data: 'package', name: 'package' },
                { data: 'score', name: 'score' },
                { data: 'grade', name: 'grade' },
                { data: 'competency', name: 'competency' },
                { data: 'code', name: 'code' },
                { data: 'code_ml', name: 'code_ml' },
                { data: 'timer', name: 'timer' },
                {
                    "mRender": function(data, type, row) {
                        return '<button type="button" onclick="detailQuestion('+row.id_exercise_commit+')" class="btn btn-info""> <i class="fa fa-eye"></i>'
                    }
                }
            ],
            "scrollX": true,
            "dom": 'lBfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "autoWidth": true,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]


        });

    }

    function detailQuestion(id){
        console.log(id)
        $("#per-question").dataTable().fnDestroy()
        $('#per-question').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! url("student/exercise/detail/'+id+'") !!}',
            columns: [
               { data: 'nis', name: 'nis' },
                { data: 'student_name', name: 'student_name' },
                { data: 'class', name: 'class' },
                { data: 'attempt', name: 'attempt' },
                { data: 'package', name: 'package' },
                { data: 'code', name: 'code' },
                { data: 'correctness', name: 'correctness' },
                { data: 'misconceptions', name: 'misconceptions' },
                { data: 'timer', name: 'timer' },
            ],
            "scrollX": true,
            "dom": 'lBfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "autoWidth": true,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]

        });
        $('.nav-tabs a[href="#custom-content-below-messages"]').tab('show');

    }

    function detailExercise(id){
        console.log(id)
        $("#per-exercise").dataTable().fnDestroy()
        $('#per-exercise').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! url("/student/data/'+id+'") !!}',
            columns: [
                { data: 'nis', name: 'nis' },
                { data: 'name', name: 'name' },
                { data: 'role', name: 'role' },
                { data: 'class', name: 'class' },
                { data: 'attempt', name: 'attempt' },
                { data: 'package', name: 'package' },
                { data: 'score', name: 'score' },
                { data: 'grade', name: 'grade' },
                { data: 'competency', name: 'competency' },
                { data: 'code', name: 'code' },
                { data: 'code_ml', name: 'code_ml' },
                { data: 'timer', name: 'timer' },
                {
                    "mRender": function(data, type, row) {
                        return '<button type="button" onclick="detailQuestion('+row.id_exercise_commit+')" class="btn btn-info""> <i class="fa fa-eye"></i>'
                    }
                }
            ],
            "scrollX": true,
            "dom": 'lBfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "autoWidth": true,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]


        });
        $('.nav-tabs a[href="#custom-content-below-profile"]').tab('show');

    }

    function perQuestion(){
        $("#per-question").dataTable().fnDestroy()
      $('#per-question').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! url("student/result/per-question") !!}',
            columns: [
                { data: 'nis', name: 'nis' },
                { data: 'student_name', name: 'student_name' },
                { data: 'class', name: 'class' },
                { data: 'attempt', name: 'attempt' },
                { data: 'package', name: 'package' },
                { data: 'code', name: 'code' },
                { data: 'correctness', name: 'correctness' },
                { data: 'misconceptions', name: 'misconceptions' },
                { data: 'timer', name: 'timer' },
            ],
            "scrollX": true,
            "dom": 'lBfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "autoWidth": true,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]

        });
    }


    function perExercise () {
        $("#per-exercise").dataTable().fnDestroy()
        $('#per-exercise').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! url("student/result/per-execise") !!}',
            columns: [
                { data: 'nis', name: 'nis' },
                { data: 'name', name: 'name' },
                { data: 'role', name: 'role' },
                { data: 'class', name: 'class' },
                { data: 'attempt', name: 'attempt' },
                { data: 'package', name: 'package' },
                { data: 'score', name: 'score' },
                { data: 'grade', name: 'grade' },
                { data: 'competency', name: 'competency' },
                { data: 'code', name: 'code' },
                { data: 'code_ml', name: 'code_ml' },
                { data: 'timer', name: 'timer' },
                {
                    "mRender": function(data, type, row) {
                        return '<button type="button" onclick="detailQuestion('+row.id_exercise_commit+')" class="btn btn-info""> <i class="fa fa-eye"></i>'
                    }
                }
            ],
            "scrollX": true,
            "dom": 'lBfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "autoWidth": true,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]


        });
    }
    $(document).ready(function() {
        // activaTab('custom-content-below-home');
        $('#per-student').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! url("student/result/per-student") !!}',

            columns: [
                { data: 'nis', name: 'nis' },
                { data: 'name', name: 'name' },
                { data: 'role', name: 'role' },
                { data: 'class', name: 'class' },
                { data: 'competency', name: 'competency' },
                { data: 'code', name: 'code' },
                { data: 'package', name: 'package' },
                { data: 'total_attempt', name: 'total_attempt' },
                { data: 'avg_score', name: 'avg_score' },
                { data: 'avg_time', name: 'avg_time' },
                {
                    "mRender": function(data, type, row) {
                        return '<button type="button" onclick="detailExercise('+row.id_user+')" class="btn btn-info""> <i class="fa fa-eye"></i>'
                    }
                }
            ],
            "scrollX": true,
            "dom": 'lBfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "autoWidth": true,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]


        });

        $('#per-question').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! url("student/result/per-question") !!}',
            columns: [
                { data: 'nis', name: 'nis' },
                { data: 'student_name', name: 'student_name' },
                { data: 'class', name: 'class' },
                { data: 'attempt', name: 'attempt' },
                { data: 'package', name: 'package' },
                { data: 'code', name: 'code' },
                { data: 'correctness', name: 'correctness' },
                { data: 'misconceptions', name: 'misconceptions' },
                { data: 'timer', name: 'timer' },
            ],
            "scrollX": true,
            "dom": 'lBfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "autoWidth": true,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]

        });

        $('#per-exercise').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! url("student/result/per-execise") !!}',
            columns: [
                { data: 'nis', name: 'nis' },
                { data: 'name', name: 'name' },
                { data: 'role', name: 'role' },
                { data: 'class', name: 'class' },
                { data: 'attempt', name: 'attempt' },
                { data: 'package', name: 'package' },
                { data: 'score', name: 'score' },
                { data: 'grade', name: 'grade' },
                { data: 'competency', name: 'competency' },
                { data: 'code', name: 'code' },
                { data: 'code_ml', name: 'code_ml' },
                { data: 'timer', name: 'timer' },
                {
                    "mRender": function(data, type, row) {
                        return '<button type="button" onclick="detailQuestion('+row.id_exercise_commit+')" class="btn btn-info""> <i class="fa fa-eye"></i>'
                    }
                }
            ],
            "scrollX": true,
            "dom": 'lBfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "autoWidth": true,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]


        });
        $.fn.dataTable.ext.errMode = 'none'; 

    });
</script>