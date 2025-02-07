@props([
    'position' => 'right',
    'imgHeader',
    'imgCount'
])

@php
    $method = "";
    if ($position === 'right'){
        $method = 'nextButton("'. $imgHeader .'", '. $imgCount .')';
    } else {
        $method = 'previousButton("'. $imgHeader .'", '. $imgCount .')';
    }
@endphp

<button class="mx-2 my-auto h-10 inline-flex items-center px-4 py-2 tracking-widest  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" id="{{ $position }}Button" onclick="{{ $method }}">
    <img src="../assets/{{ $position }}-arrow.svg" alt="{{ $position }}">
</button>

