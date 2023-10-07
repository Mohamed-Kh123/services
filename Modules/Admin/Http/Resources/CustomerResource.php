<?php


namespace Modules\Admin\Http\Resources;

use Modules\Core\Http\Resources\BaseResource;

class CustomerResource extends BaseResource
{    // 'name', 'mobile', 'password', 'email'
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
            'name' => $this->name,
            'mobile' => $this->mobile,
            'email' => $this->email,
        ];
    }
}
