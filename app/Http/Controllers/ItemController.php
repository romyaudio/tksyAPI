<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = DB::table('items')->where('iduser', $request['iduser'])->get();
        return response()->json($items, 200);
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
    public function store(Request $request)
    {
        $item = Item::where([['name', $request['name']], ['iduser', $request['iduser']]])->first();
        if ($item == []) {

            $validator = Validator::make($request->all(), [
                'name' => ['required', 'max:40'],
            ])->validate();

            $item = Item::create([
                'name'        => $request['name'],
                'category'    => $request['category'],
                'description' => $request['description'],
                'price'       => $request['price'],
                'iduser'      => $request['iduser'],
            ]);
            return response()->json($item, 201);

        } else {
            return response()->json(['errors' => ['name' => 'The name has already been taken.']], 422);
        }

        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $item)
    {
        $item = Item::find($item['id']);
        return response()->json($item, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data)
    {

        $item              = Item::find($data['iditem']);
        $item->name        = $data['name'];
        $item->category    = $data['category'];
        $item->description = $data['description'];
        $item->price       = $data['price'];
        $item->iduser      = $data['iduser'];
        $item->save();

        return response()->json($item, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $item)
    {
        $team = Item::find($item['id']);
        $team->delete();
        return response()->json([], 200);
    }
}
