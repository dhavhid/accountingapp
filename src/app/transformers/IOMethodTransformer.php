<?php

namespace App\Transformers;

use App\IOMethod;
use League\Fractal\TransformerAbstract as TransformerAbstract;

class IOMethodTransformer extends TransformerAbstract {

    public function transform(IOMethod $iomethod) {
        return [
            'iomethodId' => (int) $iomethod->id,
            'iomethodName' => $iomethod->title,
            'iomethodDescription' => $iomethod->description
        ];
    }
}
