<?php 
namespace Vuravel\Menu\MenuItems\Traits;

use Vuravel\Elements\Traits\IsLayout;

trait HasSubmenu {

    use IsLayout;

    public $submenu = [];

    protected function prepareMenu($args)
    {
        return $this->getFilteredComponents($args)->each(function($component) { 

            $this->prepareClickableChild($component);

        });
    }

    public function prepareClickableChild($component)
    {
        if( 
            method_exists($component, 'getHash') && $component->getHash() 
            && $component->href == 'javascript:void(0)'
        )                
            $component->href($this->href) //so that turbolinnks are added
                ->addHash($component->getHash()) //to remove the need of repeating href for each child
                ->addClass('vl-has-hash');

        //if a link in the menu is active, then the parent is active (even if no href for the parent)
        if($component->data('active')) 
            $this->data(['active' => 'vlActive']);
    }

    public function submenu($args)
    {
        $this->submenu = $this->prepareMenu(func_get_args());

        return $this;
    }

    public function prependMenu($args)
    {
        $this->submenu = $this->prepareMenu(func_get_args())->concat($this->submenu);
        
        return $this;
    }

    /**
     * The dropdown menu will align to the right instead of the default left alignment.
     *
     * @return     self 
     */
    public function alignRight()
    {
        $this->data([ 'vl-dropdown-menu-right' => 'vl-dropdown-menu-right' ]);
        return $this;
    }

    /**
     * The collapsible menu will be opened on page load.
     *
     * @return     self 
     */
    public function expandByDefault()
    {
        $this->data(['expandByDefault' => true]);
        return $this;
    }

    /**
     * The collapsible menu will open if the user is on one of the pages in it's submenu.
     *
     * @return     self
     */
    public function expandIfActive()
    {
        $this->data(['expandIfActive' => true]);
        return $this;
    }

}