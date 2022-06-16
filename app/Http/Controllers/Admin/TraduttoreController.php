<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Traduttore;
use Illuminate\Support\Str;

class TraduttoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $traduttores = Traduttore::all();
        return view("admin.traduttore.index", compact("traduttores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.traduttore.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dati_traduttore = $request->all();
        
        $new_traduttore = new Traduttore();
            $new_traduttore->fill($dati_traduttore);
            $new_traduttore->save();
            return redirect()->route("admin.traduttores.show", $new_traduttore) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $traduttore = Traduttore::findOrFail($id);
        return view("admin.traduttore.show", compact("traduttore"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Traduttore $traduttore)
    {
         return view( 'admin.traduttore.edit', compact('traduttore') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traduttore $traduttore)
    {
         $data = $request->all();
        $traduttore->update($data);
        return redirect()->route( 'admin.traduttores.show', $traduttore );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traduttore $traduttore)
    {
        $traduttore->delete();
        return redirect()->route( 'admin.traduttores.index' );
    }
}
