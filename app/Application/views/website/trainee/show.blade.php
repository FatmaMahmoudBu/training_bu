@extends(layoutExtend('website'))
 @section('title')
    {{ trans('trainee.trainee') }} {{ trans('home.view') }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('trainee') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("trainee.name") }}</th>
     <td>{{ nl2br($item->name_lang) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("trainee.email") }}</th>
     <td>{{ nl2br($item->email) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("trainee.phone") }}</th>
     <td>{{ nl2br($item->phone) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("trainee.national_id") }}</th>
     <td>{{ nl2br($item->national_id) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("trainee.school_id") }}</th>
     <td>{{ nl2br($item->school_id) }}</td>
    </tr>
  </table>
         @include('website.trainee.buttons.delete' , ['id' => $item->id])
        @include('website.trainee.buttons.edit' , ['id' => $item->id])
</div>
@endsection
