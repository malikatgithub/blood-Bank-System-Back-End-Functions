<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    
    <style>
        @font-face {
            font-family: font;
            src: url("{{asset('public/fonts/Cairo-Regular.ttf')}}");
        }
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- calling some java script files -->
    <script src="{{asset('public/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/js/bootstrap-jquery.js')}}"></script>
    <script src="{{asset('public/js/proper.js')}}"></script>
    <script src="{{asset('public/js/font-awsome.js')}}"></script>
    <script src="{{asset('public/js/plugins.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/sidnav.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/font-awsome.css') }}" rel="stylesheet">

    <title>Accepted Blood Donation</title>



</head>


<body style='font-family:font; ' class="text-right mt-5 bg-white">

        @if ($operation == 'print')
            <script type="text/javascript">
                $(document).ready(function () {
                    window.print();
                    setTimeout("closePrintView()", 3000);
                });
                function closePrintView() {
                    document.location.href = "{{ url('/reports') }}";
              }
            </script>
        @else

        @endif

    <div class="pt-5 container">

        <div class="row">

            <div class="col-md-2">
                <center><img src="{{asset("public/assets/img/brand/colored.png")}}" alt="" width="150px" height="150px" class="img-reponsive"></center>
            </div>

            <div class="col-md-8">
                <h5 class="text-center text-dark font-weight-bold">Blood Donation System</h5>
                
            </div>

            <div class="col-md-2">
                <center><img src="{{asset("public/assets/img/brand/colored.png")}}" alt="" width="150px" height="150px" class="img-reponsive"></center>
            </div>

        </div>

    </div>
    <div class=" pt-3">
            <div class="alert alert-dark mt-3">
                    <center><h5 class="text-center font-weight-bold"> Report Center</h5> </center>
            </div>
            
        <ul class="m-4 text-left"> 
            <li><h6>Reports Center</h6></li>
            <li><h6>  {{ $report_type }} Donation Reports</h6></li>
            <li><h6> Date  : {{date('Y-m-d')}}</h6></li>
        </ul>


        @if (count($data)>0)
            <table class="table table-striped table-bordered" >
                <br>
                    <thead >
                    <tr class="font-weight-bold">

                    <td>Donor name</td>
                    <td> Phone </td>
                    <td> Address </td>
                    <td> Blood </td>
                    <td> Desease </td>
                       
                        
                    </thead>
                    <tbody class="">
                            
                                @php
                                    $x=0;

                                foreach ($data as $item){
                                    $x++;
                                    echo "
                                        <tr>
                                        <td>$item->name</td>
                                        <td>$item->phone</td>
                                        <td>$item->address</td>
                                        <td>$item->blood_type</td>
                                        <td>$item->desease</td>
                                        </tr>
                                    ";
                                   
                                }

                                @endphp
                                
                            
                     
                        
                    </tbody>
            </table>

            <div class="p-4">
                <h6 class=" font-weight-bold"> Report Management Center</h6>
                <h6>__________________</h6>
            </div>
        @endif
 
</div>



</body>

</html>
    