<?php


namespace Modules\Core\Http\Resources;

class AuthResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function serializeForEdit($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_name' => $this->name,
            'email' => $this->email,
//            'role_name' => $this->role_name ? $this->role_name : '',
//            'policies' => $this->encodedPermissions() ?? [],
        ];
    }



    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function serializeForFind($request)
    {
        return $this->toArray($request);
    }

}
