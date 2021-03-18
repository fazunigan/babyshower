<?php

namespace App\Http\Controllers;

use App\Models\Babyshower;
use App\Models\BabyshowerProduct;
use App\Models\Product;

class BabyOperationsController extends Controller
{
    //This method is used to edit the babyshower products and information
    public function edit($id)
    {
        $baby = Babyshower::where('linkEdit', $id)->first();
        //If the babyshower doesn't exist, go back to home
        if ($baby == null) {
            return redirect(route('/'));
        }
        $products = Product::all();

        return view('invite.edit', compact('products', 'baby'));
    }

    //This method shows the babyshower information to the visitors who came by the share link
    public function share($id)
    {
        $baby = Babyshower::where('linkShare', $id)->with('products')->first();
        //If the babyshower doesn't exist, go back to home
        if ($baby == null) {
            return redirect(route('/'));
        }

        return view('invite.share', compact('baby'));
    }

    //This method is used to add a product to the babyshower wish list
    public function add($product, $babyshower)
    {
        $baby = Babyshower::where('linkEdit', $babyshower)->first();
        //This if-else block checks if certainly the event exist. If not, ir redirects the user to the homepage
        if ($baby != null) {
            $add = new BabyshowerProduct;
            $add->babyshower_id = $baby->id;
            $add->product_id = $product;
            $add->sold = 0;
            $add->save();

            return redirect(route('edit', $baby->linkEdit))->with('msg', '¡Producto agregado!');
        } else {
            return redirect('/');
        }

    }

    //This method is used to remove a product from the babyshower wish list
    public function remove($product, $babyshower)
    {
        $baby = Babyshower::where('linkEdit', $babyshower)->first();
        //This if-else block checks if certainly the event exist. If not, ir redirects the user to the homepage
        if ($baby != null) {
            $remove = BabyshowerProduct::where([['babyshower_id', $baby->id], ['product_id', $product]])->first();
            //If someone has bought the product, it can't be deleted.
            if($remove->sold == 0){
                $remove->delete();
                return redirect(route('edit', $baby->linkEdit))->with('msg', '¡Producto Eliminado!');
            }else{
                return redirect(route('edit', $baby->linkEdit))->with('msg', 'Este producto no se puede eliminar, por que alguien te lo regaló :)');
            }
        } else {
            return redirect('/');
        }
    }

    //This method is used to buy a gift.
    public function buy($product, $babyshower)
    {
        $baby = Babyshower::where('linkShare', $babyshower)->first();
        //This if-else block checks if certainly the event exist. If not, ir redirects the user to the homepage
        if ($baby != null) {
            $buy = BabyshowerProduct::where([['babyshower_id', $baby->id], ['product_id', $product]])->first();
            $buy -> sold = 1;
            $buy -> save();

            return redirect(route('share', $baby->linkShare))->with('msg', '¡Producto Comprado!');
        } else {
            return redirect('/');
        }
    }
}
