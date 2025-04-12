@extends(layoutExtend())

@section('title')
    {{  isset($item) ? trans('home.edit')  : trans('home.add')  }} {{ trans('news.news') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('news.news') , 'model' => 'news' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/news/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has("title") ? "has-error" : "" }}" >
       			<label for="title">{{ trans("news.title")}}</label>
             {!! extractFiled(isset($item) ? $item : null,  "title" , isset($item->title) ? $item->title : old("title") , "text" , "news") !!}
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
       		</div>
           <div class="form-group {{ $errors->has("textbody") ? "has-error" : "" }}" >
       			<label for="textbody">{{ trans("news.textbody")}}</label>
             {!! extractFiled(isset($item) ? $item : null,  "textbody" , isset($item->textbody) ? $item->textbody : old("textbody") , "textarea" , "news", 'tinymce') !!}
              @if ($errors->has("textbody.en"))
                  <div class="alert alert-danger">
                         <span class='help-block'>
                             <strong>{{ $errors->first("textbody.en") }}</strong>
                          </span>
                  </div>
              @endif
              @if ($errors->has("textbody.ar"))
                  <div class="alert alert-danger">
                         <span class='help-block'>
                             <strong>{{ $errors->first("textbody.ar") }}</strong>
                         </span>
                  </div>
              @endif
       		</div>
            <div class="form-group {{ $errors->has("date") ? "has-error" : "" }}" >
       			<label for="date">{{ trans("news.date")}}</label>
       				<input type="date" name="date" class="form-control " id="date" value="{{ isset($item->date) ? $item->date : old("date") }}"  placeholder="{{ trans("news.date")}}">
       		</div>
       			@if ($errors->has("date"))
       				<div class="alert alert-danger">
       					<span class='help-block'>
       						<strong>{{ $errors->first("date") }}</strong>
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

	 <div class="form-group {{ $errors->has("author") ? "has-error" : "" }}" >
			<label for="author">{{ trans("news.author")}}</label>
      {!! extractFiled(isset($item) ? $item : null,  "author" , isset($item->author) ? $item->author : old("author") , "text" , "news") !!}
       @if ($errors->has("author.en"))
           <div class="alert alert-danger">
                  <span class='help-block'>
                      <strong>{{ $errors->first("author.en") }}</strong>
                   </span>
           </div>
       @endif
       @if ($errors->has("author.ar"))
           <div class="alert alert-danger">
                  <span class='help-block'>
                      <strong>{{ $errors->first("author.ar") }}</strong>
                  </span>
           </div>
       @endif
    </div>

    <div class="form-group {{ $errors->has("flag") ? "has-error" : "" }}" >
    <label for="flag">{{ trans("news.flag")}}</label>
    <div class="form-check">
        <label class="form-check-label">
            <input class="form-check-input m-x-xs" name="flag"
                   {{ isset($item->flag) && $item->flag  == 0 ? "checked" : "" }} type="radio"
                   value="0">
            {{ trans("page.No")}}
        </label>
        <label class="form-check-label">
            <input class="form-check-input m-x-xs" name="flag" {{ isset($item->flag) && $item->flag  == 1 ? "checked" : "" }} type="radio" value="1">
            {{ trans("page.Yes")}}
        </label>
    </div>
    </div>
    @if ($errors->has("flag"))
     <div class="alert alert-danger">
      <span class='help-block'>
       <strong>{{ $errors->first("flag") }}</strong>
      </span>
     </div>
    @endif

    {{-- <div class="form-group {{  $errors->has("gallery_id")   ? "has-error" : "" }}">
                <div class="">
                    @php $gallery = isset($item) && $item->gallery_id != '0' ? $item->gallery_id : '0' @endphp
                    <label for="{{$gallery}}">{{ trans("news.gallery_id")}}</label>
                    
                    {!! Form::select('gallery_id' , array_merge(['0' => 'اختر معرض الصور'], $data['galleries']), $gallery , ['class' => 'form-control'] ) !!}
                    @if ($errors->has("gallery_id"))
                        <div class="alert alert-danger">
                        <span class='help-block'>
                            <strong>{{ $errors->first("gallery_id") }}</strong>
                        </span>
                        </div>
                    @endif
                </div>
            </div> --}}

            <div class="form-group {{ $errors->has("gallery") ? "has-error" : "" }}">
			<label for="gallery">{{ trans( "gallery.gallery") }}</label>
			@php $galleries = App\Application\Model\Gallery::pluck("name" ,"id")->all()  @endphp
			@php  $gallery_id = isset($item) ? $item->gallery_id : null @endphp
			<select name="gallery_id"  class="form-control" >
			@foreach( $galleries as $key => $relatedItem)
			<option value="{{ $key }}"  {{ $key == $gallery_id  ? "selected" : "" }}> {{ is_json($relatedItem) ? getDefaultValueKey($relatedItem) :  $relatedItem}}</option>
			@endforeach
			</select>
			@if ($errors->has("gallery"))
				<div class="alert alert-danger">
					<span class="help-block">
						<strong>{{ $errors->first("gallery") }}</strong>
					</span>
				</div>
			@endif
			</div>


            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('news.news') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
@section('script')
   @include(layoutPath('layout.helpers.tynic'))
@endsection
