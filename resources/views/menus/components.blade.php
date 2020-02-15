@foreach($components as $component)
	@include('vuravel-menu::navitems.'.$component->menuComponent, [
		'component' => $component
	])
@endforeach