<?php

namespace App\Http\Controllers;

use App\Http\Requests\BabyshowerCreateRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Babyshower;

class BabyshowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('babyshower.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $new =  Babyshower::create($request->all());
            $new -> linkShare = Str::uuid()->toString();
            $new -> linkEdit = Str::uuid()->toString();
            $new ->save();

            $linkShare = $new -> linkShare;
            $linkEdit = $new -> linkEdit;

            $links = compact('linkShare', 'linkEdit');
            return view('babyshower.links')->with($links);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
