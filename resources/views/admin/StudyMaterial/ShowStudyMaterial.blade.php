@extends('admin.layouts.sideBar')
@section('adminTitle')
    Study Material
@endsection

@section('adminStyleCss')

  <!-- General CSS Files -->
  <link rel="stylesheet" href={{ url("public/assets/bundles/datatables/datatables.min.css") }}>
  <link rel="stylesheet" href={{ url("public/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css") }}>
    
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
              <div class="col-sm-2"></div>
              <div class="card col-sm-8">
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
                <div class="card-header" >
                  <h4>Study Materials</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      {{-- <a href="#" class="btn btn-lg btn-primary ml-4 showModal"  style="float: right;">Add Values</a> --}}
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>&&</th>
                            <th>Title</th>
                            <th>Source</th>
                            <th>Category</th>
                            {{-- <th>Image</th> --}}
                            <th>Action</th>
                            <th></th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($datas as $key=> $item)
                          
                          <tr>
                            <td>{{$key+1}} </td >
                              <td class="align-middle">
                                {{$item->title}}
                              </div>
                            </td>
                            <td>
                              {{$item->source}}
                            </td>
                            <td>
                              {{$item->category}}
                            </td>
                            {{-- <td>
                              <img class="featurette-image img-fluid mx-auto py-1"  alt="image" src="{{ url('uploades\StudyMaterial\\' . $item->image) }}"  style=" height: 50px;">                            
                            </td> --}}
                            <td>
                              <a href="{{ url('updateStudyMaterial') }}/{{$item->id}}"  class="btn btn-primary"><i class="
                                far fa-edit" ></i></a>
                            </td>
                            <td>
                                <form action="{{ url('deleteStudyMaterial') }}/{{$item->id}}" method="POST">@csrf @method('DELETE') <button type="submit" class="btn btn-danger"><i class="fas fa-file-excel" ></i></button> </form>
                            </td>
                            
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </section>
              </div>
            </div>
            
          </div>
          
        </div>
@endsection

@section('adminJsFile')

    <script src={{ url("public/assets/bundles/datatables/datatables.min.js") }}></script>
    <script src={{ url("public/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js") }}></script>
    <script src={{ url("public/assets/bundles/jquery-ui/jquery-ui.min.js") }}></script>
    <!-- Page Specific JS File -->
    <script src={{ url("public/assets/js/page/datatables.js") }}></script>
  
    <!-- Custom JS File -->
    
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
