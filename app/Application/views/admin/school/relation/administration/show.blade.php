		<tr>
			<th>
			{{ trans( "administration.administration") }}
			</th>
			<td>
				@php $administration = App\Application\Model\Administration::find($item->administration_id);  @endphp
				{{ is_json($administration->name) ? getDefaultValueKey($administration->name) :  $administration->name}}
			</td>
		</tr>
