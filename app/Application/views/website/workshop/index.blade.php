@extends(layoutExtend('website'))

@section('title')
     {{ trans('workshop.workshop') }} {{ trans('home.control') }}
@endsection

@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2> {{ trans('workshop.workshop_course') }} </h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Popular Courses Section  <div class="row"> ======= -->
    <section id="popular-courses" class="about">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <p>{{ trans('workshop.workshop') }}</p>
            </div>

            <div class="container " data-aos="zoom-in" data-aos-delay="100">
                <div class="row">

                    @php $sidebarworkshops = \App\Application\Model\workshop::orderBy('id', 'asc')->get(); @endphp
                    @if (count($sidebarworkshops) > 0)
                    @foreach ($sidebarworkshops as $d)
                    <div>
                        <ul>
                            <li>
                        <a href="{{ url('workshop/'.$d->id.'/view') }}">
                            <p> {{ $d->title_lang , 50 }}</p>
                        </a>
                        </li>
                        </ul>
                    </div>

                    @endforeach

                    @endif

                </div>

            </div>
        </div>
    </section><!-- End Popular Courses Section -->
</main><!-- End #main -->
@endsection
