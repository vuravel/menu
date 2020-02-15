<?php

namespace Vuravel\Menu;

use Vuravel\Elements\Element;
use Vuravel\Form\Traits\UsableInCatalogs;
use Vuravel\Form\Traits\UsableInForms;

abstract class MenuItem extends Element
{
    use UsableInForms, UsableInCatalogs;

}