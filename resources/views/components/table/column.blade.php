@props(['class' => '', 'type' => 'tbody'])

@if ($type == 'tbody')
    <td class="{{$class . " p-2 dark:text-gray-200"}}">
        {{$slot}}
    </td>
@endif

@if ($type == 'thead')
    <th class="{{$class . " p-2 bg-light-color-2 text-gray-900 dark:bg-dark-color-1 text-left font-light dark:text-gray-200"}}">
        {{$slot}}
    </th>
@endif
