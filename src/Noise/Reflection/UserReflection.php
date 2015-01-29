<?php namespace Noise\Reflection;

use Norm\Norm;
use ArrayHelper;

trait UserReflection
{
    private function findUser($id)
    {
        $user = Norm::factory('User')->findOne($id);

        if (is_null($user)) {
            return array();
        } else {
            return ArrayHelper::sanitize($user->jsonSerialize(), array('password'));
        }
    }
}
