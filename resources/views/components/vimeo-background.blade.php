@props([
    'videoId',
    'fallbackImage',
])

<div {{ $attributes->class(['absolute inset-0 z-0 overflow-hidden bg-cover bg-center']) }}
    style="background-image: url('{{ asset($fallbackImage) }}');">
    <div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
        <iframe
            src="https://player.vimeo.com/video/{{ $videoId }}?background=1&autoplay=1&muted=1&loop=1&autopause=0&controls=0&title=0&byline=0&portrait=0&dnt=1"
            class="absolute top-1/2 left-1/2 block max-w-none"
            style="width: 177.78vh; height: 56.25vw; min-width: 100%; min-height: 100%; transform: translate(-50%, -50%);"
            title="Background video"
            loading="eager"
            frameborder="0"
            allow="autoplay; fullscreen; picture-in-picture"
            allowfullscreen
            referrerpolicy="strict-origin-when-cross-origin"
            tabindex="-1"
        ></iframe>
    </div>
</div>
