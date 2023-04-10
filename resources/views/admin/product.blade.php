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
.font_size{
    font-size: 40px;
    padding-bottom: 40px;
    color: blueviolet;
}
label{
   display: inline-block;
   width: 200px;
}
.div_color
{
    color: black;
}
.div_design
{
    padding-bottom: 15px;
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
            @if (session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                
                {{session()->get('message')}}
            </div>
                
            @endif
            <div class="div_center">
                <h1 class="font_size">Add product</h1>
                <form action="{{url('/add_product')}}" method="POST"enctype="multipart/form-data">
                    @csrf
                <div class="div_design">
                    
                    <label >product_title</label>
                    <input class="div_color" type="text" name="title" placeholder="Write a title" required="">
                </div>
                <div class="div_design">

                    <label >product description</label>
                    <input class="div_color" type="text" name="description" placeholder="Write a title"required="">
                </div>

                <div class="div_design">

                    <label >product image</label>
                    <input class="div_color" type="file" name="image"required="" >
                </div>

                <div class="div_design">

                    <label >product category</label>
                    <select class="div_color" name="category"required="">
                        <option value="" selected="">add a category</option>
                        @foreach($data as $category)
                        <option class="div_color" value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="div_design">

                    <label >product quantity</label>
                    <input class="div_color" type="number" min="0" name="quantity" placeholder="Write a title"required="">
                </div>

                <div class="div_design">

                    <label >product price</label>
                    <input class="div_color" type="number" name="price" placeholder="Write a title"required="">
                </div>

                <div class="div_design">

                    <label >discount_price</label>
                    <input class="div_color" type="number" name="discount_price" placeholder="Write a title">
                </div>
                <div class="div_design">

                    <label >submit</label>
                    <input class="btn btn-primary" type="submit" value="add product">
                </div>


            </form>
            </div>
           
        </div>
        </div>
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
  @include('admin.script')
  </body>
</html>