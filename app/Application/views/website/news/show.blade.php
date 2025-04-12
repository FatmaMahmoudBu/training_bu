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
          <h2>{!! trans('website.sub_title_lang') !!}</h2>
          <p> {{$item->title_lang}}</p>
        </div>
    
    <div>

      <div class="row">
      <div class="col-lg-4 order-1 order-lg-2 aos-init aos-animate d-flex justify-content-center" data-aos="fade-left" data-aos-delay="100">
        <img src="{{url('files/'.$item->image)}}" alt="" class="mx-auto mb-3 float-none img-fluid float-md-left rounded img-thumbnail">
      </div>

      <div class="col-lg-8 pt-4 pt-lg-0 order-2 order-lg-1 content text-justify">
        {!!$item->textbody_lang!!}

    </div>
</div>


    </div>

   <div class="row">
    <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content text-justify">
      <br stylr="clear:both;" />
            @php 
              $gallery_id = $item->gallery_id;
              $gallery = \App\Application\Model\Gallery::find($gallery_id);
              $images = \App\Application\Model\Image::orderBy('id', 'asc')->where('gallery_id', $gallery_id)->get();
            @endphp

            
            {{-- <section id="portfolio" class="portfolio">
                <div class="container">
                    <div class="row portfolio-container">
                        
                    @if (count($images) > 0)
                        @foreach ($images as $image)

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="{{ large($image->image)}}" class="img-fluid" alt="">
                                    <a href="{{ large($image->image)}}" data-gallery="portfolioGallery" class="link-preview portfolio-lightbox" title="{{ getDefaultValueKey(nl2br($image->title)) }}"><i class="bx bx-expand"></i></a>
                                </figure>
                                <div class="portfolio-info">
                                    <p>{{ getDefaultValueKey(nl2br($image->title)) }}</p>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    @endif	
                    </div>
                </div>
            </section> --}}



            <!-- ======= portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

        <div class="section-title">
        @if ($gallery_id > 0)          
            <h2>{{ trans('gallery.gallery') }} </h2>
            <p>{{ getDefaultValueKey(nl2br($gallery['name'])) }} </p>
        </div>

            <div class="row portfolio-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
@if (count($images) > 0)
                        @foreach ($images as $image)
            <div class="col-lg-4 col-md-6 portfolio-item">
                <div class="portfolio-wrap">
                    <img src="{{ large($image->image)}}" class="img-fluid img-thumbnail" alt="">
                    <div class="portfolio-info">
                        <h4 class="pb-2"> {{ $image->title_lang}} </h4>
                        <p> {{ $image->description_lang}} </p>
                        <div class="portfolio-links pt-3">
                            <a href="{{ large($image->image)}}" data-gall="portfolioGallery" class="venobox" title="{{ getDefaultValueKey(nl2br($image->title)) }}"><i class="ri-add-line" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
                    @endif	

        </div>

      </div>
    </section><!-- End Courses Section -->



            @endif	
    </div>
   </div>

  </div>
</section>
@endsection
