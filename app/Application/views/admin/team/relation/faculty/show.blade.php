		<tr>
			<th>
			{{ trans( "faculty.faculty") }}
			</th>
			<td>
				@php $faculty = App\Application\Model\Faculty::find($item->faculty_id);  @endphp
				{{ is_json($faculty->id) ? getDefaultValueKey($faculty->id) :  $faculty->id}}
			</td>
		</tr>
