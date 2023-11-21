@props(["position" => "left"])

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

<p class="{{$positionText . " text-sm md:text-lg text-gray-900 dark:text-gray-200"}}">
    {{$slot}}
</p>