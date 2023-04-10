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
      <style>
        .center{
            margin: auto;
            width: 70%;
            text-align: center;
            padding: 30px;  
        }
        table,th,td{
            border: 1px solid black;
        }
        th{
            padding: 10px;
            background-color: skyblue;
            font-size: 20px;
            font-weight: bold;
        }
      </style>
   </head>
   <body>
       
          @include('home.header')
          <div class="center">
            <table>
                <tr>
                    <th>product_title</th>
                    <th>Quantity</th>
                    <th>price</th>
                    <th>payment_status</th>
                    <th>delivery_status</th>
                    <th>image</th>
                   <th>Cancel order</th>
                </tr>
                @foreach ($order as $order)
                    
                <tr>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->product_price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delevery_status}}</td>
                    <td>
                        <img height="100" width="180" src="product/{{$order->image}}" alt="">
                    </td>
                    
                    @if($order->delevery_status !="delivered !")
                    <td>
                        

                                <a class="btn btn-danger" onclick="return confirm('are you sure to cancel this order ?')" href="{{url('cancel_order',$order->id)}}"> Canel Order</a>
                            
                            
                            
                    </td>
                    @else
                    <td style="color: blue">
                        delivered !
                    </td>
                            @endif
                </tr>
                @endforeach
              </table>
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