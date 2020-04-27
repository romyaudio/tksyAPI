<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = DB::table('categories')->where('iduser', $request['iduser'])->get();
        return response()->json($categories, 200);

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
        $category = Category::where([['name', $request['name']], ['iduser', $request['iduser']]])->first();

        if ($category == []) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:20',
            ])->validate();

            $category = Category::create([
                'name'   => $request['name'],
                'iduser' => $request['iduser'],
            ]);

            return response()->json($category, 201);
        } else {
            return response()->json(['errors' => ['name' => 'The name has already been taken.']], 422);

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $data)
    {
        $category = Category::find($data['id']);
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data)
    {
        $category         = Category::find($data['idCatg']);
        $category->name   = $data['name'];
        $category->iduser = $data['iduser'];
        $category->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $data)
    {
        $category = Category::find($data['id']);
        $category->delete();
        return response()->json([], 200);
    }
}
