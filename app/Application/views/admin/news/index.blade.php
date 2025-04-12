@extends(layoutExtend())

@section('title')
     {{ trans('home.control') }} {{ trans('news.news') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection
@section('content')
    @include(layoutTable() , ['title' => trans('news.news') , 'model' => 'news' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection
