<div class="vlFlex {{ $component->data('justifyClass') }} {{ $component->data('alignClass') }} 
	{{ $component->class() }}"
	@include('vuravel-menu::partials.IdStyle')>

    @include('vuravel-menu::menus.components', [ 'components' => $component->components ])

</div>