<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\item;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;
        $item->category = $request->input('category');
        $item->name = $request->input('name');
        $item->quantity = $request->input('quantity');
        $item->save();

        return redirect()->back()->with('success', 'Item added successfully');
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
        $item = Item::findOrFail($id);
        return view('update_item', compact('item'));
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
        $item = Item::findOrFail($id);

        // Update the item without validation
        $item->update([
            'category' => $request->input('category'),
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity'),
            // Add other fields as needed
        ]);

        return redirect()->route('manage.stock', $id)->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $item = Item:: findOrFail($id);
            $item->delete();

            return redirect()->route('manage.stock')->with('success' , 'Item Deleted successfully');

    }
}
