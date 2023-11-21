@props(['for'])

<label 
class="text-sm md:text-lg flex flex-col mb-2 gap-2 text-gray-900 dark:text-gray-200"
for="{{$for}}">
    {{$slot}}
</label>