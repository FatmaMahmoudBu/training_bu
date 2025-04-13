		<tr>
			<th>
			{{ trans( "supervisor.supervisor") }}
			</th>
			<td>
				@php $supervisor = App\Application\Model\Supervisor::find($item->supervisor_id);  @endphp
				{{ is_json($supervisor->name) ? getDefaultValueKey($supervisor->name) :  $supervisor->name}}
			</td>
		</tr>
