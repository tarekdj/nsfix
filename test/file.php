<?php
namespace Tarekdj;

use Tarekdj\Dummy;
use Tarekdj\Fake;

$test = new \Tarekdj\DummyClass()

class MyClass extends \Tarekdj\MyDummyClass implements \Tarekdj\DummyInterface
{
    public function __construct(\Tarekdj\Fake $fake)
    {

    }
}
