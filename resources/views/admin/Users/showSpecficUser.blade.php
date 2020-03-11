@extends('admin.layouts.sideBar')
@section('adminTitle')
    View Details
@endsection

@section('adminStyleCss')

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../assets/img/favicon.ico' />

@endsection
@section('adminSide')
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
          <div class="navbar-bg"></div>
          
          <!-- Main Content -->
          <div class="main-content">
            <section class="section">
              <div class="section-body">
               
                <div class="row">
                  <div class="col-sm-3"></div>
                    <div class="card">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  @if (session('status'))
                      <div class="alert alert-success alert-dismissible" role="alert">
                          {{session('status')}}
                      </div>
                  @endif
                  @if (session('error'))
                      <div class="alert alert-danger alert-dismissible" role="alert">
                          {{session('error')}}
                      </div>
                  @endif
                      
                      <div class="card-body">
                        <div class="table-responsive">
                            <div class="container border rounded pt-2">
                                        <h2>View Records</h2>
                                        
                                           
                                           
                                           
                                            <div class="form-group clearfix">
                                              <label class="col-sm-12 control-label ">
                                                <img class="featurette-image img-fluid mx-auto py-1"  alt="image" src="{{ url('uploades/profileImages/' . $user->Image) }}"  style=" height: 200px;">                            
                                              </label>
                                            </div>

                                            <div class="form-group clearfix">
                                              <label class="col-sm-12 control-label ">
                                                <div class="row">
                                                  <div class="col-sm-auto">

                                                    Name : {{$user->firstName}} {{$user->lastName}}
                                                  </div>
                                                  <div class="col-sm-auto">
                                                    Email : {{$user->email}}

                                                  </div>
                                                </div>
                                              </label>
                                            </div>

                                            <div class="form-group clearfix">
                                              <label class="col-sm-12 control-label ">
                                                <div class="row">
                                                  <div class="col-sm-auto">

                                                    Mobile : {{$user->mobile}}
                                                  </div>
                                                  <div class="col-sm-auto">
                                                    profile : {{$user->is_admin}}

                                                  </div>
                                                  <div class="col-sm-auto">

                                                    User_id : {{$user->userId}}
                                                  </div>  
                                                </div>
                                              </label>
                                            </div>
                                            
                                            <div class="form-group clearfix">
                                              <label class="col-sm-12 control-label ">
                                                <div class="row">
                                                  
                                                  <div class="col-sm-auto">
                                                    Address : {{$user->address}}

                                                  </div>
                                                  <div class="col-sm-auto">
                                                    PinCode : {{$user->pinCode}}

                                                  </div>
                                                </div>
                                              </label>
                                            </div>
                                            
                                            <div class="form-group clearfix">
                                              <label class="col-sm-12 control-label ">
                                                <div class="row">
                                                  
                                                  <div class="col-sm-auto">
                                                    Profile_created : Profile created on {{date('d M, Y', strtotime($user->created_at))}}

                                                  </div>
                                                </div>
                                              </label>
                                            </div>
                                            
                            </div>
                        </div>
                      </div>
                    </div>
                  </section>
                  </div>
                </div>
               
              </div>
            
      </div>
          
@endsection

@include('admin.modals.updaingSlide')      
    
@section('adminJsFile')
    <!-- General JS Scripts -->
    <script src="../assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="../assets/bundles/datatables/datatables.min.js"></script>
    <script src="../assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <script src="../assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="../assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../assets/js/custom.js"></script>
    <script>
         $(function () {
        setTimeout(function () {
           if ($(".alert").is(":visible")){
                //you may add animate.css class for fancy fadeout
               $(".alert").fadeOut("fast");
                            }
                        }, 2000)

                  });
    </script>
    
@endsection