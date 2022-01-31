@extends('layouts.css_main')

@section('body')

@include('layouts.right-menu')

@include('layouts.top-menu')



    <!-- Header -->
    <div class="header pb-6" style="direction: ltr; background:#3d4571 !important">
      <div class="container-fluid ">
        <div class="header-body">
          <div class="row align-items-center py-4 text-left" >
            <div class="col-12 float-left">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"> Hospitals </a></li>
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-hospital-alt"></i></a></li>
                </ol>
              </nav>
            </div>
           
          </div>


          <div class="row text-left">
            <div class="col-12">
            {{-- Start of card Div  --}}

              @if (session('status'))
              <div class="alert alert-success" role="alert">
                  <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{ session('status') }}
              </div>
              @endif


              @if (Session::has('delete'))

              <div class="alert alert-danger">
                  <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{Session::get('delete')}}
              </div>  

              {{Session::forget('delete')}}
              @endif

              @if (Session::has('success'))

              <div class="alert alert-success">
                  <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{Session::get('success')}}
              </div>  

              {{Session::forget('success')}}
              @endif
            </div>   
          </div>

        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-12">
          <div class="card bg-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-white text-left ls-1 mb-1">Donated Hospitals Details : </h6>
                </div>
              </div>

              <div class="row">
              <div class="table-responsive mb-5 mr-4 ml-4">
                                           
                                            <table class="table table-striped table-bordered text-left text-white" >
                                            <br>
                                             <thead >
                                                <tr class="font-weight-bold">
                                                    <td> H_ID</td>
                                                    <td> Blood_Type </td>
                                                    <td> Units </td>
                                                    <td> Hospital_Name </td>
                                                    <td> Created_At </td>
                                                    <td> Updated_At </td>
                                                </tr>
                                             </thead>
                                              
                                             <tbody class="text-left tbody">

                                             @if (count($data) === 0)
                                                
                                                <tr>
                                                  <td colspan="10" class="text-left font-weight-bold text-white" style="font-size:18px;">
                                                    Woops, There Is No Donated Hospitals Right Now ... :(
                                                  </td>
                                                </tr>
                                               
                                                @else
                                                    

                                                 @php $x=0; @endphp
                                                 @foreach ($data as $item)
                                                 @php $x++; @endphp
                                                    <tr>
                                                        
                                                        <td>{{$x}}</td>
                                                        <td>{{$item->blood_type}}</td>
                                                        <td>{{$item->units}}</td>
                                                        <td>{{$item->h_name}}</td>
                                                        <td>{{$item->created_at}}</td>
                                                        <td>{{$item->updated_at}}</td>
                                                       
                                                       
                                                    </tr>
                                                 @endforeach

                                                @endif
                                                 
                                             </tbody>
                                      
                                            </table>
                                           </div>




              </div>
              </div>
            </div>
          </div>
        </div>

   
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          
          <div class="col-lg-12">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">Boold Bank System v.0.1.1</a>
              </li>
      
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  @endsection 