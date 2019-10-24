<?php
namespace app\components;

class TestService
{
    public $property = 'default';

    public function run()
    {
        return $this->property;
    }

}