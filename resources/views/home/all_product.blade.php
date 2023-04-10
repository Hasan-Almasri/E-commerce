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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      @include('home.header')
      <div class="hero_area">
        
       
        
      
      
     

     
      
      @include('home.product')
     {{-- COMMENT AND REPLY SYSTEM START HERE  --}}
      <div style="text-align: center; padding-bottom:30px;">
         <h1 style="font-size:30px ; text-align:center ; padding-top:20px; padding-bottom:20px;">
            Comments
         </h1>
         <form method="POST" action="{{url('add_comment')}}">
            @csrf
            <textarea name="comment" style="height:150px ; width:600px " placeholder="Write Your Comment" ></textarea>
            <br>
            
            <input type="submit" class="btn btb-primary" value="comment" >
         </form>

         
      </div>

      
      <div  style=" padding-left:20%;">
         <h1 style="font-size:20px  padding-bottom:20px;">All Comments</h1>
         @foreach ($comment as $comment)
             
        
             
         <div  style="padding-bottom:20px;">
            <b>{{$comment->name}}</b>
            <p>{{$comment->comment}}</p>
            <a style="color: blue"  href="javascript::void(0);" onclick="reply(this)" data-commentid="{{$comment->id}}">replay</a>
         </div>
         @foreach($reply as $rep)
         @if($rep->comment_id==$comment->id)
         <div style="padding-left: 3%;padding-top: 10px;padding-bottom: 10px;">
            
            <b>{{$rep->name}}</b>
            <p>{{$rep->reply}}</p>
            <a style="color: blue"  href="javascript::void(0);" onclick="reply(this)" data-commentid="{{$comment->id}}">replay</a>
         </div>

         @endif
        @endforeach
         @endforeach
        
         <div style="display: none" class="reply_div">
            <form method="POST" action="{{url('add_reply')}}">
               @csrf

               <input type="text" hidden="" id="commentid" name="commentid">
               <textarea style="height: 100px; width:500px;" name="reply" placeholder="write a reply" ></textarea>
               <br>
               
               <button type="submit" class="btn btn-warning">Relpy</button>
               <a onclick="relpy_close(this)"  class="btn ">Close</a>
            </div>
         </form>
      </div>
     


     
     
     {{-- COMMENT AND REPLY SYSTEM START HERE  --}}
      
     
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <script type="text/javascript">
      function reply(caller) 
      {
         document.getElementById('commentid').value=$(caller).attr('data-commentid');
         $('.reply_div').insertAfter($(caller))
         $('.reply_div').show();
        

      }
      function relpy_close(caller) 
      {
         
         $('.reply_div').hide();
        

      }
      </script>
       <script>
         document.addEventListener("DOMContentLoaded", function(event) { 
             var scrollpos = localStorage.getItem('scrollpos');
             if (scrollpos) window.scrollTo(0, scrollpos);
         });
 
         window.onbeforeunload = function(e) {
             localStorage.setItem('scrollpos', window.scrollY);
         };
     </script>
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