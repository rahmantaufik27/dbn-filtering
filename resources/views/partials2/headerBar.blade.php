<header class="main-header">
    <nav class="navbar navbar-static-top" style="background-color:#06446C;">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ url('/dashboard-v3') }}" class="navbar-brand">
            {{-- <b>ITSAESW</b> --}}
            <img src="https://res.cloudinary.com/dz5qeqamw/image/upload/v1567613356/itsaesw-logo-kecil.png" height="50px" style="margin-top:-15px;" >

          </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
             @if (Auth::user()->role_id == 4 || Auth::user()->id_role == 3)
               <li class=""><a href="{{ url('/dashboard-v3') }}">Beranda <span class="sr-only">(current)</span></a></li>
               <li class=""><a href="{{ url('/material') }}">Materi <span class="sr-only">(current)</span></a></li>
               <li class=""><a href="{{ url('/exercise') }}">Latihan <span class="sr-only">(current)</span></a></li>
              @elseif (Auth::user()->id_role == 2)
                <li class=""><a href="{{ url('/dashboard-v3') }}">Beranda <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="{{ url('/material') }}">Materi <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="{{ url('/student/result') }}">Hasil Siswa <span class="sr-only">(current)</span></a></li>
              @elseif (Auth::user()->id_role == 1)
                <li class=""><a href="{{ url('/dashboard-v3') }}">Beranda <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="{{ url('/material') }}">Materi <span class="sr-only">(current)</span></a></li>
                {{-- <li class=""><a href="{{ url('/exercise') }}">Latihan <span class="sr-only">(current)</span></a></li> --}}
                <li class=""><a href="{{ url('/student') }}">Siswa <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="{{ url('/student/result') }}">Hasil Siswa <span class="sr-only">(current)</span></a></li>
              @else
                <li class=""><a href="{{ url('/dashboard-v3') }}">Beranda <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="{{ url('/material') }}">Materi <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="{{ url('/exercise') }}">Latihan <span class="sr-only">(current)</span></a></li>
              @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu"  >
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="../../dist/img/avatar-plain.png" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ Auth::user()->username }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header"  style="background-color:#06446C;">
                  <img src="../../dist/img/avatar-plain.png" class="img-circle" alt="User Image">

                  <p>
                   {{ Auth::user()->username }}
                  {{-- <small>{{ Auth::student()->id }}</small> --}}
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        @if (Auth::user()->id_role == 3 || Auth::user()->id_role == 4 )
                          <a href="{{ url('/profile-student') }}" class="btn btn-default btn-flat">Profil</a>
                        @elseif (Auth::user()->id_role == 2) 
                          <a href="{{ url('/profile-teacher') }}" class="btn btn-default btn-flat">Profil</a>
                        @endif
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Keluar</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
