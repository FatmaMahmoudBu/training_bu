@extends(layoutExtend())

@section('title')
    {{ trans('image.image') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('image.image') , 'model' => 'image' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/image/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 		 <div class="form-group  {{  $errors->has("title.ar")  ? "has-error" : "" }}" >
			<label for="title">{{ trans("image.title")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "title", isset($item->title) ? $item->title : old("title") , "text" , "image") !!}
		</div>
			@if ($errors->has("title.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("title.ar") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group  {{  $errors->has("description.ar")  ? "has-error" : "" }}" >
			<label for="description">{{ trans("image.description")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "description", isset($item->description) ? $item->description : old("description") , "textarea" , "image" ) !!}
		</div>
			@if ($errors->has("description.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("description.ar") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("image") ? "has-error" : "" }}" > 
			<label for="image">{{ trans("image.image")}}</label>
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
		 <div class="form-group {{  $errors->has("gallery_id")   ? "has-error" : "" }}">
                <div class="">
                    @php $gallery = isset($item) && $item->gallery_id != 0 ? $item->gallery_id : null @endphp
                    <label for="">{{ trans("image.gallery_id")}}</label>
                    {!! Form::select('gallery_id' , $data['galleries'] , $gallery , ['class' => 'form-control'] ) !!}
                    @if ($errors->has("gallery_id"))
                        <div class="alert alert-danger">
                        <span class='help-block'>
                            <strong>{{ $errors->first("gallery_id") }}</strong>
                        </span>
                        </div>
                    @endif
                </div>
            </div>


            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('image.image') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
