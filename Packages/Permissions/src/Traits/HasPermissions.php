<?php
/**
 * Created by PhpStorm.
 * User: WeSSaM
 * Date: 17/3/2022
 * Time: 1:57 م
 */

namespace Permissions\Traits;


trait HasPermissions
{

    /**
     * @return mixed
     */
    function getPermissions()
    {
        if (!$this->roles || $this->roles()->count() == 0)
            return null;

        return collect($this->roles()->first()->permissions()->pluck('name')->toArray())->join(',');
    }

    /**
     * return encrypted string of permissions array
     *
     * @return mixed
     * @author WeSSaM
     */
    function encodedPermissions()
    {
        return base64_encode($this->getPermissions());
    }

}
