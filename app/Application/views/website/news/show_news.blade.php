@extends(layoutExtend('website'))

@section('title')
    اﻷخبار
@endsection

@section('content')


<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2> الأخبار </h2>
    </div>
  </div><!-- End Breadcrumbs -->


 <!-- ======= Popular Courses Section  <div class="row">
                                <div class="">
======= -->
    <section id="popular-courses" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <p>اخر الاخبار</p>
        </div>

        <div class="container " data-aos="zoom-in" data-aos-delay="100">
            
                @php $sidebarNews = \App\Application\Model\News::orderBy('date', 'desc')->orderBy('id', 'desc')->limit(6)->paginate(6); @endphp
                    @if (count($sidebarNews) > 0)
                        @foreach ($sidebarNews as $d)
                        
                            <div class="course-item d-flex align-items-stretch mb-3 p-2">
                              <div class="d-flex align-items-stretch"> 
                              <img src="{{ small($d->image)}}" class="img-fluid img_news media-object" /> </div>
                              <div class="col-md-9">
                                <div class="media-body">
                                  <h4 class="media-heading text-justify line-height"><a href="{{ url('news/'.$d->id) }}">{{ $d->title_lang , 50 }}</a></h4>
                                  <h6> <i class="bx bx-calendar"></i> {{ $d->date }}</h6>
                                  <p>{{ str_limit(strip_tags($d->body_lang) , 300) }}</p>
                                  <span><a href="{{ url('news/'.$d->id) }}">... Read more </a></span> </div>
                              </div>
                              <hr class="clear" />
                            </div>

        
                        @endforeach
                            
                    @endif	

                                    <br />                                                                                         
               <div class="pagination justify-content-center">
                                   {!! $sidebarNews->links('pagination::bootstrap-4') !!}
</div>

        </div>
      </div>
    </section><!-- End Popular Courses Section -->
</main><!-- End #main -->
@endsection
