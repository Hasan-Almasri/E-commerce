<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
     
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      @include('home.header')
      <div class="hero_area">
        
        
        
      
      <div class="col-sm-6 col-md-4 col-lg-4"style="margin:auto; width:50%; padding:30px;">
       
            
            <div class="img-box">
               <img src="/product/{{$data->image}}" alt="">
              </div>
            <div class="detail-box">
               <h5>
                    {{ $data->title}}
               
               </h5>
               @if($data->discount_price!=null)

               <h6>
                 ${{$data->discount_price}}
               </h6>
               <h6 style="text-decoration:line-through ; color:red;">
                 ${{$data->price}}
               </h6>
               @else
               <h5>
                  ${{$data->price}}
                 </h5>
                 @endif
                 <h6>category: </h6>
                 <h6>
                    {{$data->category}}
                </h6>
                <h6>description: </h6>
                <h6>
                    {{$data->description}}
                </h6>
                <h6>quantity: </h6>
                <h6>
                    {{$data->quantity}}
                </h6>

                <form action="/add_cart/{{$data->id}}" method="POST">
                    @csrf
                    <div class="row">
                       <div class="col-md-4">
                          
                          <input type="number"name="Qantity" value="1" min="1" style="width: 100px;">
                       </div>
                       <div class="col-md-4">
                          <input type="submit"value="Add to card">

                       </div>
                 </div>
                 </form>
            </div>
         </div>
        </div>
      
      
      @include('home.footer')
     
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>