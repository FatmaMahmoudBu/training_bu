		<tr>
			<th>
			{{ trans( "faculty.faculty") }}
			</th>
			<td>
				@php $faculty = App\Application\Model\Faculty::find($item->faculty_id);  @endphp
				{{ is_json($faculty->name) ? getDefaultValueKey($faculty->name) :  $faculty->name}}
			</td>
		</tr>
