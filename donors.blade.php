@extends('layouts.css_main')

@section('body')

@include('layouts.right-menu')

@include('layouts.top-menu')



    <!-- Header -->
    <div class="header pb-6" style="direction: ltr; background:#3d4571 !important">
      <div class="container-fluid ">
        <div class="header-body">
          <div class="row align-items-center py-4" >
            <div class="col-12 float-left">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"> Donor </a></li>
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-heart"></i></a></li>
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



          <!-- Card stats -->
          <div class="row">



          
          
              <div class="col-xl-6 col-md-6">
                  <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                      <a href="{{route('students')}}">
                        <div class="row">
                        
                          <div class="col-auto d-flex align-items-center">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                            <i class="fas fa-hand-holding"></i>
                            </div>
                          </div>

                          <div class="col col-auto d-flex align-items-center">
                            <h3 class="card-title text-uppercase  mb-0  text-muted">Acceted Donors</h3>
                          </div>

                        </div>
                        <h3 class=" m-0  display-1 text-muted">{{ $accept->count()}}</h3>

                      </a>
                    </div>
                  </div>
                </div>


                <div class="col-xl-6 col-md-6">
                  <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                      <a href="{{route('students')}}">
                        <div class="row">
                       
                          <div class="col-auto d-flex align-items-center">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                            <i class="fas fa-ban"></i>
                            </div>
                          </div>
                          <div class="col col-auto d-flex align-items-center">
                            <h3 class="card-title text-uppercase  mb-0   text-muted">Rejected Donors</h3>
                          </div>
                        </div>
                        <h3 class=" m-0  display-1 text-muted">{{ $reject->count()}}</h3>


                       
                      </a>
                    </div>
                  </div>
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
                  <h6 class="text-white text-left ls-1 mb-1">Lasted Donors Activity</h6>
                </div>
              </div>
              <div class="row">
                

              <div class="table-responsive mb-5 mr-4 ml-4">
                                           
                                            <table class="table table-striped table-bordered text-left text-white" >
                                            <br>
                                             <thead >
                                                <tr class="font-weight-bold">
                                                    <td>#</td>
                                                    <td>Donor name</td>
                                                    <td> Phone </td>
                                                    <td> Address </td>
                                                    <td> Blood </td>
                                                    <td> Desease </td>
                                                    <td class="text-center"> <span class="text-success"> Accept </span> </td>
                                                    <td class="text-center"> <span class="text-danger"> Reject </span> </td>                                                  </tr>
                                             </thead>
                                              
                                             <tbody class="text-right tbody">


                                             @if (count($donors) === 0)
                                                
                                                <tr>
                                                  <td colspan="10" class="text-center font-weight-bold text-white" style="font-size:18px;">
                                                    Woops, There is no Donors right now to Accept or Reject :(
                                                  </td>
                                                </tr>
                                               
                                                @else
                                                    

                                                 @php $x=0; @endphp
                                                 @foreach ($donors as $item)
                                                 @php $x++; @endphp
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$item->phone}}</td>
                                                        <td>{{$item->address}}</td>
                                                        <td>{{$item->blood_type}}</td>
                                                        <td>{{$item->desease}}</td>
                                                       
                                                        <td class="text-center">
                                                          
                                                          <form action="{{route('status.accept', ['id' => $item->id ])}}" method="POST" enctype="multipart/form-data">
                                                                  {{@csrf_field()}}
                                                                
                                                                  <button type="submit" class="btn btn-md btn-success"> Accept </button>
                                                              </form>
  
  
                                                        </td>
  
                                                      <td class=" text-center">
                                                              
                                                              <form action="{{route('status.reject', ['id' => $item->id ])}}" method="POST" enctype="multipart/form-data">
                                                                  {{@csrf_field()}}
                                                                  <input type="text" class="form-control" id="validationDefault01" placeholder="Reason for rejection"  required name="r_comment" value="" required>
                                                                  <br>
                                                                  <button type="submit" class="btn btn-md btn-danger"> Reject </button>
                                                                  
                                                              </form>
                                                      </td>
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