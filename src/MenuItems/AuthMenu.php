<?php

namespace Vuravel\Menu\MenuItems;

use Vuravel\Menu\Forms\AuthLogoutForm;

class AuthMenu extends Dropdown
{
    protected function vlInitialize($label)
    {
        parent::vlInitialize($label ?: auth()->user()->name);
        
    	$this->submenu([
            new AuthLogoutForm()
        ]);
    }
}
