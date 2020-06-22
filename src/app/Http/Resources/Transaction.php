<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Transaction extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'transDate' => (new Carbon($this->transdate))->toIsoString(),
            'amount' => floatval($this->amount),
            'description' => $this->description,
            'iomethodId' => $this->iomethod_id,
            'iomethodName' => DB::table('iomethods')->where('id', $this->iomethod_id)->value('title'),
            'categoryId' => $this->category_id,
            'categoryName' => DB::table('categories')->where('id', $this->category_id)->value('title'),
            'createdAt' => (new Carbon($this->created_at))->toIsoString(),
            'updatedAt' => (new Carbon($this->updated_at))->toIsoString()
        ];
    }
}
