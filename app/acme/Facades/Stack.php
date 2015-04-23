<?php namespace Acme\Facades;

 use Illuminate\Support\Facades\Facade;

 class Stack extends Facade{
     protected static function getFacadeAccessor() { return 'stack'; }
}
