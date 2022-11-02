@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'nav-link active fw-bold border-bottom border-success border-2'
                : 'nav-link';
@endphp

<li class="nav-item">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>
