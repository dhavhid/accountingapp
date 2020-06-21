<?php

namespace App;

class Category extends BaseModel
{
    protected $fillable = ['title', 'description', 'output'];
    protected $table = 'categories';

    public static $sortable = ['title', 'description', 'output'];


    public static function searchPaginated($req) {

        $keyword = "%" . $req->input('_q') . "%";
        extract(Category::getSorting($req)); // [$field, $order, $page, $per_page]

        return Category::where(function($query) use($keyword) {
            $query->where('title', 'like', $keyword)
            ->orWhere('description', 'like', $keyword);
        })->orderBy($field, $order)->paginate($per_page);
    }
}
