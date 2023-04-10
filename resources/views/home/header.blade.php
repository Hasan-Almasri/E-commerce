  <!-- header section strats -->
  <header class="header_section">
   
      <nav class="navbar navbar-expand-lg custom_nav-container">
         <a class="navbar-brand" href="/">
           <img width="250" src="/images/logo.png" alt="#" />
         </a>
        
       
        
           <ul class="navbar-nav mr-auto">
             <li class="nav-item">
               <a class="nav-link" href="/">Home</a>
             </li>
             <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Pages <span class="caret"></span>
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="about.html">About</a>
                 <a class="dropdown-item" href="testimonial.html">Testimonial</a>
               </div>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="{{url('products')}}">Products</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="blog_list.html">Blog</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="contact.html">Contact</a>
             </li>
             <li class="nav-item">
              <a class="nav-link" href={{ url('show_cart') }}>Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href={{ url('show_order') }}>Order</a>
            </li>
             <li class="nav-item">
             <form class="form-inline my-2 my-lg-0">
               <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                 <i class="fa fa-search" aria-hidden="true"></i>
               </button>
            </form>
          </li>
            
            @if(Route::has('login'))
            @auth
            <li >
               <x-app-layout ></x-app-layout>
            </li>
            
            @else
            <li class="nav-item">
               <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
               <a class="btn btn-success" href="{{ route('register') }}">Register</a>
            </li>
            @endauth
          @endif
            
         </ul>
          
        
          
       </nav>
       
    </div>
 </header>