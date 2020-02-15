<div class="vl-nav-html {{ $component->class() }}"
	@include('vuravel-menu::partials.IdStyle')>

	@include('vuravel-menu::menus.components', [ 'components' => $component->components ])
	
</div>