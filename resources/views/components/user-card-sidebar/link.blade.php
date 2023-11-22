@props(['href' => '', 'type' => 'button'])

@if($href == "")
    <button
        type="{{$type}}"
        class="block border-x-gray-300 border-x dark:border-x-gray-600 w-full text-left transition-all duration-500 ease-in-out text-gray-800  dark:text-gray-200 px-1 py-3 font-light hover:bg-blue-500/10 dark:hover:bg-blue-500/25"
    >
        {{$slot}}
    </button>
@endif  

@if($href != "")
<a href="{{$href}}"
    class="block border-x-gray-300 border-x dark:border-x-gray-600  transition-all duration-500 ease-in-out text-gray-800  dark:text-gray-200 px-1 py-2 font-light  hover:bg-blue-500/10 dark:hover:bg-blue-500/25"
>
{{$slot}}
</a>
@endif