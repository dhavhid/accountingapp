<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

        return Transaction::where(function($query) use($keyword) {
            $query->where('description', 'like', $keyword);
        })->orderBy($field, $order)->paginate($per_page);
    }
}
