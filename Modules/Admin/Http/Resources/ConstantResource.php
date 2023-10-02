<?php


namespace Modules\Admin\Http\Resources;

use Modules\Core\Http\Resources\BaseResource;

class ConstantResource extends BaseResource
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
            'name' => $this->getTranslations('name'),
            'key' => $this->key,
            'value' => get($this->value,'key'),
        ];
    }
}
