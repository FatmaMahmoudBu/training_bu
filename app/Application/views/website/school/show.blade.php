@extends(layoutExtend('website'))
 @section('title')
    {{ trans('school.school') }} {{ trans('home.view') }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('school') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("school.name") }}</th>
     <td>{{ nl2br($item->name_lang) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("school.address") }}</th>
     <td>{{ nl2br($item->address_lang) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("school.administration_id") }}</th>
     <td>{{ nl2br($item->administration_id) }}</td>
    </tr>
  </table>
         @include('website.school.buttons.delete' , ['id' => $item->id])
        @include('website.school.buttons.edit' , ['id' => $item->id])
</div>
@endsection
