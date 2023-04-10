<?php
      
namespace App\Http\Controllers;
       
use Stripe;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
       
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe($total): View
    {
        return view('home.stripe',compact('total'));
    }
      
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request,$total): RedirectResponse
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      
        Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." ,
            ]);
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
            $order->payment_status='Cash on Cart';
            $order->delevery_status='processing';
            $order->save();
            $cardid=$data->id;
            $cart=Cart::find($cardid);
            $cart->delete();
        }
            
                
        return back()
                ->with('success', 'Payment successful!');
    }
}