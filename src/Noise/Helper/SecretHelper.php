<?php namespace Noise\Helper;

use Noise\Helper\Contract\SecretHelperInterface;
use RuntimeException;
use Rhumsaa\Uuid\Uuid;

class SecretHelper implements SecretHelperInterface
{
    public function generateSecretKey()
    {
        return $this->random(64);
    }

    public function generateSharedKey($secret = null)
    {
        return $this->uuid($secret);
    }

    public function random($length = 16)
    {
        if ( ! function_exists('openssl_random_pseudo_bytes')) {
            throw new RuntimeException('OpenSSL extension is required.');
        }

        $bytes = openssl_random_pseudo_bytes($length * 2);

        if ($bytes === false) {
            throw new RuntimeException('Unable to generate random string.');
        }

        return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);
    }

    public function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }

    public function uuid($secret = null)
    {
        if (is_null($secret)) {
            $secret = $this->random(64);
        }

        return Uuid::uuid5(Uuid::NIL, $secret);
    }
}
