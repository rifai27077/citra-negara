@props([
    'videoSrc',
    'fallbackImage',
    'optimizedVideoSrc' => null,
])

@php
    $resolvedVideoSrc = $videoSrc;

    if ($optimizedVideoSrc && file_exists(public_path($optimizedVideoSrc))) {
        $resolvedVideoSrc = $optimizedVideoSrc;
    }
@endphp

<div {{ $attributes->class(['absolute inset-0 z-0 overflow-hidden bg-cover bg-center']) }}
    style="background-image: url('{{ asset($fallbackImage) }}');">
    <video
        class="absolute top-1/2 left-1/2 block max-w-none"
        style="width: 177.78vh; height: 56.25vw; min-width: 100%; min-height: 100%; transform: translate(-50%, -50%);"
        autoplay
        muted
        loop
        playsinline
        preload="metadata"
        poster="{{ asset($fallbackImage) }}"
        aria-hidden="true"
    >
        <source src="{{ asset($resolvedVideoSrc) }}" type="video/mp4">
    </video>
</div>
