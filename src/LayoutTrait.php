<?php 
namespace Vuravel\Menu;

trait LayoutTrait{

	protected $placement;

	protected $top = false;

	protected $out = false;
	
	public function isFixed()
	{
		return $this->placement == 'fixed';
	}

	public function isTop()
	{
		return $this->top;
	}

	public function isOut()
	{
		return $this->out;
	}

}