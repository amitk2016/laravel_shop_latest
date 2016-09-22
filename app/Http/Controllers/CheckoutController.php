<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class CheckoutController extends Controller
{
    public function index($id){
    	$user = User::where('id','=',$id)->firstOrFail();
    	$Cart = $user->UserCart;
    	$Grandtotal = $user->UserCart->sum('subtotal');
    	return view('checkout.index',compact('Cart','Grandtotal'));
    }
}
