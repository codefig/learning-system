<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Argon Dashboard - Free Dashboard for Bootstrap 4 by Creative Tim
  </title>
  <!-- Favicon -->
  <link href="{{ URL::to('img/brand/favicon.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ URL::to('js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
  <link href="{{ URL::to('js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ URL::to('css/argon-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="../index.html">
        <img src="{{ URL::to('img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ URL::to('img/theme/team-1-800x800.jpg') }}
">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('user.logout') }}" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="../index.html">
                <img src="{{ URL::to('img/brand/blue.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
 <ul class="navbar-nav">
          <li class="nav-item  class=" active" ">
          <a class=" nav-link " href="{{ route('user.dashboard') }}"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('user.courses.all') }}">
              <i class="ni ni-planet text-blue"></i> View All Courses
            </a>
          </li>

            <li class="nav-item">
            <a class="nav-link " href="{{ route('user.courses.subscribed') }}">
              <i class="ni ni-planet text-yellow"></i> View Enrolled Courses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('user.feedback.get') }}">
              <i class="ni ni-key-25 ni ni-pin-3 text-orange"></i> Give Feedbacks
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="{{ route('user.assignment.get') }}">
              <i class="ni ni-key-25 ni ni-pin-3 text-orange"></i> Submit Assignments
            </a>
          </li>

            <li class="nav-item">
            <a class="nav-link " href="{{ route('user.apply') }}">
              <i class="ni ni-planet text-blue"></i> Logout
            </a>
          </li>

        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Documentation</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
              <i class="ni ni-spaceship"></i> Getting started
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
              <i class="ni ni-palette"></i> Foundation
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
              <i class="ni ni-ui-04"></i> Components
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.html">User Profile</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="{{ URL::to('img/theme/team-4-800x800.jpg') }}">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Jessica Jones</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('user.logout') }}" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->


     @if(count($course) > 0)
         @foreach ($course as $course)
                        <!-- Header -->
                        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url({{ URL::to('/'.$course->publicImage())}}); background-size: cover; background-position: center top;">
                        <!-- Mask -->
                        <span class="mask bg-gradient-default opacity-8"></span>
                        <!-- Header container -->
                        <div class="container-fluid d-flex align-items-center">
                            <div class="row">
                            <div class="col-lg-7 col-md-10">
                                <h1 class="display-2 text-white">{{ $course->title }}</h1>
                                <p class="text-white mt-0 mb-5">About : {{ $course->about }}</p>
                                <a href="#!" class="btn btn-info">Update Course Info</a>
                            </div>
                            </div>
                        </div>

                        </div>
        @endforeach
    @endif


                        <!-- Page content -->
                        <div class="container-fluid mt-7">
                        <div class="row">
                            <div class="col-xl-12 order-xl-1">
                            <div class="card bg-secondary shadow">
                                <div class="card-header bg-white border-0">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                    <h3 class="mb-0">COURSE MATERIALS</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    <a href="#!" class="btn btn-sm btn-primary"></a>
                                    </div>
                                </div>
                                </div>

                                <div class="card-body">
                                <form method="POST" action="{{ route('admin.addStudent.post') }}">
                                    <h6 class="heading-small text-muted mb-4"></h6>
                                    <div class="pl-lg-4">
                                    <div class="row">
        @if(count($materials) > 0)
         @foreach ($materials as $material)

                        <div class="card text-center col-lg-4" style="width: 18rem;">
                            @if($material->isDocument())

                            <img src="{{ URL::to('img/files.svg')}}"  height="240" class="card-img-top" alt="...">
                            @else
                            <video height="240" controls>
                            <source src="{{URL::to('/'.$material->media()) }}" type="video/mp4">
                            <source src="{{URL::to('/'.$material->media()) }}" type="video/ogg">
                            </video>

                            @endif
                         <div class="card-body">
                           <h3 class="card-title">{{ $material->title }}</h3>
                           <strong class="card-text">{{ $material->shortname() }}</strong>
                           <a href="{{URL::to('/'.$material->media()) }}" class="btn btn-primary">Download</a>
                           <a href="#" class="btn btn-danger">View Online</a>
                         </div>
                       </div>

                        @endforeach
                    @endif



                  @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $err)
                            <li> {{ $err }}</li>
                    @endforeach
                </div>
                  @endif
                </div>
                <hr class="my-4" />
              </form>

              @if(Session::has('success'))
                <p class="alert alert-primary">{{ Session::get('success') }} </p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core   -->
  <script src="{{ URL::to('js/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ URL::to('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="{{ URL::to('js/argon-dashboard.min.js?v=1.1.0') }}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>

</body>

</html>
