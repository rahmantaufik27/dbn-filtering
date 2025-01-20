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
                        <li class="active"><a href="#">Exercise</a></li>
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
                            <h3 class="box-title">Exercise</h3>
                            <hr>
                            @if (Auth::user()->role_id == 3) 
                                <a href="{{ url('/exercise/add') }}">
                                    <button class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Exercise</button>
                                </a>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
