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
                    <p>Pengaturan bahan material untuk pembelajaran siswa</p>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Material</a></li>
                        <li class="active"><a href="#">Add Material</a></li>
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
                            <h3 class="box-title">Add Material</h3>
                            <hr>
                            <a href="{{ url('/material') }}">
                                <button class="btn btn-primary pull-left"><i class="fa fa-chevron-circle-left"></i> Kembali</button>
                            </a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <form  method="POST" action="{{ url('addMaterial') }}">
                                    {{ csrf_field() }}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Topic</label>
                                            <select class="form-control" name="topic">
                                                    @foreach ($data as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name}}</option>
                                                    @endforeach
                                            </select>
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
                                            <label>Link Source</label>
                                            <input type="text" class="form-control" name="source">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description"></textarea>
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
