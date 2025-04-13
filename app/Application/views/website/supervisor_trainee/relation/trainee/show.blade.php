		<tr>
			<th>
			{{ trans( "trainee.trainee") }}
			</th>
			<td>
				@php $trainee = App\Application\Model\Trainee::find($item->trainee_id);  @endphp
				{{ is_json($trainee->name) ? getDefaultValueKey($trainee->name) :  $trainee->name}}
			</td>
		</tr>
