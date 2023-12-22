@props(['name' => '', 'id' => '', 'class' => ''])


<select name="{{$name}}" id="{{$id}}"
    class="{{$class . ' p-2 bg-transparent border border-gray-400 dark:border-gray-500  rounded-md outline-none focus:outline-4 dark:focus:outline-blue-500 focus:outline-blue-400'}}"
>
    {{$slot}}
</select>