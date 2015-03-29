<table class="{{ $class or 'table' }}">
    @if(count($columns))
	<thead>
		<tr>
        @foreach($columns as $c)
            <th>
                @if($c->isSortable())
                    <a href="{{ $c->getSortURL() }}">
                        {{ $c->getLabel() }}
                        @if($c->isSorted())
                            @if($c->getDirection() == 'asc')
                                <span class="fa fa-sort-asc"></span>
                            @elseif($c->getDirection() == 'desc')
                                <span class="fa fa-sort-desc"></span>
                            @endif
                        @endif
                    </a>
                @else
                    {{ $c->getLabel() }}
                @endif
            </th>
        @endforeach

		</tr>
	</thead>
    @endif
	<tbody>
        @if(count($rows))
            @foreach($rows as $r)

        <tr>
            @foreach($columns as $c)
                <td>{!! $r->{'rendered_' . $c->getField()} or $r->{$c->getField()} !!}</td>
            @endforeach

        </tr>

            @endforeach
        @endif
	</tbody>
</table>

@if(class_basename(get_class($rows)) == 'LengthAwarePaginator')
    {{-- Collection is paginated, so render that --}}
    {!! $rows->render() !!}
@endif