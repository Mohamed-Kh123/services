<?php


namespace Modules\Admin\Http\Resources;

use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Resources\BaseResource;
use App\Models\Admin;

class CompanyResource extends BaseResource

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
            'commission' => $this->commission ?? 0,
            'is_active' => $this->is_active,
            'has_commission' => $this->has_commission,
        ];
    }


}
