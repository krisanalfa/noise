<?php namespace Noise\Helper;

use Noise\Helper\Contract\ArrayHelperInterface;

class ArrayHelper implements ArrayHelperInterface
{
    public function sanitize(array $array, array $exclude = array(), $test = false)
    {
        $retval = array();

        foreach ($array as $key => $value) {
            if ($key[0] !== '$' and ! in_array($key, $exclude)) {
                if (is_array($value)) {
                    $value = $this->sanitize($value, array('password'), $test);
                }

                $retval[$key] = $value;
            }
        }

        return $retval;
    }
}
