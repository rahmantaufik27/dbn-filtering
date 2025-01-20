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
                    <li class="active"><a href="#">Edit Student</a></li>
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
                            <h3 class="box-title">Detail Student</h3>
                            <hr>
                            <a href="{{ url('/student') }}">
                                <button class="btn btn-primary pull-left"><i class="fa fa-chevron-circle-left"></i> Kembali</button>
                            </a>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table border="1px">
                                            <tr>
                                                <td>
                                                    {{ $data->name }}
                                                </td>
                                                <td>
                                                    {{ $data->class }}
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary" type="button">
                                                </td>
                                            </tr>
                                        </table>
                                        @foreach ($data->exercise_commit as $item)
                                            {{ $item }}
                                    
                                            @foreach ($item->exercise_per_question as $itemA)
                                                {{ $itemA }}
                                            @endforeach
                                    
                                            {{ $item->exercise_result->grade}}
                                    
                                        @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            
            
            
    </section>
</div>
@endsection
