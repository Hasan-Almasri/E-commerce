<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
  @include('admin.css')
  <style type="text/css" >
    .center{
      margin: auto;
      width: 50%;
      border: 2px solid white;
      text-align: center;
      margin-top: 40px;
    }
    .font_size{
      font-size: 40px;
      text-align: center;
      padding-top: 20px;
    }
    .color{
      background-color: skyblue;
    }
    .imgs{
      width: 200px;
      height: 150;
    }
    </style>
  </head>
  <body>
   
    <div class="container-scroller">
      @include('admin.header')
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <h2 class="font_size">all products</h2>
            <table class="center">

                <tr class="color">
                    <th>Product title</th>
                    <th>description</th>
                    <th>quantity</th>
                    <th>category</th>
                    <th>price</th>
                    <th>discount price</th>
                    <th>image</th>
                    <th>Delete</th>
                    <th>Edit</th>

                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->title}}</td>
                    <td>{{$data->description}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>{{$data->category}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->discount_price}}</td>
                    <td> <img class="imgs" src="/product/{{$data->image}}" alt=""></td>
                    <td><a class="btn btn-danger" onclick="return confirm('are you sure to delete?')" href="/delete_product/{{$data->id}}">Delete</a></td>
                    <td><a class="btn btn-success" href="/update_product/{{$data->id}}">Edit</a></td>
                </tr>
                @endforeach
            </table>
        </div>
        </div>
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
  @include('admin.script')
  </body>
</html>