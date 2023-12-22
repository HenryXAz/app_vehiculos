@props(['route' => ''])

@php
    $indexRoute = explode(".", $route);
    $subPathPattern = "/" . $indexRoute[0] . ".\w/";
    $isSubPath = preg_match($subPathPattern, Request::route()->getName());
    $classes = "block my-2 font-light text-left rounded-md w-full p-2 ";
    $classes .= (Route::is($route) || $isSubPath)
    ?
        "bg-blue-500/10 text-blue-900 dark:text-blue-200 dark:bg-blue-500/10  dark:text-blue-200"   
    :
        "dark:text-gray-200";
@endphp

<a href="{{($route !== "") ? route($route) : "#"}}"
    class="{{$classes}}"
>
    {{$slot}}
</a>