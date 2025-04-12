@extends(layoutExtend('website'))

@section('title')
    {{ trans('faculty.faculty') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="col-lg-12">
         @include(layoutMessage('website'))
         <a href="{{ url('faculty') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('faculty/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group  {{  $errors->has("name.en")  &&  $errors->has("name.ar")  ? "has-error" : "" }}" >
			<label for="name">{{ trans("faculty.name")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "faculty") !!}
		</div>
			@if ($errors->has("name.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("name.en") }}</strong>
					</span>
				</div>
			@endif
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
                    {{ trans('website.Update') }}  {{ trans('website.faculty') }}
                </button>
            </div>
        </form>
</div>
@endsection
