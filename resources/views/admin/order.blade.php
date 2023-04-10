<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
  @include('admin.css')
  <style type="text/css">
    .div_center{
      text-align: auto;
      padding-top: 40px;
  
      
    }
    .h2_font{
      font-size: 40px;
      padding-bottom: 40px;
          
      }
      .input_color
      {
          color: black;
      }
      .center{
          margin: auto;
          width: 70%;
          text-align: center;
          margin-top: 50px;
          border: 3px solid white;
      }
      .imgs{
      width: 20px;
      height: 30px;
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')
      @include('admin.header')
      
      <!-- partial:partials/_sidebar.html -->
    
    
      <!-- partial -->
   
     
        <!-- partial:partials/_navbar.html -->
       
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <h1 class="div_center">All Orders</h1>

            <div style="padding-left: 400px; padding-bottom: 30px ;">
              <form action="{{url('search')}}" method="GET">
                @csrf
                <input class="input_color" type="text" name="search" placeholder="search for something">
                <input type="submit" value="Search" class="btn btn-primary">

              </form>
            </div>
            <table class="center" >
                <tr>
                    <th>custumer_name</th>
                    <th>custumer_email</th>
                    <th>phone</th>
                    
                    <th>product_title</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>payment_status</th>
                    <th>delivery_status</th>
                    <th>image</th>
                    <th>delivered</th>
                    <th>print PDF</th>
                    <th>Send Email</th>

                </tr>
               
               
                @forelse($order as $order)
                <tr>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->phone}}</td>
                    
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->product_price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delevery_status}}</td>
                    <td> <img class="imgs" src="/product/{{$order->image}}" alt=""></td>
                    @if($order->delevery_status !='delivered !')
                    <td>
                      <a href="{{url('delivered',$order->id)}}" onclick="return confirm ('are you sure the product is delivered ?')" class="btn btn-primary">deliver</a>
                    </td>
                   
                    
                    
                        
                    @else
                    <td>delivered</td>
                        
                    
                    @endif

                    <td>
                      <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>
                    </td>
                    <td>
                      <a href="{{url('send_email',$order->id)}}" class="btn btn-info">sendEmail</a>
                    </td>
                </tr>
                @empty
                    
               <tr>
                <td colspan="16">NO DATA FOUND</td>
               </tr>
                @endforelse

                
            </table>
          </div>
          </div>
        </div>
      </div>
      <!-- container-scroller -->
    
      <!-- plugins:js -->
     
      @include('admin.script')
  </body>
</html>