@extends(layoutExtend('website'))
@push('css')
<style>
#more {display: none;}
#more2 {display: none;}
</style>
@endpush
@section('content')
   {{-- <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1> {{trans('website.Benha_University')}} <br> <span class="mr-lg-5 mr-0">  {{trans('website.siteTitle')}} </span></h1>
    </div>
  </section><!-- End Hero --> --}}

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>{{trans('website.Benha_University')}}<br></h1>
      <h2>{{trans('website.siteTitle')}}</h2>
    </div>
  </section><!-- End Hero -->  

  <!-- ======= About Section ======= -->
{{-- <section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>{{trans('website.ABOUT')}}</h2>
            <p> {{trans('website.siteTitle')}}</p>
        </div>

        <div class="row">
            <div class="col-lg-5 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                <img src="{{ url('/') }}/assets/img/about.png" class="img-fluid" alt="">
            </div>
            <div class="col-lg-7 pt-4 pt-lg-0 order-2 order-lg-1 content">
                <p class="text-justify">{{ $home_about_settings->body_setting }}</p>
            </div>
        </div>

    </div>
</section><!-- End About Section --> --}}


<section id="popular-courses" class="courses">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-title">
            <h2>{{ trans('program.credit_hours') }}</h2>
            <p>{{ trans('administration.administration') }}</p>
        </div>
        <div class="row aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
            @foreach($administration as $administration)            
            <div class="col-lg-2 col-md-4 align-items-stretch mt-4">
                <div class="course-item">{{ $administration->name_lang }}
                    {{-- <a href="{{url('faculties/programs/'.$faculty->id)}}">--}}
                                        <img src="{{ large($administration->image)}}" class="img-fluid" alt="{{ $administration->name }}" >
                                        {{-- </a>  --}}
                </div>
            </div>
            @endforeach
            <!-- End Item-->
        </div>        
    </div>
</section>


<!-- ======= Popular News Section ======= -->
<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>{{trans('website.NEWS')}}</h2>
            <p>{{trans('website.Latest_News')}}</p>

        </div>
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @php $news= App\Application\Model\News::where('flag','=','1')->orderBy('date', 'desc')->orderBy('id', 'desc')->limit(6)->get();@endphp
            @foreach($news as $new)

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                <div class="course-item">
                    <a href="{{url('news/'.$new->id)}}"><img src="{{ large($new->image)}}" class="img-fluid" style="height:220px; width:100%;" alt="..."></a>
                    <div class="course-content">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4> {{ $new->date }}
                        </div>
                        <h6><a href="{{url('news/'.$new->id)}}"> {{$new->title_lang}}</a></h6>
                    </div>
                </div>
            </div>
            <!-- End Course Item-->
            @endforeach
        </div>
        <div class="row py-3 justify-content-center more-link">
            <div class="col-lg-2 col-6 text-bold py-3 mx-2">

                <a href="{{ url("news/show_news") }}">
                    {{trans('website.More_News')}}
                    <i class="far fa-newspaper"></i>
                </a>
            </div>
        </div>
    </div>


</section><!-- End Popular Courses Section -->

    {{-- <!-- Trainers Index Section -->
    <section id="trainers-index" class="section trainers-index">

      <div class="container">

        <div class="row">
           @php  $teams = App\Application\Model\Team::where('type','=','0')->orderBy('id', 'asc')->get();@endphp
        @foreach($teams as $team)
         <div class="col-lg-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">     
            <div class="member">
              <img src="{{ large($team->image)}}" class="img-fluid" alt="">
              <div class="member-content">
                <h4>{{ $team->name_lang }}</h4>
                <span>{{ $team->position_lang }}</span>
                {{-- 
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div> --}}
               {{-- </div>
            </div>
          </div><!-- End Team Member -->

        @endforeach

        </div>

      </div>

    </section><!-- /Trainers Index Section --> --}}
    

@endsection

