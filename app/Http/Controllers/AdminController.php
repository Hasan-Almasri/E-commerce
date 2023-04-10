<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;


class AdminController extends Controller
{
    public function view_category()
    {
        $data=Category::all();
        return view('admin.category',compact('data'));
    }
    //add_category

    public function add_category(Request $request)
    {
        $data =new Category;
       $data->category_name=$request->category;
      
       $data->save();
       return redirect()->back()->with('message','category added successfully');
    }
    public function delete_category($id)
    {
        $data=Category::find($id);
        $data->delete();
        return redirect()->back();

    }
    //view_products
    public function view_products()
    {
       
        $data=Category::all();
        return view('admin.product',compact('data'));
    }
    public function add_product(Request $request)
    {
        $data=new Product;
        $data->title= $request->title;
        $data->description= $request->description;
        $image=$request->image;
        $imagedata=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagedata);
        $data->image= $imagedata;
        $data->category= $request->category;
        $data->quantity= $request->quantity;
        $data->price= $request->price;
        $data->discount_price= $request->discount_price;
        $data->save();
        return redirect()->back()->with('message','product added successfully');
        

    }
    public function show_product()
    {
        $data=Product::all();
        return view('admin.show_product',compact('data'));
    }

    public function delete_product($id)
    {
        $data=Product::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function update_product($id)
    {
        $data=Product::find($id);
        $category=Category::all();

        return view('admin.update_product',compact('data','category'));
    }
    public function update_product_confirm($id, Request $request)
    {
        $data=Product::find($id);
      

        $data->title=$request->title;
        $data->description=$request->description;
       
        $data->category=$request->category;
        $data->quantity=$request->quantity;
        $data->price=$request->price;
        $data->discount_price=$request->discount_price;
        $image=$request->image;
        if($image)
        {
            $imagedata=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagedata);
            $data->image=$imagedata;

        }
        
        
        $data->save();
        
        return redirect()->back();
        
       


    }
    public function order()
    {
        $order= Order::all();
        return view('admin.order',compact('order'));
    }
    public function delivered($id)
    {
        $data=Order::find($id);
        $data->delevery_status='delivered !';
        $data->payment_status='paid !';
        $data->save();
        return redirect()->back();


    }
public function print_pdf($id)
{
    $data = Order::find($id);
    
    $pdf = app('dompdf.wrapper');
    $pdf->loadView('admin.pdf', compact('data'));
    
    return $pdf->download('order_details.pdf');
}

//send_email
public function send_email($id)
{
    $data = Order::find($id);

    return View('admin.email_info', compact('data'));
    
   
}


public function send_user_id(Request $request, $id)
{
    $data = Order::find($id);
    $details=[
        'greeting'=>$request->greeting,
        'firstline'=>$request->firstline,
        'body'=>$request->body,
        'bottum'=>$request->bottum,
        'url'=>$request->url,
        'lastline'=>$request->lastline,
       


    ];
    Notification::send($data, new SendEmailNotification($details));
    return redirect()->back();
    
    
    
   
}
public function search(Request $request)
{
    $seachText=$request->search;
    $order=order::where('name','LIKE',"%$seachText%")->orWhere('phone','LIKE',"%$seachText%")->orWhere('product_title','LIKE',"%$seachText%")->get();
    return view('admin.order',compact('order'));
}

}
