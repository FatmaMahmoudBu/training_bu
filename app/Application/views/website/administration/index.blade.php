@extends(layoutExtend('website'))

@section('title')
     {{ trans('administration.administration') }} {{ trans('home.control') }}
@endsection

@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2> {{ trans('administration.credit_hours') }} </h2>
        </div>
    </div><!-- End Breadcrumbs -->


    <!-- Courses List Section -->
    <section id="popular-courses" class="courses">

      <div class="container" data-aos="fade-up">
      <div class="section-title">
            <h2>{{ trans('administration.credit_hours') }}</h2>
            <p>{{trans('administration.administration')}}</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

        @if (count($items) > 0) 
@foreach ($items as $d) 
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
            <div class="course-item">
              <img src="{{ url('/') }}/assets/img/bu_logo2.png" style="width:auto;" class="img-fluid" alt="{{ $d->title_lang }}">      
              <div class="course-content">
                        <h3><a href="/administration/{{ $d->id }}">{{ $d->name_lang }}</a></h3>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                  {{-- <h4>{{ $d->faculty->name_lang }}</h4> --}}
                  {{-- <p class="price">{{ $d->administration->fees }}</p> --}}
                </div>

                {{-- <div class="description"> {!! str_limit( strip_tags($d->about_lang) ) !!}</div>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <a href="{{ $d->instructor->link }}" class="trainer-link">
                    <img src="{{ small($d->instructor->image) }}" class="img-fluid" alt="" width="40px;">
                    {{ $d->instructor->name_lang }}</a>
                  </div>
                </div>
              </div> --}}
            </div>
          </div> <!-- End Course Item-->
          @endforeach
@endif

        </div>

      </div>

    </section><!-- /Courses List Section -->


</main><!-- End #main -->
@endsection
