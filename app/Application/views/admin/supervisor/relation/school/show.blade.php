		<tr>
			<th>
			{{ trans( "school.school") }}
			</th>
			<td>
				@php $school = App\Application\Model\School::find($item->school_id);  @endphp
				{{ is_json($school->name) ? getDefaultValueKey($school->name) :  $school->name}}
			</td>
		</tr>
