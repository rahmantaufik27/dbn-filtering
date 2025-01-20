<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="{{ url('/dashboard-v1') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/material')}}">
                    <i class="fa fa-book"></i>
                    <span>Material</span>
                </a>
            </li>
            <li>
                <a href="https://adminlte.io/docs">
                    <i class="fa fa-database"></i>
                    <span>Exercise</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Student</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/student') }}"><i class="fa fa-line-chart"></i> Student Activity</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Student Result</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Student Profile</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Master Data</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/student') }}"><i class="fa fa-line-chart"></i> Knowledge levels</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Student Result</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Student Profile</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span>Settings</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Setting User</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Setting Material</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Setting Exercise</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Setting Activity</a></li>
                </ul>
            </li>
            <!--
            <li>
                <a href="#">
                    <i class="fa fa-th"></i> <span>Widgets</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Charts</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Morris</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Flot</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>UI Elements</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> General</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Icons</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Buttons</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Sliders</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Timeline</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Modals</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> General Elements</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Editors</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Data tables</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Profile</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Login</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Register</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Multilevel</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Level One
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>
            <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
