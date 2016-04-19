<?php
namespace Burzum\SerializeTypes\Database\Type;

use Cake\Database\Driver;
use Cake\Database\Type;
use PDO;

class SerializeType extends Type
{

    public function toPHP($value, Driver $driver)
    {
        if ($value === null) {
            return null;
        }
        return unserialize($value);
    }

    public function marshal($value)
    {
        if (is_array($value) || $value === null) {
            return $value;
        }
        return unserialize($value);
    }

    public function toDatabase($value, Driver $driver)
    {
        return serialize($value);
    }

    public function toStatement($value, Driver $driver)
    {
        if ($value === null) {
            return PDO::PARAM_NULL;
        }
        return PDO::PARAM_STR;
    }

}
