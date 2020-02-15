<?php

namespace Vuravel\Menu\MenuItems;

use Vuravel\Menu\MenuItem;

class Logo extends MenuItem
{
    use Traits\Clickable;

    public $menuComponent = 'Logo';

    public $imageUrl = false;

    protected function vlInitialize($label)
    {
        parent::vlInitialize($label);
    	$this->href('/');
    }

    public function imageNonStatic($public_url, $width = '70px', $height = 'auto')
    {
    	$this->imageUrl = url($public_url);
        $this->imageWidth = $width;
        $this->imageHeight = $height;
    	return $this;
    }

    public static function imageStatic($public_url, $width = '70px', $height = 'auto')
    {
        return with(new static())->imageNonStatic($public_url, $width, $height);
    }

    public static function duplicateStaticMethods()
    {
        return array_merge(parent::duplicateStaticMethods(), ['image']);
    }

    public function imageClass($class)
    {
        return $this->data([
            'imageClass' => $class
        ]);
    }

}
