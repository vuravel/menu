<div class="vl-nav-html {{ $component->class() }}"
	@include('vuravel-menu::partials.IdStyle')>

	@include('vuravel-menu::partials.ItemContent', [
		'component' => $component
	])
	
</div>