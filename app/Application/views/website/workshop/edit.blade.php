@extends(layoutExtend('website'))

@section('title')
    {{ trans('workshop.workshop') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('workshop') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('workshop/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group  {{  $errors->has("title.en")  &&  $errors->has("title.ar")  ? "has-error" : "" }}" >
			<label for="title">{{ trans("workshop.title")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "title", isset($item->title) ? $item->title : old("title") , "textarea" , "workshop" ) !!}
		</div>
			@if ($errors->has("title.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("title.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("title.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("title.ar") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group  {{  $errors->has("description.en")  &&  $errors->has("description.ar")  ? "has-error" : "" }}" >
			<label for="description">{{ trans("workshop.description")}}</label>
				<input type="text" name="description" class="form-control" id="description" value="{{ isset($item->description) ? $item->description : old("description") }}"  placeholder="{{ trans("workshop.description")}}">
		</div>
			@if ($errors->has("description.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("description.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("description.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("description.ar") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.workshop') }}
                </button>
            </div>
        </form>
</div>
@endsection
