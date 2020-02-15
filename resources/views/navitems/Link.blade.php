@if($component->hasTriggers())

	<vl-link class="vl-nav-item {{ $component->class() }} {{ $component->data('active') }}"
		@include('vuravel-menu::partials.IdStyle')
		:vcomponent="{{ $component }}" >

		@include('vuravel-menu::partials.ItemContent', [
			'component' => $component
		])
			
	</vl-link>

@else

	<a class="vl-nav-item {{ $component->class() }} {{ $component->data('active') }}" 
		@include('vuravel-menu::partials.IdStyle')
		@include('vuravel-menu::partials.HrefTarget')>

		@include('vuravel-menu::partials.ItemContent', [
			'component' => $component
		])
			
	</a>

@endif