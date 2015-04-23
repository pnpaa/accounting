<?php namespace Acme\Facades;

 use Illuminate\Support\Facades\Facade;

 class Data extends Facade{
     protected static function getFacadeAccessor() { return 'data'; }
}
