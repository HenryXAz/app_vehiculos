@props(['variant' => "primary", "type" => "button"])

@php
    $variantButton = "";

    switch ($variant) {
        case 'primary':
            $variantButton = "border-2 border-transparent outline-none dark:focus:border-blue-600 focus:outline-blue-600 bg-blue-600 text-gray-200";
            break;
        
        default:
            $variantButton = "border-2 border-transparent outline-none dark:focus:border-blue-600 focus:outline-blue-600 bg-blue-600 text-gray-200";
            break;
    }
@endphp

<button 
    type="{{$type}}"
    class="{{$variantButton . " rounded-md p-2"}}"
>
    {{$slot}}
</button>