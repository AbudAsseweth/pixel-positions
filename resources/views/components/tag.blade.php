@props(['size' => 'base'])

@php
    $classes = 'rounded-xl bg-white/10 transition-colors duration-300 hover:bg-white/20';
    $sizeClasses = [
        'small' => ' text-2xs px-3 py-1',
        'base' => ' text-sm px-5 py-1',
    ];

    $classes .= $sizeClasses[$size];
@endphp

<a href="" class="{{ $classes }}">{{ $slot }}</a>
