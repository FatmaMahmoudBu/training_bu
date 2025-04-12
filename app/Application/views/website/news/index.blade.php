@extends(layoutExtend('website'))

@section('title')
     {{ trans('news.news') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.news') }}</h1></div>



      @if (count($items) > 0)
        @foreach ($items as $d)


         <div class="pull-{{ getDirection() }} col-lg-12 mb-5">

           {{--<div> --}}
           <div class="col-lg-12"><h3><a href="{{ url('/news/'.$d->id) }}">{!! $d->title_lang !!}</a></h3></div>
           <div  class="col-lg-8" style="float: right">
             <p class="news_news_content dotTrailsFixed" style="text-align: justify"> {!! str_limit($d->textbody_lang , 500) !!}
                               <a href="{{ url('/news/'.$d->id) }}" class="news_link" style="color:#da5132;font-weight: 800;">{{trans( "للمزيد")}}</a>
                             </p>           </div>
           <div  class="col-lg-4" style="float: left"><img src="{{ large($d->image) }}" class="img-thumbnail" alt="{{ nl2br($d->title) }}" width="304" height="236"/></div>


         </div>

					@endforeach
				@endif

	@include(layoutPaginate() , ["items" => $items])

</div>
@endsection