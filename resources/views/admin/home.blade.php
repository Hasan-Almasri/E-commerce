<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    
    <!-- plugins:css -->
  @include('admin.css')
  </head>
  <body>
    
    
    <div class="container-scroller">
      @include('admin.sidebar')
      @include('admin.header')
      
      <!-- partial:partials/_sidebar.html -->
    
      <!-- partial -->
      @include('admin.body')
      
      <!-- container-scroller -->
    </div>
      <!-- plugins:js -->
     
      @include('admin.script')
  </body>
</html>