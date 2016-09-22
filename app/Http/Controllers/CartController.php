<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cart;
use App\Products;
use App\User;
use Session;

class CartController extends Controller
{

 public function index(){

 	$UserID = \Auth::user()->id;
 	$user = User::where('id','=',$UserID)->firstOrFail();
 	$Cart = $user->UserCart;
 	$Grandtotal = $user->UserCart->sum('subtotal');
 	return view('cart.index',compact('Cart','Grandtotal'));

 }

 public function add(Request $request,$id){

 	$this->validate($request,[

 		'size' =>'required',
 		'quantity'=>'required|numeric',

 	]);

 	if( isset($_POST['addtocart']) ){

 		$product = Products::findOrFail($id);
 		if($request->quantity > $product['quantity']){

 			Session::flash('LowStock','Sorry,there is not enough stock to process your order');
 			return redirect("/shop/$id");

 			

 		}
		$productFound = false;
 		$UserID = \Auth::user()->id;

 		$Subtotal = $request->quantity*$product['price'];

 		$cart = Cart::where('user_id','=',$UserID)->get();

 		foreach ($cart as $cartItem) {
 			
 			if ( $cartItem['product_id'] == $id & ( $cartItem['size'] == $request->size ) )  {

 				$productFound = true ;
 			}
 		}

 				// Change the stock of the product 
		 		$product->quantity = $product['quantity'] - $request->quantity;

		 		$product->save();



 		if ( $productFound == true  ) {

 			foreach ($cart as $cartItem){

 				if ( $cartItem['product_id'] == $id & ( $cartItem['size'] == $request->size ) )  {

 					$cartItem->quantity = $cartItem['quantity'] + $request->quantity;
 					$cartItem->subtotal = $cartItem['subtotal'] + $Subtotal;
 					$cartItem->save();
 					break;
 				}


 			}
		
 		} else{
 			// if a new product being added to the cart 

		 		// Add product to the cart

		 		$Cart = new cart();
		 		$Cart->user_id = $UserID;
		 		$Cart->product_id = $id;
		 		$Cart->size = $request->size;
		 		$Cart->quantity = $request->quantity;
		 		$Cart->subtotal = $Subtotal;

		 		$Cart->save();

 		}

 		return redirect("/cart");


 		};

 }


 public function remove($id){

 	$cartItem = Cart::where('id','=',$id)->firstOrFail();
 	$product = Products::where('id','=',$cartItem['product_id'] )->firstOrFail();
 	$product->quantity = $product['quantity'] + $cartItem['quantity'];
 	$product->save();
 	$cartItem->delete();

 	Session::flash('RemoveCart','Item was succefully removed from the cart ');
 	return redirect('/cart');

 }


}
