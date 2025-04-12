@extends(layoutExtend('website'))

@section('title')
    {{ trans('news.news') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('news') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('news/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("title") ? "has-error" : "" }}" > 
			<label for="title">{{ trans("news.title")}}</label>
				<input type="text" name="title" class="form-control" id="title" value="{{ isset($item->title) ? $item->title : old("title") }}"  placeholder="{{ trans("news.title")}}">
		</div>
			@if ($errors->has("title"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("title") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("textbody") ? "has-error" : "" }}" > 
			<label for="textbody">{{ trans("news.textbody")}}</label>
				<input type="text" name="textbody" class="form-control" id="textbody" value="{{ isset($item->textbody) ? $item->textbody : old("textbody") }}"  placeholder="{{ trans("news.textbody")}}">
		</div>
			@if ($errors->has("textbody"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("textbody") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("link") ? "has-error" : "" }}" > 
			<label for="link">{{ trans("news.link")}}</label>
				<input type="text" name="link" class="form-control" id="link" value="{{ isset($item->link) ? $item->link : old("link") }}"  placeholder="{{ trans("news.link")}}">
		</div>
			@if ($errors->has("link"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("link") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("image") ? "has-error" : "" }}" > 
			<label for="image">{{ trans("news.image")}}</label>
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
                    {{ trans('website.Update') }}  {{ trans('website.news') }}
                </button>
            </div>
        </form>
</div>
@endsection
