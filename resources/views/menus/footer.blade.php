@if($Footer)
<footer class="vl-footer {{ $Footer->class() }}" 
	@include('vuravel-menu::partials.IdStyle', [ 'component' => $Footer ])>

    @include('vuravel-menu::menus.components', [ 
    	'vuravelid' => $Footer->id,
    	'components' => $Footer->components 
    ])

</footer>
@endif