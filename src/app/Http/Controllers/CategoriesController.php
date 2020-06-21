<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Resources\CategoryCollection as CategoryCollection;
use App\Http\Resources\Category as CategoryResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = Category::searchPaginated($request);
        return new CategoryCollection($results);
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
        $title = $request->input('title');
        $description = $request->input('description');
        $output = $request->input('isOutput');
        $now = Carbon::now();
        $category = new Category([
            'title' => $title,
            'description' => $description,
            'output' => intval($output),
            'created_at' => $now,
            'updated_at' => $now
        ]);
        if ($category->output > 1) return Response(['error' => $this->getMessage(400)], 400);
        try {
            $category->save();
            return new CategoryResource($category);
        } catch (\Exception $e) {
            $resp = ['error' => $this->getMessage('400')];
        }
        return Response($resp, 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return new CategoryResource($category);
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
        $category = Category::findOrFail($id);
        $category->title = !is_null($request->input('title'))? $request->input('title') : $category->title;
        $category->description = !is_null($request->input('description'))? $request->input('description') : $category->description;
        $category->output = !is_null($request->input('isOutput'))? intval($request->input('isOutput')) : $category->output;

        if ($category->output > 1) return Response(['error' => $this->getMessage(400)], 400);

        try {
            $category->save();
            return (new CategoryResource($category))
                ->response()
                ->setStatusCode(202);
        } catch (\Exception $e) {
            $resp = ['error' => $this->getMessage(400)];
        }
        return Response($resp, 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $n = DB::table('transactions')->where('category_id', $id)->count();
        $resp = ['error' => $this->getMessage(400)];
        if ($n == 0) {
            try {
                $category->delete();
                return response('', 202);
            } catch (\Exception $e) {}
        }
        return response($resp, 400);
    }
}
