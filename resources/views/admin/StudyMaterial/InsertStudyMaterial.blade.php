@extends('admin.layouts.sideBar')
@section('adminTitle')
    Study Materials
@endsection

@section('adminStyleCss')


   <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

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
                    <div class="border card">
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
                            <div class="container  pt-2">
                            <form method="post"  action="{{route('insertionStudyMaterial')}}" enctype="multipart/form-data" >
                                        @csrf
                                        <h2>Insert Study Materials</h2>
                                            <div class="form-group ">
                                              <label class="col-sm-12 control-label ">
                                                Title
                                              </label>
                                              <div class="col-sm-12">
                                                <input required  type="text" class="heading-1-text form-control" name='title' >
                                              </div>
                                            </div>
                                            <div class="row ml-1">
                                             
                                              <div class="col-sm-6">

                                                <select class="form-control form-control-sm" name='source' id="Study_material_options">
                                                  <option>Select Source</option>
                                                  @foreach ($datas as $item)
                                                  <option class="optionsSources" data-value='{{ $item->source }}' value="{{ $item->source }}">{{ $item->source }}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                              <div class="col-sm-5 my-auto">
                                                  <select  class="form-control form-control-sm" name="category" id="second_select" disabled>
                                                  </select>
                                              </div>
                                            </div>
                                              <br>  
                                            <div class="col-sm-11 ml-3 control-label border">
                                              <label for="">upload image</label>
                                              <div class="col-sm-6 ml-2">
                                                <input  type="file" name="image" />
                                              </div>
                                            </div>
                                            <br>
                                            <div class="col-sm-11 ml-3 control-label border">
                                              <label for="">upload Other Document</label>
                                              <div class="col-sm-6 ml-2">
                                                <input  type="file" name="attachment" />
                                              </div>
                                            </div>
                                            <br>
                                            <div class="form-group clearfix ml-2">
                                                <label class="col-sm-12 control-label ">
                                                  Slide image details
                                                </label>
                                                <div class="mx-2">
                                                    <textarea name="desc"  rows="4" cols="40"></textarea>
                                                  </div>
                                              </div>
                                              
                                        <div class="col-sm-12 padd">
                                          <input type="submit" value="Save Now" class="btn btn-warning btn-lg" >
                                          </div>
                                </form>
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
    
@section('adminJsFile')
    <script>
      
         $(function () {
        setTimeout(function () {
           if ($(".alert").is(":visible")){
               $(".alert").fadeOut("fast");
                            }
                        }, 2000)

                  });

                  $('#Study_material_options').change(function() {
                    $('#second_select').html('').prop('disabled', true)
                    var selected_option = $(this).find(':selected').attr('data-value')
                    $.ajax({
                        url: "{{ url('subOptions') }}" + "/" + selected_option,
                        type: 'GET',
                        cache: false,
                        dataType: 'json',
                        success: function(result) {
                          if (result.length > 0) {
                            $.each(result, function (i, val) {
                              $('#second_select').append(`<option value="${val.id}">${val.category}</option>`)
                            })
                            $('#second_select').prop('disabled', false)
                          }
                          
                        }
                    });
                  });
    </script>
    
@endsection
