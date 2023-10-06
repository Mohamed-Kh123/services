<?php


namespace Modules\Customer\Http\Resources;

use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Resources\BaseResource;
use App\Models\Admin;

class CategoryResource extends BaseResource

{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image_url' => $this->image ? image_url($this->image) : null,
        ];
    }


}
