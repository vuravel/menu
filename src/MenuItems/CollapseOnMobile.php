<?php

namespace Vuravel\Menu\MenuItems;

use Vuravel\Menu\MenuItem;

class CollapseOnMobile extends MenuItem
{
    use Traits\HasSubmenu;

    public $menuComponent = 'CollapseOnMobile';

    public $leftMenu = [];

    public $rightMenu = [];

    /**
     * Allows us to include a list of components in the left side of the navbar part that collapses on mobile. For example:
     * <php>CollapseOnMobile::leftMenu(
   \VlLink::form('Link 1'),
   \VlLink::form('Link 2')
)</php>
     *
     * @param array|args $args The components list. Can be written as an array or a list of method arguments.
     * @return     self  ( description_of_the_return_value )
     */
    public function leftMenuNonStatic()
    {
        $this->leftMenu = $this->prepareMenu(func_get_args());
        return $this;
    }

    /**
     * Allows us to include a list of components in the right side of the navbar part that collapses on mobile. For example:
     * <php>CollapseOnMobile::rightMenu(
   \VlLink::form('Link 1'),
   \VlLink::form('Link 2')
)</php>
     *
     * @param array|args $args The components list. Can be written as an array or a list of method arguments.
     * @return     self  ( description_of_the_return_value )
     */
    public function rightMenuNonStatic()
    {
        $this->rightMenu = $this->prepareMenu(func_get_args());
        return $this;
    }

    public static function leftMenuStatic()
    {
        return with(new static())->leftMenu(func_get_args());
    }

    public static function rightMenuStatic()
    {
        return with(new static())->rightMenu(func_get_args());
    }

    public static function duplicateStaticMethods()
    {
        return array_merge(parent::duplicateStaticMethods(), ['leftMenu', 'rightMenu']);
    }
}
