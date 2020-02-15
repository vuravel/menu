<?php 
    $vlCollapseOpen = $component->data('expandByDefault') || 
        ($component->data('expandIfActive') && $component->data('active') ); 
?>
<div 
    @include('vuravel-menu::partials.IdStyle') 
    class="vl-collapse vl-nav-item {{ $component->class() }} {{ $component->data('active') }}">
    
    <div class="vl-collapse-toggler {{ $vlCollapseOpen ? '' : 'vl-toggler-closed' }}" 
        onclick="toggleMenu(this)">

        <a @include('vuravel-menu::partials.HrefTarget') >

            @include('vuravel-menu::partials.ItemContent', ['component' => $component])
        
        </a>
        <div>
            <i class="icon-down"></i>
        </div>
    </div>
    
    <div class="vl-collapse-menu {{ $vlCollapseOpen ? '' : 'vl-menu-closed' }}">
        
        @include('vuravel-menu::menus.components', [ 'components' => $component->submenu ])
    
    </div>

</div>