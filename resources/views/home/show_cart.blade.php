<!DOCTYPE html>
<html>
   <head>
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
      <style>
         .center{
            margin: auto;
            width: 70%;
            padding: 30px;
         }
         table,th,td{
            border: 2px solid gray;
         }
         .th_deg
         {
            font-size: 30px;
            padding: 5px;
            background: skyblue;
         }
         .img_des{
            height: 200px;
            width: 200px;;
         }
         .total_deg{
            font-size: 20px;
            padding: 40px;
         }
      </style>
       @if (session()->has('message'))
       <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
           
           {{session()->get('message')}}
       </div>
       @endif
   </head>
   <body>
      @include('home.header')
      @if (Session::has('success'))
      <div class="alert alert-success text-center">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          <p>{{ Session::get('success') }}</p>
      </div>
  @endif
      
      <div class="center">
        <table>
            <tr>
                <th class="th_deg">product title</th>
                <th class="th_deg">product quantity</th>
                <th class="th_deg">price</th>
                <th class="th_deg">image</th>
                <th class="th_deg" >action</th>
                
                

            </tr>
            <tr>
               <?php
                  $total=0;
                  ?>
               @foreach ($cart as $cart)
                   
              
                <th>{{$cart->product_title}}</th>
                <th>{{$cart->quantity}}</th>
                <th>{{$cart->product_price}}</th>
                <th><img class="img_des" src="/product/{{$cart->image}}" alt=""></th>
                <th><a class="btn btn-danger" onclick="return confirm('are you sure?')" href="/remove_cart/{{$cart->id}}">remove product</a></th>
               </tr>
               <?php
                  $total+=($cart->product_price);
                  ?>
               @endforeach

        </table>
        <div>
         <h1 class="total_deg" > total price : <b>{{$total}} $</b></h1>
        </div>
        <div>
         <h1 style="font-size: 25px; padding-bottom:15px">Proceed to order</h1>
         <a class="btn btn-danger" href="/cash_order">Cash on delevery</a>
         <a class="btn btn-danger" href="{{url('stripe',$total)}}">Pay using Cart</a>
        </div>
       
      </div>
      
     
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