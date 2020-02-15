<?php

namespace Vuravel\Menu\MenuItems;

use Vuravel\Menu\MenuItem;

class Collapse extends MenuItem
{
    use Traits\Clickable;
    use Traits\HasSubmenu;

    public $menuComponent = 'Collapse';
}
