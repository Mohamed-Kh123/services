<?php


namespace Modules\Admin\Http\Resources;

use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Resources\BaseResource;
use App\Models\Admin;

class EmployeeResource extends BaseResource

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
            'mobile' => $this->mobile,
            'email' => $this->email,
            'company_name' => optional($this->company)->name,
            'company_id' => $this->company_id,
            'service_id' => $this->services ? $this->services->pluck('id')->toArray() : [],
            'commission' => $this->company_id ?  optional($this->company)->commission : $this->commission,
            'is_active' => $this->is_active,
        ];
    }


}
