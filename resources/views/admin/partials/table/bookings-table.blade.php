<tr>
    <td>{{ $loop->index + 1 }}</td>

    <td>
        <a href="{{ route('admin.bookings.show', $item->id) }}"><em class="icon ni ni-eye"></em></a>
    </td>
    <td>{{ $item?->region?->name }}</td>
    <td>{{ $item->reference }}</td>
    <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
    <td>{{ $item->days }}days</td>
    <td>
        @if($item?->customer)
            <a href="{{ route('admin.user.show',$item?->customer?->id) }}"> {{ $item?->customer?->name }} </a>
        @else
            {{ "not found" }}
        @endif
    </td>

{{--    <td></td>--}}
    <td>{{ $item->status }}</td>

    <td>{{ $item->payment_status }}</td>
    <td>{{ $item->payment_method }}</td>
{{--    <td></td>--}}
{{--    <td></td>--}}


</tr>
