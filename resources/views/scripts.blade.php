<!-- Scripts -->
@if(isset($VlScripts))
	
	<?php $VlScripts = is_array($VlScripts) ? $VlScripts : [$VlScripts]; ?>
	@foreach($VlScripts as $k => $script)
		<script id="vl-js-{{ $k + 1 }}" src="{{ $style }}"></script>
	@endforeach

@else
	
	@if(file_exists(public_path('js/manifest.js')))
	
		<script src="{{ mix('js/manifest.js') }}"></script>
		
		@if(file_exists(public_path('js/vendor.js')))
			<script src="{{ mix('js/vendor.js') }}"></script>
		@endif

		@if(file_exists(public_path('js/app.js')))
			<script src="{{ mix('js/app.js') }}"></script>
		@endif

	@endif

@endif



@include('vuravel-menu::layout-scripts')
@include('vuravel-menu::keep-session-active-script')

@stack('scripts')