@php
function urlToArray(string $url): array
{
$urlArray = explode("/", $url);
array_shift($urlArray);
array_shift($urlArray);
array_shift($urlArray);

return $urlArray;
}

function getLinks(array $paths): array
{
$links = [];

while(count($paths) > 0) {
$lastItemIndex = count($paths) - 1;

$pathName = $paths[$lastItemIndex];
$pathRouteName = implode(".", $paths);
$links[] = [
"pathName" => $pathName,
"pathRouteName" => $pathRouteName,
];
unset($paths[$lastItemIndex]);
}

return array_reverse($links);
}

$paths = urlToArray(Request::url());
$links = getLinks($paths);
@endphp

<nav class="md:w-full mb-5">
    @for($i = 0; $i < count($links); $i++) 
    <a href="{{route($links[$i]['pathRouteName'])}}" >
        <li class="inline-block list-none font-light text-gray-800 dark:text-gray-200 text-sm md:text-lg">
            {{$links[$i]["pathName"]}}
            @if((count($links) > 1) && isset($links[$i + 1]))
            <span class="mx-2">></span>
            @endif
        </li>
    </a>
    @endfor
</nav>