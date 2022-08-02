@props(['active'])
@props(['href'])

@php
$classes = ($active ?? false)
            ? 'm-1 bg-gray-500 flex items-center px-1 py-2 text-sm font-medium leading-5 text-white rounded focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out hover:text-orange-400'
            : 'm-1 inline-flex items-center px-1 py-2 pt-1 border-b-2 border-transparent text-sm text-white font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    <a class="text-lg"{{$attributes->merge(['href' => $href])}}>{{ $slot }}</a>
</div>
