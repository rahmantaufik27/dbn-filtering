@extends('layouts2.app')

@section('content')
    <div class="container">
        <section class="content-header">
            <div class="row">
                <div class="col-xs-12">
                    <h1>
                        Dashboard
                        <br>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    </ol>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                @if (Auth::user()->id_role == 1) 
                    <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                        <div class="small-box bg-aqua">
                            <a href="{{ url('/student') }}" class="small-box-footer">

                            <div class="inner">
                            <h3>{{ $user }}</h3>

                            <p>Total Siswa</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-bag"></i>
                            </div>
                                Lebih lanjut <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                        <div class="small-box bg-yellow">
                                <a href="#" class="small-box-footer">

                            <div class="inner">
                            <h3>{{ $teacher }}</h3>

                            <p>Total Guru</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                            </div>
                                Lebih lanjut 
                                <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                        <div class="small-box bg-red">
                                <a href="{{ url('/material') }}" class="small-box-footer">

                            <div class="inner">
                            <h3>{{ $teacher }}</h3>

                            <p>Materi</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer"> --}}
                                Lebih lanjut 
                                <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                @elseif (Auth::user()->id_role == 2)
                    <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                        <div class="small-box bg-aqua">
                            <a href="{{ url('/student/result') }}" class="small-box-footer">

                            <div class="inner">
                            <h3>{{ $user }}</h3>

                            <p>Total Siswa</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-bag"></i>
                            </div>
                                Lebih lanjut <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                        <div class="small-box bg-red">
                                <a href="{{ url('/material') }}" class="small-box-footer">

                            <div class="inner">
                            <h3>{{ $teacher }}</h3>

                            <p>Materi</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer"> --}}
                                Lebih lanjut 
                                <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @elseif (Auth::user()->id_role == 3 || Auth::user()->id_role == 4)
                        <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                            <div class="small-box bg-aqua">
                                    <a href="{{ url('/material') }}" class="small-box-footer">
    
                                <div class="inner">
                                <h3>{{ $material }}</h3>
                                    
    
                                <p>Materi</p>
                                </div>
                                <div class="icon">
                                <i class="ion ion-bookmark"></i>
                                </div>
                                    Lebih lanjut <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                            <div class="small-box bg-red">
                                    <a href="{{ url('/exercise') }}" class="small-box-footer">
    
                                <div class="inner">
                                <h3>1</h3>
                                    
    
                                <p>Latihan</p>
                                </div>
                                <div class="icon">
                                <i class="ion ion-clipboard"></i>
                                </div>
                                    Lebih lanjut <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                @endif
            </div>
        </section>
    </div>
@endsection
