@extends(layoutExtend())

@section('title')
    {{ trans('evaluation.evaluation') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('evaluation.evaluation') , 'model' => 'evaluation' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/evaluation/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 		 <div class="form-group {{ $errors->has("trainee_id") ? "has-error" : "" }}" > 
			<label for="trainee_id">{{ trans("evaluation.trainee_id")}}</label>
				<input type="text" name="trainee_id" class="form-control" id="trainee_id" value="{{ isset($item->trainee_id) ? $item->trainee_id : old("trainee_id") }}"  placeholder="{{ trans("evaluation.trainee_id")}}">
		</div>
			@if ($errors->has("trainee_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("trainee_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("supervisor_id") ? "has-error" : "" }}" > 
			<label for="supervisor_id">{{ trans("evaluation.supervisor_id")}}</label>
				<input type="text" name="supervisor_id" class="form-control" id="supervisor_id" value="{{ isset($item->supervisor_id) ? $item->supervisor_id : old("supervisor_id") }}"  placeholder="{{ trans("evaluation.supervisor_id")}}">
		</div>
			@if ($errors->has("supervisor_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("supervisor_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group  {{  $errors->has("comments.ar")  &&  $errors->has("comments.en")  ? "has-error" : "" }}" >
			<label for="comments">{{ trans("evaluation.comments")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "comments", isset($item->comments) ? $item->comments : old("comments") , "textarea" , "evaluation" ) !!}
		</div>
			@if ($errors->has("comments.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("comments.ar") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("comments.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("comments.en") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("score") ? "has-error" : "" }}" > 
			<label for="score">{{ trans("evaluation.score")}}</label>
				<input type="text" name="score" class="form-control" id="score" value="{{ isset($item->score) ? $item->score : old("score") }}"  placeholder="{{ trans("evaluation.score")}}">
		</div>
			@if ($errors->has("score"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("score") }}</strong>
					</span>
				</div>
			@endif


            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('evaluation.evaluation') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
