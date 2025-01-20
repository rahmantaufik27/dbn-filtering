@extends('layouts2.app')

@section('content')
    <div class="container">
        <section class="content-header">
            <div class="row">
                <div class="col-xs-12">
                    <h1>
                    Profile
                    <br>
                    </h1>
                    {{-- <p>Pengaturan bahan exercise untuk pembelajaran siswa</p> --}}
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/dashboard-v3') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                        <li class="active"><a href="#">Profil</a></li>
                    </ol>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                    {{-- <div class="col-md-3"> --}}
                    <div class="col-md-12">

                            <!-- Profile Image -->
                            <div class="box box-primary" >
                              <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="../../dist/img/avatar-plain.png" alt="User profile picture">
                                <h3 class="profile-username text-center"> {{ $data->name }}</h3>

                                {{-- @if (Auth::user()->id_role == 3 || Auth::user()->id_role == 4 ) --}}
                                <p class="text-muted text-center">{{ $data->nis  }}</p>
                                <ul class="list-group list-group-unbordered">
                                  <li class="list-group-item">
                                      <b>Class</b> <a class="pull-right">{{ $data->class }}</a>
                                  </li>
                                  <li class="list-group-item">
                                  <b>Knowledge levels</b> <a class="pull-right">{{ $data->knowledge_name .' - '. $data->competency }}</a>
                                  </li>
                                  <li class="list-group-item">
                                  <b>Role</b> <a class="pull-right">{{ $data->type}}</a>
                                  </li>
                                </ul>
                                {{-- @endif --}}
                  
                              </div>
                              <!-- /.box-body -->
                            </div>
                    </div>

                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="#activity-student" data-toggle="tab">Student Activity</a></li>
                                <li><a href="#student-result" data-toggle="tab">Student Result</a></li>
                            </ul>
                            <div class="tab-content">
                            <div class=" tab-pane" id="student-result">
                                <!-- Post -->
                                <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/avatar-plain.png" alt="user image">
                                        <span class="username">
                                        <a href="#">{{ $data->name }}</a>
                                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                        </span>
                                    <span class="description">Shared publicly - 7:30 PM today</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>
                                <ul class="list-inline">
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                    </li>
                                    <li class="pull-right">
                                    <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                        (5)</a></li>
                                </ul>
                
                                <input class="form-control input-sm" type="text" placeholder="Type a comment">
                                </div>
                              
                            </div>
                            <!-- /.tab-pane -->


                            <div class="active tab-pane" id="activity-student">
                                <ul class="timeline timeline-inverse">

                                    @for ($i = 0; $i < 10 ; $i++ )
                                    <li class="time-label">
                                        <span class="bg-red">
                                        10 Feb. 2014
                                        </span>
                                    </li>
                                
                                    <li>
                                        <i class="fa fa-tasks bg-blue"></i>
                    
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                        
                                        <h3 class="timeline-header"><a href="#">{{ $data->name }}</a> Mengerjakan topik eksponen</h3>
                        
                                            <div class="timeline-body">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                quora plaxo ideeli hulu weebly balihoo...
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs">Read more</a>
                                                <a class="btn btn-danger btn-xs">Delete</a>
                                            </div>
                                        </div>
                                    </li>
                                
                                    @endfor
                                </ul>
                            </div>
                            <!-- /.tab-pane -->
                
                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                
                                    <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                        </label>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
            </div>
        </section>
    </div>
@endsection
