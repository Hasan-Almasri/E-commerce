  <!-- product section -->

  <section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
          <br> <br>
          <div>
            <form method="GET" action="{{url('product_search')}}">
               @csrf
               <input type="text" style="width: 600px" placeholder="search" name="search" >
               <input type="submit" value="search">
            </form>
          </div>
       </div>
       <div class="row">
         @foreach ($data as $product)
             
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{url('product_details', $product->id)}}" class="option1">
                         Product details
                      </a>
                        <form action="/add_cart/{{$product->id}}" method="POST">
                           @csrf
                           <div class="row">
                              <div class="col-md-4">
                                 
                                 <input type="number"name="quantity" value="{{$product->quantity}}" min="1" style="width: 100px;">
                              </div>
                              <div class="col-md-4">
                                 <input type="submit"value="Add to card">

                              </div>
                        </div>
                        </form>
                   </div>
                </div>
                <div class="img-box">
                   <img src="/product/{{$product->image}}" alt="">
                  </div>
                <div class="detail-box">
                   <h5>
                        {{ $product->title}}
                   
                   </h5>
                   @if($product->discount_price!=null)

                   <h6>
                     ${{$product->discount_price}}
                   </h6>
                   <h6 style="text-decoration:line-through ; color:red;">
                     ${{$product->price}}
                   </h6>
                   @else
                   <h5>
                      ${{$product->price}}
                     </h5>
                     @endif
                </div>
             </div>
            </div>
            @endforeach
            <span style="padding-top: 20px;">
               
               {!!$data->appends(Request::all())->links('pagination::bootstrap-5')!!}
            </span>
            
      
    </div>
 </section>
 <!-- end product section -->
