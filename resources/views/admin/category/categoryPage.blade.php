@extends('admin.layouts.sideBar')
@section('adminTitle')
 Category
@endsection

@section('adminStyleCss')

  <!-- General CSS Files -->
  <link rel="stylesheet" href={{ url("public/assets/css/app.min.css") }}>
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
                    <h4>Values Table</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <a href="#" class="btn btn-lg btn-primary ml-4 showModal"  style="float: right;">Add Values</a>
                      {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Modal
                        With Form</button> --}}
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            
                            <th>&&</th>
                            <th>Source</th>
                            <th>Category</th>
                            <th>added Date</th>
                            <th>Action</th>
                            <th></th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dataDb as $key=> $item)
                              
                          <tr>
                            
                            <td>{{$key+1}} </td >
                            <td class="align-middle">
                              {{$item->source}}
                              </div>
                            </td>
                            <td>
                              {{$item->category}}
                            </td>
                            <td>{{date('d M, Y', strtotime($item->created_at))}}</td>
                            <td>
                              <a href="#" data-id='{{$item->id}}' class="btn btn-warning Del viewData"><i class="
                                far fa-edit" >edit</i></a>
                            </td>
                          <td>
                            <a href="delete" dele-id='{{$item->id}}'   class="btn btn-danger comDel" ><i class="material-icons deleteModal">delete</i>
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
  @include('admin.modals.addingValues')
@endsection
@section('adminJsFile')
    <script src={{ url("public/assets/bundles/datatables/datatables.min.js")}}></script>
    <script src={{ url("public/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js")}}></script>
    <script src={{ url("public/assets/bundles/jquery-ui/jquery-ui.min.js")}}></script>
    <!-- Page Specific JS File -->
    <script src={{ url("public/assets/js/page/datatables.js")}}></script>
    
    <script>
        $('.showModal').click(function(e){
                e.preventDefault()
                $('#exampleModal').modal('show')
              })
        $('.deleteModal').click(function(e){
                e.preventDefault()
                $('#basicModal').modal('show')
              })

      $('.viewData').click(function(e) {
        e.preventDefault()
        let id=$(this).attr('data-id')
        $.ajax({
                    url: "{{ url('data') }}" + '/' + id,
                    type: "GET",
                    dataType: "JSON",
                  success: function(data) {
                    $('#sourceID').val(data.source); 
                    $('#categoryID').val(data.category);
                    $('#primaryID').text(data.id);
                    
                    let act = $('#lot').attr('action')
                    $('#lot').attr('action', act + '/' + data.id)
                    $('#updationModal').modal('show');
                    window.reload();
                    
                  },
                  error : function() {
                      alert("Not Found Something is wrong");
                  }
                });
              });


      
      $('.comDel').click(function(e){
        e.preventDefault()
        let id = $(this).attr('dele-id')
        $.ajax({
                    url: "{{ url('data') }}" + '/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                    // console.log(data)
                    let dct = $('.comDel').attr('href')
                    
                    $('#delete12').attr('href', dct + '/' + data.id )
                    $('#basicModal').modal('show')
                    // window.location.reload()
                    }
        })
      })
     

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
