<?php
namespace Vuravel\Menu\Forms;

use Vuravel\Components\Link;

class AuthLogoutForm extends \VlForm
{
    protected $redirectTo = '/';

	public function handle($request)
    {
        \Auth::guard()->logout();
        $locale = session('locale'); //for multi-lang sites
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session( ['locale' => $locale] ); //for multi-lang sites
    }

	public function components()
	{
		return [
			Link::form('Logout')->submitsForm()
		];
	}

}