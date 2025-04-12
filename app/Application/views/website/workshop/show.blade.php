@extends(layoutExtend('website'))

@push('css')
{{$item->title_lang}}
@endpush

@section('content')
<div class="breadcrumbs">
    <div class="container">
          <h2 class="my-4">{{$item->title_lang}}</h2>
        </div>
    </div>
<section id="about" class="about">
  <div class="container aos-init aos-animate" data-aos="fade-up">
      
        <div class="section-news-title">
          <h2>{!! trans('website.sub_title_workshop_lang') !!}</h2>
        </div>
    
    <div>

      <div class="row">

      <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content text-justify">
        {!!$item->description_lang!!}

    </div>
</div>


    </div>

  </div>
</section>
@endsection
