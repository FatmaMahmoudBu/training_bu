@extends(layoutExtend('website'))
  @section('title')
    {{ trans('department.department') }} {{ trans('home.view') }}
@endsection
  @section('content')
<div class="col-lg-12">
        <a href="{{ url('department') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("department.name") }}</th>
     <td>{{ nl2br($item->name_lang) }}</td>
    </tr>
  </table>
          @include('website.department.buttons.delete' , ['id' => $item->id])
        @include('website.department.buttons.edit' , ['id' => $item->id])
</div>
@endsection
