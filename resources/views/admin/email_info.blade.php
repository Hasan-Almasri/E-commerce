<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
  @include('admin.css')
  <style type="text/css">
  label{
    display: inline-block;
    width: 200px;
    font-size: 15px;
    font-weight: bold;
  }

  </style>
  </head>
  <body>
   
    @include('admin.sidebar')
      <!-- partial:partials/_sidebar.html -->
      @include('admin.header')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

            <h1 style="text-align: center ; font-size:25px">Send Email to {{$data->email}}</h1>
            <form action="{{url('send_user_id',$data->id)}}" method="POST">
                @csrf
            <div style="padding-left: 35%; padding-top: 30px ">
                <label >email greeting</label>
                <input style="color: black" type="text" name="greeting" id="">


            </div>
            <div style="padding-left: 35%; padding-top: 30px ">
                <label >email body</label>
                <input style="color: black" type="text" name="firstline" id="">


            </div>

            <div style="padding-left: 35%; padding-top: 30px ">
                <label >email button name</label>
                <input style="color: black" type="text" name="bottum" id="">


            </div>
            <div style="padding-left: 35%; padding-top: 30px ">
                <label >email url</label>
                <input style="color: black" type="text" name="url" id="">


            </div>
            <div style="padding-left: 35%; padding-top: 30px ">
                <label >email last</label>
                <input style="color: black" type="text" name="lastline" id="">


            </div>
            <div style="padding-left: 35%; padding-top: 30px ">
              
                <input style="color: black" type="submit" value="send_email" class="btn btn-primary">


            </div>

            

            
            </form>

        </div>
      </div>
     
    <!-- container-scroller -->
    <!-- plugins:js -->
  @include('admin.script')
  </body>
</html>