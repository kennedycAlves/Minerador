<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <style>
            .switch {
              position: relative;
              display: inline-block;
              width: 60px;
              height: 34px;
            }
            
            .switch input { 
              opacity: 0;
              width: 0;
              height: 0;
            }
            
            .slider {
              position: absolute;
              cursor: pointer;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              background-color: #ccc;
              -webkit-transition: .4s;
              transition: .4s;
            }
            
            .slider:before {
              position: absolute;
              content: "";
              height: 26px;
              width: 26px;
              left: 4px;
              bottom: 4px;
              background-color: white;
              -webkit-transition: .4s;
              transition: .4s;
            }
            
            input:checked + .slider {
              background-color: #2196F3;
            }
            
            input:focus + .slider {
              box-shadow: 0 0 1px #2196F3;
            }
            
            input:checked + .slider:before {
              -webkit-transform: translateX(26px);
              -ms-transform: translateX(26px);
              transform: translateX(26px);
            }
            
            /* Rounded sliders */
            .slider.round {
              border-radius: 34px;
            }
            
            .slider.round:before {
              border-radius: 50%;
            }

            .btn-custom {
              padding: 1px 15px 3px 2px;
              border-radius: 50px;
            }

            .btn-icon{
              padding: 8px;
              background: #ffffff;
            }

            


            </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  --}}
        <title> Minerador de Licitações </title>
        <meta name="csrf-token" content="{{  csrf_token()  }}">
        {{--  <script src="{{asset('js/app.js')}}" type="text/javascript"></script>  --}}
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
       
         @yield('jstop')  
           
        
    </head>
    <body>
        <div class="container">
            @component('navbaruser', ["current" => $current])
                
            @endcomponent

            
            <main role="main">
                @hasSection ('body')
                    @yield('body')
                    @yield('js')  
                        
                @endif
            </main>
        </div>
 
    </body>
   
</html>
