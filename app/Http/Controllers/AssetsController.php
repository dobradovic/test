<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assets;

class AssetsController extends Controller
{
      public function create()
    {
        return view('assets.create');
    }

    
    public function index()
    {
       $assets = Assets::latest()->paginate(20);


       $q = 0;
       $sum = 0;

       foreach($assets as $asset)

        if($asset->quantity == true){

        $q += $asset->price * $asset->quantity;

        }
        else
            
        $sum += $asset->price;

        $total = $q + $sum;

    	
    	return view('assets.index', compact('assets', $assets, 'total' ,$total));
    }




    public function store(Request $request)
    {
	    $this->validate($request,[
       'name' => 'required',
       'price' => 'required',
        ]);


        $asset = new Assets($request->all());

        $asset->name = $request->input('name');
        $asset->price = $request->input('price');
        $asset->quantity = $request->input('quantity');
      
        $asset->save();

        return redirect('/asset/index')->with(['message' => 'New asset created']);
  	}

   	public function destroy($id)
    {
        $asset = Assets::find($id);

        $asset->delete();

        return redirect('/asset/index')->with(['message' => 'Asset deleted']);

    }


    public function edit($id)
    {
         $asset = Investment::find($id);

        return view('assets.edit', compact('asset', $asset));   
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
        $asset = Assets::findOrFail($id);

        $asset->fill($request->all());

        $asset->name = $request->input('name');
        $asset->price = $request->input('price');
        $asset->quantity = $request->input('quantity');
     
        $asset->save();

        return redirect('assets/index')->with(['asset' => $asset, 'message' => 'Asset updated']);
    }
}
