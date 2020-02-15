<?php

namespace Vuravel\Menu\MenuItems;

use Vuravel\Menu\MenuItems\Dropdown;

class Locales extends Dropdown
{
    public $menuComponent = 'Dropdown';

    protected function vlInitialize($label)
    {
        parent::vlInitialize($label ?: strtoupper(session('locale')));

    	$this->submenu(
            collect(config('vuravel.locales'))->map(function($language, $locale){
				return \VlLink::form($language)->href('setLocale',['locale' => $locale]);
			})
		)->alignRight();
    }
}
