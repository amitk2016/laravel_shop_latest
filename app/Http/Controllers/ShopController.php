<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Intervention\Image\ImageManager;
use App\Products;
use Session;

class ShopController extends Controller
{
    public function index(){

        $allProducts = Products::paginate(6);
    	return view('shop.index',compact('allProducts'));
    }

    public function add(){
    	return view('shop.add');
    }

    public function submit(Request $request){

    	$this->validate($request,[

    		'product_title' => 'required|min:1|max:255',
    		'product_description' => 'required|min:10',
            'amount' => 'required|numeric',
            'quantity' =>'required|numeric',
            'image' =>'required|image',


    	]);

        $newProduct = new Products();
        $newProduct->product_title = $request->product_title;
        $newProduct->product_description = $request->product_description;
        $newProduct->price = $request->amount;
        $newProduct->quantity = $request->quantity;


        $manager = new ImageManager();

        $folder="./images/products";
        $imagename = preg_replace("/[^0-9a-zA-Z]/", "", $request->product_title);

        $productImage = $manager->make($request->image);
        $productImage->fit(100,100);
        $productImage->save($folder.'/'.$imagename.'.jpg',100);

        $newProduct->image = $imagename.'.jpg';

        $newProduct->save(); 
        return redirect('/shop');
    }

    public function show($id){

      $product = Products::findOrFail($id);
        return view( 'shop.show',compact('product') );

    }

    public function delete($id){

        $product = Products::findOrFail($id);
        $productImage = $product['image'];
        unlink("./images/Products/$productImage");
        $product->delete();
        return redirect('/shop');
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('shop.edit',compact('product'));

    }

    public function update(Request $request,$id){


        $this->validate($request,[

            'product_title' => 'required|min:1|max:255',
            'product_description' => 'required|min:10',
            'price' => 'required|numeric',
            'quantity' =>'required|numeric',
            'image' =>'image',


        ]);

        $product = Products::findOrFail($id);
        $productImage = $product['image'];

        $product->product_title = $request->product_title;
        $product->product_description = $request->product_description;
        $product->price = $request->amount;
        $product->quantity = $request->quantity;

        if ($request->image) {
            
            unlink("./images/Products/$productImage");

            $manager = new ImageManager();

            $folder="./images/products";
            $imagename = preg_replace("/[^0-9a-zA-Z]/", "", $request->product_title);

            $productImage = $manager->make($request->image);
            $productImage->fit(500,null,function($constraint){
                $constraint->upsize();
            });
            $productImage->save($folder.'/'.$imagename.'.jpg',100);

            $product->image = $imagename.'.jpg';

            Session::flash('success','This product is successfully updated');
            return redirect("/shop/$product->id");
        }

    }
}








