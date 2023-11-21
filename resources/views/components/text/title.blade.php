@props(['position' => 'left'])

@php
$positionText = "";

switch ($position) {
case 'justify':
$positionText = "text-justify";
break;
case 'center':
$positionText = "text-center";
break;
case 'right':
$positionText = "text-right";
break;
default:
$positionText = "text-left";
break;
}
@endphp


<h1 
class="{{$positionText . " bg-transparent text-gray-900 dark:text-gray-200 font-light text-lg md:text-3xl"}}">
    {{$slot}}
</h1>