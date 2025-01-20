@extends('layouts2.app')

@section('content')

<div class="container">
        <section class="content-header">
            <div class="row">
                <div class="col-xs-12">
                    <h1>
                        Exercise
                        <br>
                    </h1>
                    <p>Pengaturan bahan exercise untuk pembelajaran siswa</p>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Exercise</a></li>
                        <li class="active"><a href="#">Add Exercise</a></li>
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
                            <h3 class="box-title">Add Exercise</h3>
                            <hr>
                            <a href="{{ url('/exercise') }}">
                                <button class="btn btn-primary pull-left"><i class="fa fa-chevron-circle-left"></i> Kembali</button>
                            </a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Minimal</label>
                                        <input type="text" class="form-control">
                                    </div>
    
                                    <div class="form-group">
                                        <label>Minimal</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Minimal</label>
                                        <input type="file" class="form-control">
                                    </div>
    
                                    <div class="form-group">
                                        <label>Minimal</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary pull-right">
                                            <i class="fa fa-save"></i> Simpan
                                        </button>
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
