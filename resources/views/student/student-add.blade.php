@extends('layouts2.app')

@section('content')

<div class="container">
        <section class="content-header">
            <div class="row">
                <div class="col-xs-12">
                    <h1>
                        Student
                        <br>
                    </h1>
                    <p>Pengaturan bahan student untuk pembelajaran siswa</p>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Student</a></li>
                        <li class="active"><a href="#">Add Student</a></li>
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
                            <h3 class="box-title">Add Student</h3>
                            <hr>
                            <a href="{{ url('/student') }}">
                                <button class="btn btn-primary pull-left"><i class="fa fa-chevron-circle-left"></i> Kembali</button>
                            </a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <form  method="POST" action="{{ url('/addStudent') }}">
                                    {{ csrf_field() }}
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input type="number" class="form-control" name="nis">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Class</label>
                                            <select class="form-control" name="class">
                                                <option value="X-TKJ">X-TKJ</option>
                                                <option value="X-RPL">X-RPL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Knowledge Level</label>
                                            <select class="form-control" name="id_knowledge_level">
                                                @foreach ($knowledge as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name .' - '. $item->competency  }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Type Student</label>
                                            <select class="form-control" name="id_role">
                                                    @foreach ($student as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary pull-right">
                                                <i class="fa fa-save"></i> Simpan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
