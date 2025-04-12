@extends(layoutExtend())

@section('title')
    {{ trans('slider.slider') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('slider.slider') , 'model' => 'slider' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/slider/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 		 <div class="form-group {{ $errors->has("image") ? "has-error" : "" }}" > 
			<label for="image">{{ trans("slider.image")}}</label>
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
		 <div class="form-group  {{  $errors->has("title.en")  &&  $errors->has("title.ar")  ? "has-error" : "" }}" >
			<label for="title">{{ trans("slider.title")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "title", isset($item->title) ? $item->title : old("title") , "text" , "slider") !!}
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
		 <div class="form-group  {{  $errors->has("text.en")  &&  $errors->has("text.ar")  ? "has-error" : "" }}" >
			<label for="text">{{ trans("slider.text")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "text", isset($item->text) ? $item->text : old("text") , "textarea" , "slider" ) !!}
				{{--<input type="text" name="text" class="form-control" id="text" value="{{ isset($item->text) ? $item->text : old("text") }}"  placeholder="{{ trans("slider.text")}}"> --}}
		</div>
			@if ($errors->has("text.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("text.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("text.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("text.ar") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("date") ? "has-error" : "" }}" > 
			<label for="date">{{ trans("slider.date")}}</label>
				 <input type="text" name="date" class="form-control datepicker2" id="date" value="{{ isset($item->date) ? $item->date : old("date") }}"  placeholder="{{ trans("slider.date")}}" > 
		</div>
			@if ($errors->has("date"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("date") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group  {{  $errors->has("body.en")  &&  $errors->has("body.ar")  ? "has-error" : "" }}" >
			<label for="body">{{ trans("slider.body")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "body", isset($item->body) ? $item->body : old("body") , "textarea" , "slider" ) !!}
		</div>
			@if ($errors->has("body.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("body.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("body.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("body.ar") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group  {{  $errors->has("gallery.en")  &&  $errors->has("gallery.ar")  ? "has-error" : "" }}" >
			<label for="gallery">{{ trans("slider.gallery")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "gallery", isset($item->gallery) ? $item->gallery : old("gallery") , "text" , "slider") !!}
		</div>
			@if ($errors->has("gallery.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("gallery.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("gallery.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("gallery.ar") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("video") ? "has-error" : "" }}" > 
			<label for="video">{{ trans("slider.video")}}</label>
				<input type="text" name="video" class="form-control" id="video" value="{{ isset($item->video) ? $item->video : old("video") }}"  placeholder="{{ trans("slider.video")}}">
		</div>
			@if ($errors->has("video"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("video") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group  {{  $errors->has("status.en")  &&  $errors->has("status.ar")  ? "has-error" : "" }}" >
			<label for="status">{{ trans("slider.status")}}</label>
				<input type="text" name="status" class="form-control" id="status" value="{{ isset($item->status) ? $item->status : old("status") }}"  placeholder="{{ trans("slider.status")}}">
		</div>
			@if ($errors->has("status.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("status.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("status.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("status.ar") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group  {{  $errors->has("presentation.en")  &&  $errors->has("presentation.ar")  ? "has-error" : "" }}" >
			<label for="presentation">{{ trans("slider.presentation")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "presentation", isset($item->presentation) ? $item->presentation : old("presentation") , "textarea" , "slider" ) !!}
		</div>
			@if ($errors->has("presentation.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("presentation.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("presentation.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("presentation.ar") }}</strong>
					</span>
				</div>
			@endif


            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('slider.slider') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
