{{-- @foreach ($header->data as $element)
{{$element->title}}
@endforeach --}}

{{-- {{var_dump($header->data)}} --}}

@foreach ($header->data as $key=>$value)
	{{$value->wbmlName}}
@endforeach