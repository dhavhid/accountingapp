<?php

namespace App\Transformers;

use App\Category;
use League\Fractal\TransformerAbstract as TransformerAbstract;

class CategoryTransformer extends TransformerAbstract {

    public function transform(Category $category) {
        return [
            'categoryId' => (int) $category->id,
            'categoryName' => $category->title,
            'description' => $category->description,
            'isOutput' => boolval($category->output)
        ];
    }
}
