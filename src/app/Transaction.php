<?php

namespace App;

use Illuminate\Support\Facades\Auth;

class Transaction extends BaseModel
{
    protected $table = 'transactions';
    public static $sortable = ['transdate', 'amount', 'iomethod_id', 'category_id'];
    protected $fillable = [
        'transdate',
        'amount',
        'category_id',
        'iomethod_id',
        'description',
        'user_id'
    ];

    public static function searchPaginated($req) {

        $keyword = "%" . $req->input('_q') . "%";
        extract(Transaction::getSorting($req)); // [$field, $order, $page, $per_page]
        $user_id = Auth::id();
        $category_id = !is_null($req->input('categoryId'))? $req->input('categoryId') : 0;
        $iomethod_id = !is_null($req->input('iomethodId'))? $req->input('iomethodId') : 0;

        return Transaction::where(function($query) use($keyword, $user_id, $category_id, $iomethod_id) {
            $query->where('description', 'like', $keyword)
            ->where('user_id', $user_id)
            ->where('category_id', $category_id? '=' : '>', $category_id)
            ->where('iomethod_id', $iomethod_id? '=' : '>', $iomethod_id);
        })->orderBy($field, $order)->paginate($per_page);
    }
}
