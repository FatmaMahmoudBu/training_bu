@extends(layoutExtend('website'))

@section('title')
    {{ trans('gallery.gallery') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('gallery') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('gallery/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group  {{  $errors->has("name.ar")  ? "has-error" : "" }}" >
			<label for="name">{{ trans("gallery.name")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "gallery") !!}
		</div>
			@if ($errors->has("name.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("name.ar") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.gallery') }}
                </button>
            </div>
        </form>
</div>
@endsection
