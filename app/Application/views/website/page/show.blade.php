@extends(layoutExtend('website'))
@section('title')
    {{ $item->title_lang }}
@endsection
@section('content')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
  <div class="container">
  <h2 class="my-4">{{ $item->title_lang }} </h2>
  </div>
</div><!-- End Breadcrumbs -->
<section>
    <div class="container">
        <div class="section-title">
          <h2>{{ $item->title_lang }}</h2>
          <p> {{ $item->title_lang }} </p>
        </div>
    
        <div class="row">
            {!! $item->body_lang !!}
        </div>
    </div>
</section>
@endsection
