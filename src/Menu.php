<?php

namespace Vuravel\Menu;

use Vuravel\Elements\Element;
use Vuravel\Menu\LayoutTrait;
use Vuravel\Core\Traits\PersistsInSession;
use Vuravel\Core\Traits\{IsRoutable, HasMetaTags};

class Menu extends Element
{
    use LayoutTrait, PersistsInSession, IsRoutable, HasMetaTags;
    
    public $components;

    /**
     * Construct a Menu object
     *
     * @return Vuravel\Form\Form
     */
    public function __construct($dontBoot = false)
    {
        if(!$dontBoot)
            $this->bootToSession();
    }

    public function components()
    {
        return [];
    }

    /**
     * Boot a Form object, an optional Eloquent Model and the form's components.
     *
     * @return Vuravel\Form\Form
     */
    public function vlBoot()
    {
        return $this->createdHook()
                    ->setBootableId()
                    ->prepareComponents()
                    ->bootedHook();
    }

    public function startReboot()
    {
        return $this->createdHook()
                    ->setBootableId();
    }

    public function finishReboot()
    {
        return $this->prepareComponents()
                    ->bootedHook();
    }

	public function prepareComponents()
    {
        $this->components = collect($this->components())->filter()->all();
        return $this;        
    }

    /**
     * Convert the model to its string representation in JSON
     * Mostly, useful when echoing in blade for example.
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this);
    }

    public static function duplicateStaticMethods()
    {
        return ['store'];
    }

}