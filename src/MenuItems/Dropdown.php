<?php

namespace Vuravel\Menu\MenuItems;

use Vuravel\Menu\MenuItem;

class Dropdown extends MenuItem
{
    use Traits\Clickable;
    use Traits\HasSubmenu;

    public $menuComponent = 'Dropdown';
}
