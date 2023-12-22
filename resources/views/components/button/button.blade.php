@props(['variant' => "primary", "type" => "button", 'href' => ''])

@php
$variantButton = "";

switch ($variant) {
case 'primary':
$variantButton = "border-2 border-transparent outline-none dark:focus:border-blue-600 focus:outline-blue-600 bg-blue-600
text-gray-200";
break;
case 'success':
$variantButton = "border-2 border-transparent outline-none dark:focus:border-emerald-600 focus:outline-emerald-600 bg-emerald-600 text-gray-200";
break;
case 'pink':
$variantButton = "border-2 border-transparent outline-none dark:focus:border-pink-600 focus:outline-pink-600 bg-pink-600 text-gray-200";
break;
case 'rose':
$variantButton = "border-2 border-transparent outline-none dark:focus:border-rose-600 focus:outline-rose-600 bg-rose-600 text-gray-200";
break;
case 'rose-transparent': 
$variantButton = "border-2 border-transparent outline-none dark:focus:border-transparent focus:outline-rose-600 bg-transparent text-rose-600 dark:text-rose-400";
break;
case 'amber-transparent':
$variantButton = "border-2 border-transparent outline-none dark:focus:border-transparent focus:outline-amber-600 bg-transparent text-amber-600 dark:text-amber-400";
break;
default:
$variantButton = "border-2 border-transparent outline-none dark:focus:border-blue-600 focus:outline-blue-600 bg-blue-600
text-gray-200";
break;
}
@endphp

@if ($href != '')
<a href="{{$href}}" class="{{$variantButton . " rounded-md p-2"}}">
    {{$slot}}
</a>
@else
<button type="{{$type}}" class="{{$variantButton . " rounded-md p-2"}}">
    {{$slot}}
</button>

@endif