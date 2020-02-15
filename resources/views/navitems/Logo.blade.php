<a class="vl-logo vl-nav-item {{ $component->class() }}" 
	href="{{ $component->href }}"
	@include('vuravel-menu::partials.IdStyle')>

	@if($component->imageUrl)
		<img src="{{ $component->imageUrl }}" 
			style="width:{{ $component->imageWidth }};height:{{ $component->imageHeight }}" 
			class="vlInlineBlock {{$component->data('imageClass')}}" alt="">
	@endif

	@include('vuravel-menu::partials.ItemContent', [
		'component' => $component
		])

</a>