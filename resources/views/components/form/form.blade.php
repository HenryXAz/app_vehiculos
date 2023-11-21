@props(['method' => "POST", "action", ])

<form action="{{$action}}" method="{{$method}}">
    @csrf

    {{$slot}}
</form>