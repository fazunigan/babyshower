<?php

namespace App\Http\Controllers;

use App\Http\Requests\BabyshowerCreateRequest;
use App\Models\Babyshower;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BabyshowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $babyshower = Babyshower::all();

        return view('babyshower.index', compact('babyshower'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BabyshowerCreateRequest $request)
    {
        try {
            //If data came valid fron BabyshowerRequest, i will
            //only create all the fields
            $new = Babyshower::create($request->all());
            $new->linkShare = Str::uuid()->toString();
            $new->linkEdit = Str::uuid()->toString();
            $new->save();

            $linkShare = $new->linkShare;
            $linkEdit = $new->linkEdit;

            $links = compact('linkShare', 'linkEdit');
            return view('babyshower.links')->with($links);

        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    
}
