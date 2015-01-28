<?php namespace Noise\Helper\Contract;

interface SecretHelperInterface
{
    public function generateSecretKey();
    public function generateSharedKey($secret = null);
    public function random($length = 16);
    public function quickRandom($length = 16);
    public function uuid($secret = null);
}
