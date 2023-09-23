<?php
/**
 * Created by PhpStorm.
 * User: Nawa
 * Date: 27/3/2021
 * Time: 2:25 م
 */

namespace Modules\Core\Interfaces;


interface AttachmentInterface
{
    /**
     * @param $attachment
     * @return mixed
     * @author Nawa
     */
    public function upload($attachment);

    /**
     * @return mixed
     * @author Nawa
     */
    public function getFullPath();
}
