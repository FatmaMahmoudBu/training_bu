
<div class="container d-flex align-items-center">
    <a href="{{ url('/') }}" class="logos"><img src="{{ url('/') }}/assets/img/irsc_logo.png" alt="" style="width:auto; height:70px;"></a>
    {{-- <h1 class="logo ms-auto"><a href="{{ url('/') }}"> النزاهة والشفافية </a></h1> --}}
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                @foreach(getMenu('Website') as $admin)    
            <li @if(array_key_exists('sub' , $admin)) class="dropdown" @endif>
            	@if(array_key_exists('item' , $admin))
            			<a href="{{ array_key_exists('sub' , $admin) ? 'javascript:void(0);' : url($admin['item']['link']) }}"
            			   class="{{ array_key_exists('sub' , $admin) ? 'menu-toggle' : '' }}">
            				{{ getDefaultValueKey($admin['item']['name']) }}
            				@if(array_key_exists('sub' , $admin))
            					<span class="menu-caret">
            					  <i class="bi bi-chevron-down"></i>
            					</span>
            				@endif
            			</a>
            	@endif
            	@if(array_key_exists('sub' , $admin))
            
            		<ul>
            			@foreach($admin['sub']  as $sub)
    						<li>
    							<a href="{{ url($sub['link']) }}" class=" waves-effect waves-block">
    								{{ getDefaultValueKey($sub['name']) }}
    							</a>
    						</li>
            			@endforeach
            		</ul>
            	@endif
            
            </li>
            @endforeach
          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                @if($localeCode!=getCurrentLang())<li><a  href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">{{ $properties['native'] }}</a></li>@endif
            @endforeach
            </ul>
            <i class="ri-menu-line mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
</div>
