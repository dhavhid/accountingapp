<?php

namespace App\Http\Resources;
use Carbon\Carbon;

use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'isOutput' => boolval($this->output),
            'createdAt' => (new Carbon($this->created_at))->toISOString(),
            'updatedAt' => (new Carbon($this->updated_at))->toISOString()
        ];
    }
}
