<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShopStoreRequest;
use App\Http\Requests\ShopUpdateRequest;
use Illuminate\Support\Str;
use App\Models\Shop;
class ShopController extends Controller
{
    //Save data to database
    public function store(ShopStoreRequest $request){
        $slug = Str::slug($request->url); //URL
        
        $shop = new Shop([
            'slug' => $slug,
            'url' => $request->url,
            'notes' => $request->notes,
        ]);
        $shop->save();
        return back()->with('success', 'Shop byl úspěšně vytvořen :)');
    }

    //Get data from database
    public function show(){
        $data = Shop::all();
        return view('welcome',['shops' => $data]);
    }

    //Show create form
    public function create(){
        return view('shop/create');
    }

    //Show edit form 
    public function edit($slug){
        $data = Shop::where('slug', $slug)->firstorfail();
        return view('shop/edit',['shop' => $data]);
    }

    //Update shop data by URL
    public function update(ShopUpdateRequest $request){
        
        $shop = Shop::where('id', $request->id)->firstorfail();

        $slug = Str::slug($request->url);

        $shop->slug = $slug;
        $shop->url = $request->url;
        $shop->notes = $request->notes;
        $shop->save();
    
        return redirect()->route('shopsEdit', ['slug' => $slug])->with('success', 'Shop byl úspěšně updatován :)');
    }

    //Delete/Destroy shop data
    public function destroy($slug){
        Shop::where('slug', $slug)->firstOrFail()->delete();
        return back()->with('success', 'Shop byl úspěšně odstraněn :)');
    }
}
