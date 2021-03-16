<?php

namespace App\Http\Controllers;

use App\Models\Babyshower;

class BabyOperationsController extends Controller
{
    //This method is used to edit the babyshower products and information
    public function edit($id)
    {
        return view('invite.edit');
    }

    //This method shows the babyshower information to the visitors who came by the share link
    public function share($id)
    {
        $baby = Babyshower::where('linkShare',$id)->with('products')->first();

        if($baby==null){
            return redirect(route('/'));
        }

        return view('invite.share', compact('baby'));
    }
}
