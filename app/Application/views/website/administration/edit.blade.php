@extends(layoutExtend('website'))

@section('title')
    {{ trans('administration.administration') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('administration') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('administration/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group  {{  $errors->has("name.ar")  &&  $errors->has("name.en")  ? "has-error" : "" }}" >
			<label for="name">{{ trans("administration.name")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "administration") !!}
		</div>
			@if ($errors->has("name.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("name.ar") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("name.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("name.en") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group  {{  $errors->has("address.ar")  &&  $errors->has("address.en")  ? "has-error" : "" }}" >
			<label for="address">{{ trans("administration.address")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "address", isset($item->address) ? $item->address : old("address") , "textarea" , "administration" ) !!}
		</div>
			@if ($errors->has("address.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("address.ar") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("address.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("address.en") }}</strong>
					</span>
				</div>
			@endif
			<div class="form-group {{ $errors->has("image") ? "has-error" : "" }}" > 
			<label for="image">{{ trans("administration.image")}}</label>
				@if(isset($item) && $item->image != "")
				<br>
				<img src="{{ small($item->image) }}" class="thumbnail" alt="" width="200">
				<br>
				@endif
				<input type="file" name="image" >
		</div>
			@if ($errors->has("image"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("image") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.administration') }}
                </button>
            </div>
        </form>
</div>
@endsection
