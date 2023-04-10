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
    text-align: center;
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
        width: 50%;
        text-align: center;
        margin-top: 30px;
        border: 3px solid white;
    }
  </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.header')
    @include('admin.sidebar')
      <!-- partial:partials/_sidebar.html -->
 
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
           
                
                @if (session()->has('message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    
                    {{session()->get('message')}}
                </div>
                    
                @endif
        <div class="div_center">
           <h2 class="h2_font">add category</h2>
           <form action="{{url('/add_category')}}" method="POST">
            @csrf
            <input type="text" class="input_color" name="category" placeholder="write category name">
            <input type="submit" name="submit" class="btn btn-primary" placeholder="Add category">
           </form>
            </div>
            <table class="center">
                <tr>
                    <td>category name</td>
                    <td>actions</td>
                </tr>
                @foreach ($data as $data)
                    
                <tr>
                    <td>{{$data->category_name}}</td>
                    <td><a onclick="return confirm('are you sure?')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a></td>
                </tr>
                @endforeach

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