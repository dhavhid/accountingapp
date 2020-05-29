<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {

    /**
     * gets the array with the searchable fields
     *
     * @return array
     */
    public static function getSortable() {
        return static::$sortable;
    }

    public static function getSorting($req) {

        $limit = config('app.perpage')? config('app.perpage') : 10;
        $_sort = ltrim(rtrim($req->input('sort')));
        $_sdir = ltrim(rtrim($req->input('sord')));
        $_page = (is_numeric(ltrim(rtrim($req->input('page')))))? ltrim(rtrim($req->input('page'))) : 1;
        $_limit = ltrim(rtrim($req->input('per_page')));

        return [
            'field' => (strlen($_sort) > 0 && in_array($_sort, self::getSortable()))? $_sort : (self::getSortable())[0],
            'order' => (strlen($_sdir) > 0 && in_array($_sdir, ['asc', 'desc', 'ASC', 'DESC']))? $_sdir : 'ASC',
            'page' => $_page,
            'per_page' => (is_numeric($_limit))? $_limit : $limit
        ];
    }
}
