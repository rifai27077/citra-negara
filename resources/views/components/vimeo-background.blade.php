@props([
    'embedUrl' => null,
    'fallbackImage',
])

@php
    $rawEmbedUrl = is_string($embedUrl) ? trim($embedUrl) : null;
    $iframeSrc = null;

    if ($rawEmbedUrl) {
        $normalizedEmbedUrl = preg_replace('#^https?://#i', '', $rawEmbedUrl);

        if (preg_match('/^(?:player\.)?vimeo\.com\/(?:video\/)?(\d+)/i', $normalizedEmbedUrl, $matches) || preg_match('/^\d+$/', $rawEmbedUrl, $matches)) {
            $videoId = $matches[1] ?? $matches[0];
            $iframeSrc = sprintf(
                'https://player.vimeo.com/video/%s?background=1&autoplay=1&loop=1&muted=1&autopause=0&dnt=1',
                $videoId
            );
        } elseif (preg_match('/(?:youtube\.com\/watch\?v=|youtube\.com\/embed\/|youtube\.com\/shorts\/|youtu\.be\/)([A-Za-z0-9_-]{11})/i', $rawEmbedUrl, $matches) || preg_match('/^[A-Za-z0-9_-]{11}$/', $rawEmbedUrl, $matches)) {
            $videoId = $matches[1] ?? $matches[0];
            $iframeSrc = sprintf(
                'https://www.youtube-nocookie.com/embed/%1$s?autoplay=1&mute=1&controls=0&loop=1&playlist=%1$s&playsinline=1&modestbranding=1&rel=0',
                $videoId
            );
        }
    }
@endphp

<div {{ $attributes->class(['absolute inset-0 z-0 overflow-hidden bg-cover bg-center']) }}
    style="background-image: url('{{ asset($fallbackImage) }}');">
    @if ($iframeSrc)
        <iframe
            class="pointer-events-none absolute top-1/2 left-1/2 block max-w-none border-0"
            style="width: 177.78vh; height: 56.25vw; min-width: 100%; min-height: 100%; transform: translate(-50%, -50%);"
            src="{{ $iframeSrc }}"
            title="Hero background video"
            loading="eager"
            allow="autoplay; fullscreen; picture-in-picture"
            referrerpolicy="strict-origin-when-cross-origin"
            aria-hidden="true"
            tabindex="-1"
        ></iframe>
    @endif
</div>
