@props(['for' => '', 'class' => ''])

<label 
class="{{$class . ' text-sm md:text-base flex flex-col mb-2 gap-2 text-gray-900 dark:text-gray-200'}}"
for="{{$for}}">
    {{$slot}}
</label>