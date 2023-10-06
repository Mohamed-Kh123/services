<?php


namespace Modules\Customer\Http\Resources;

use Modules\Core\Http\Resources\BaseResource;

class SelectGroupResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'group_options' => $this->group_options,
            'service_id' => $this->service_id
        ];
    }
}
