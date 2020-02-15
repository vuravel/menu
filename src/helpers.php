<?php 

use Illuminate\Support\Str;

if (! function_exists('menu')) {
	function menu($menu_class_name)
	{
		$menu = ucfirst(Str::camel($menu_class_name));
		if(class_exists($menuClass = 'App\\Menus\\'.$menu)){
			return new $menuClass();
		}elseif(class_exists($menuClass = 'Vuravel\\Partials\\Menus\\'.$menu)){
			return new $menuClass();
		}
	}
}