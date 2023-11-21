@props(['type' => "h2"])

@if($type == "h2")
    <h2 class="font-light text-md md:text-2xl text-gray-900 dark:text-gray-200">
        {{$slot}}
    </h2>
@endif

@if($type == "h3")
    <h3 class="font-light text-md md:text-xl text-gray-900 dark:text-gray-200">
        {{$slot}}
    </h3>
@endif