<?php

namespace App\Http\Controllers;


use Stripe;
use Session;
use Stripe\Charge;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\View\View;
//use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends Controller
{
     public function redirect()
    {
        $userType=Auth::user()->usertype;
        if($userType=='1')
        {
            $total_product=Product::all()->count();
            $total_order=Order::all()->count();
            $total_user=User::all()->count();
            $order=Order::all();
            $total_revenue=0;
            foreach ($order as $order)
            {
                $total_revenue+= $order->product_price;
            }
            $total_deliver=Order::where('delevery_status','=','delivered !')->get()->count();
            $total_prosessing=Order::where('delevery_status','=','processing')->get()->count();
            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_deliver','total_prosessing'));
        }
        else
        {
            $data=Product::paginate(5);
            $comment=Comment::orderby('id','desc')->get();
            $reply=Reply::all();
            return view('home.userpage' ,compact('data','comment','reply'));
        }
    }
    public function index()
    {
        $data=Product::paginate(5);
        $comment=Comment::orderby('id','desc')->get();
        $reply=Reply::all();
        return view('home.userpage' ,compact('data','comment','reply'));
    }
    public function product_details($id)
    {
        $data=Product::find($id);
        return view('home.product_details' ,compact('data'));
    }
    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
           $user=Auth::user();
           $user_id=$user->id;
           $product=Product::find($id);
           $product_exist_id=Cart::where('product_id','=',$id)->where('user_id','=',$user_id)->get('id')->first();
           
           if($product_exist_id)
           {

                $cart=Cart::find($product_exist_id)->first();

                
                $quantity=$cart->quantity;

                $quantity+= $request->quantity;
                $cart->quantity=$quantity;
                $cart->product_price= $cart->product_price *$quantity;
                $cart->save();
                return redirect()->back();
           }
           else
           {
           $cart= new Cart();
           
           $cart->user_id=$user->id;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->product_title=$product->title;
            if($product->discount_price!=null)
            {
                $cart->product_price= $product->discount_price * $request->Qantity;
            }
            else
            {
                $cart->product_price=$product->price * $request->Qantity;

            }
            $cart->product_id=$product->id;
            $cart->quantity=$request->Qantity;
            $cart->image=$product->image;
            $cart->save();
            return redirect()->back();
        }

        }
        else
        {
            return redirect('login');
        }
    }
    public function show_cart()
    {
        if(Auth::id())
        {
        $id=Auth()->user()->id;
        $cart=Cart::where('user_id','=',$id)->get();
        return view('home.show_cart',compact('cart'));
        }
        else{
            return redirect('login');
        }
    }
    public function show_order()
    {
        if(Auth::id())
        {
        $id=Auth()->user()->id;
        $order=Order::where('user_id','=',$id)->get();
        return view('home.order',compact('order'));
        }
        else{
            return redirect('login');
        }
    }
    public function remove_cart($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back();


    }
    public function cash_order()
    {
        $userid=Auth()->user()->id;
        $data=Cart::where('user_id','=',$userid)->get();
        foreach($data as $data)
        {
            $order= new Order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->quantity=$data->quantity;
            $order->product_price=$data->product_price;
            $order->image=$data->image;
            $order->product_id=$data->product_id;
            $order->payment_status='Cash on delivery';
            $order->delevery_status='processing';
            $order->save();
            $cardid=$data->id;
            $cart=Cart::find($cardid);
            $cart->delete();
        }
        return redirect()->back()->with('message','we have received your order');
       
    }

    public function cancel_order($id)
    {
        $order=Order::find($id);
        $order->delevery_status='Canceled !';
        $order->save();
        return redirect()->back()->with('message','we have canceled your order');
    }
    
    public function add_comment(Request $request)
    {
        if(Auth::id())
        {
        $id=Auth()->user()->id;
        $comment= new Comment;
        $comment->name=Auth()->user()->name;
        $comment->user_id=Auth()->user()->id;
        $comment->comment=$request->comment;
        $comment->save();
        return redirect()->back();
        }
        else{
            return redirect('login');
        }
        

    }
    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
        $id=Auth()->user()->id;
        $reply= new Reply;
        $reply->name=Auth()->user()->name;
        $reply->user_id=Auth()->user()->id;
        $reply->comment_id=$request->commentid;
        $reply->reply=$request->reply;
        $reply->save();
        return redirect()->back();
        }
        else{
            return redirect('login');
        }
        

    }
    public function product_search(Request $request)
    {
        $search_text=$request->search;
        
        $data=Product::where('title','LIKE',"%$search_text%")->
        orwhere('category','LIKE',"%$search_text%")->
        orwhere('description','LIKE',"%$search_text%")->
        paginate(10);
        $comment=Comment::orderby('id','desc')->get();
            $reply=Reply::all();
        return view('home.userpage',compact('data','comment','reply'));
    }
    public function product()
    {
        $comment=Comment::orderby('id','desc')->get();
        $reply=Reply::all();
        $data=Product::paginate(5);
        return view('home.all_product',compact('comment','reply','data'));
    }
}
