<?php
namespace Vuravel\Menu\Forms;

use Vuravel\Form\Form;
use Vuravel\Form\Components\Link;

class AuthLogoutForm extends Form
{
	protected $submitTo = 'logout';

	protected $redirectTo = '/';

	public function components()
	{
		return [
			Link::form(__('Logout'))->submitsForm()
		];
	}

}