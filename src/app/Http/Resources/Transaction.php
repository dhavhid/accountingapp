<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
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
          'transDate' => (new Carbon($this->transdate))->toIso8601String(),
          'amount' => floatval($this->amount),
          'description' => $this->description,
          'iomethodId' => $this->iomethod_id,
          'categoryId' => $this->category_id,
          'updatedAt' => (new Carbon($this->updated_at))->toIso8601String()
        ];
    }
}
