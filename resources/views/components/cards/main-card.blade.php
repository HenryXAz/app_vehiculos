@props(['class' => ""])

<div 
class="{{$class . " w-full mx-auto my-5 bg-light-color-1 dark:bg-dark-color-2 shadow-md p-5 rounded-lg"}}"
>
    {{$slot}}
</div>