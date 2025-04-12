<li class="dd-item dd3-item" data-id="{{ $itemMenu['item']['id'] }}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content"
	@if(getDir() == 'rtl') 
		style="padding: 5px 40px 5px 10px;"
	
	@endif
	>
        <span>{{ getDefaultValueKey($itemMenu['item']['name']) }}</span>
        <a href="{{ url('admin/deleteMenuItem/'. $itemMenu['item']['id']) }}"><i class="material-icons">delete_forever</i></a>
        <a href="#" data-url="{{ url('admin/updateMenuItem/'. $itemMenu['item']['id']) }}" 
		@if(getDir() == 'rtl') 
								class="pull-left"
							@else 
								class="pull-right"
							@endif 
		data-id="{{ $itemMenu['item']['id'] }}" data-toggle="modal" data-target="#defaultModal"><i class="material-icons">mode_edit</i></a>
    </div>
        @if(array_key_exists('sub'  ,$itemMenu))
            @foreach($itemMenu['sub'] as $men)
                @if ($loop->first)
                    <ol class="dd-list">
                @endif
                    <li class="dd-item dd3-item" data-id="{{ $men['id'] }}">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content" 
						@if(getDir() == 'rtl') 
							style="padding: 5px 40px 5px 10px;"
						@endif
						>
                            <span>{{  getDefaultValueKey($men['name']) }}</span>
                            <a href="{{ url('admin/deleteMenuItem/'. $men['id']) }}"><i class="material-icons">delete_forever</i></a>
                            <a href="#" data-url="{{ url('admin/updateMenuItem/'. $men['id']) }}" data-id="{{ $men['id'] }}" 
							@if(getDir() == 'rtl') 
								class="pull-left"
							@else 
								class="pull-right"
							@endif
							data-toggle="modal" data-target="#defaultModal"><i class="material-icons">mode_edit</i></a>
                        </div>
                    </li>
                @if ($loop->last)
                    </ol>
                @endif
            @endforeach
        @endif
</li>

