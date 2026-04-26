@props([
    'embedUrl' => null,
    'fallbackImage',
])

@php
    $rawEmbedUrl = is_string($embedUrl) ? trim($embedUrl) : null;
    $provider = null;
    $iframeSrc = null;

    if ($rawEmbedUrl) {
        $normalizedEmbedUrl = preg_replace('#^https?://#i', '', $rawEmbedUrl);

        if (preg_match('/^(?:player\.)?vimeo\.com\/(?:video\/)?(\d+)/i', $normalizedEmbedUrl, $matches) || preg_match('/^\d+$/', $rawEmbedUrl, $matches)) {
            $videoId = $matches[1] ?? $matches[0];
            $provider = 'vimeo';
            $iframeSrc = sprintf(
                'https://player.vimeo.com/video/%s?background=1&autoplay=1&loop=1&muted=1&autopause=0&playsinline=1&controls=0&title=0&byline=0&portrait=0&dnt=1',
                $videoId
            );
        } elseif (preg_match('/(?:youtube\.com\/watch\?v=|youtube\.com\/embed\/|youtube\.com\/shorts\/|youtu\.be\/)([A-Za-z0-9_-]{11})/i', $rawEmbedUrl, $matches) || preg_match('/^[A-Za-z0-9_-]{11}$/', $rawEmbedUrl, $matches)) {
            $videoId = $matches[1] ?? $matches[0];
            $provider = 'youtube';
            $iframeSrc = sprintf(
                'https://www.youtube-nocookie.com/embed/%1$s?autoplay=1&mute=1&controls=0&loop=1&playlist=%1$s&playsinline=1&modestbranding=1&rel=0&enablejsapi=1&fs=0&iv_load_policy=3',
                $videoId
            );
        }
    }
@endphp

<div {{ $attributes->class(['hero-embed-shell absolute inset-0 z-0 overflow-hidden bg-cover bg-center']) }}
    data-hero-embed
    style="background-image: url('{{ asset($fallbackImage) }}');">
    @if ($iframeSrc)
        <iframe
            class="hero-embed-frame pointer-events-none absolute top-1/2 left-1/2 block max-w-none border-0"
            style="width: 177.78vh; height: 56.25vw; min-width: 100%; min-height: 100%; transform: translate(-50%, -50%);"
            src="{{ $iframeSrc }}"
            data-hero-iframe
            data-provider="{{ $provider }}"
            data-embed-src="{{ $iframeSrc }}"
            title="Hero background video"
            loading="eager"
            fetchpriority="high"
            allow="autoplay; fullscreen; picture-in-picture; encrypted-media"
            allowfullscreen
            referrerpolicy="strict-origin-when-cross-origin"
            aria-hidden="true"
            tabindex="-1"
        ></iframe>
    @endif
</div>

@once
    @push('styles')
        <style>
            .hero-embed-shell::before {
                content: "";
                position: absolute;
                inset: 0;
                background: inherit;
                background-position: center;
                background-size: cover;
                transform: scale(1.02);
            }

            .hero-embed-frame {
                z-index: 1;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://player.vimeo.com/api/player.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const heroEmbeds = document.querySelectorAll('[data-hero-embed]');

                const sendYouTubeCommand = (iframe, func) => {
                    if (!iframe.contentWindow) return;

                    iframe.contentWindow.postMessage(JSON.stringify({
                        event: 'command',
                        func,
                        args: [],
                    }), '*');
                };

                const startEmbed = (root) => {
                    const iframe = root.querySelector('[data-hero-iframe]');
                    if (!iframe) return;

                    const provider = iframe.dataset.provider;
                    const src = iframe.dataset.embedSrc;

                    if (!src) return;

                    if (provider === 'vimeo' && window.Vimeo && window.Vimeo.Player) {
                        if (!iframe._vimeoPlayer) {
                            iframe._vimeoPlayer = new window.Vimeo.Player(iframe);
                        }

                        iframe._vimeoPlayer.setMuted(true).catch(() => {});
                        iframe._vimeoPlayer.play().catch(() => {});
                        return;
                    }

                    if (provider === 'youtube') {
                        sendYouTubeCommand(iframe, 'mute');
                        sendYouTubeCommand(iframe, 'playVideo');
                    }
                };

                const reloadEmbed = (root) => {
                    const iframe = root.querySelector('[data-hero-iframe]');
                    if (!iframe) return;

                    const src = iframe.dataset.embedSrc;
                    if (!src) return;

                    iframe.src = src;
                    startEmbed(root);
                };

                heroEmbeds.forEach((root) => {
                    const iframe = root.querySelector('[data-hero-iframe]');
                    if (!iframe) return;

                    iframe.addEventListener('load', () => {
                        root.dataset.loaded = '1';
                        startEmbed(root);
                    });

                    startEmbed(root);

                    window.setTimeout(() => {
                        if (root.dataset.loaded !== '1') {
                            reloadEmbed(root);
                        }
                    }, 1800);

                    ['touchstart', 'pointerdown', 'click', 'scroll'].forEach((eventName) => {
                        window.addEventListener(eventName, () => {
                            reloadEmbed(root);
                        }, { once: true, passive: true });
                    });

                    document.addEventListener('visibilitychange', () => {
                        if (!document.hidden) {
                            startEmbed(root);
                        }
                    });
                });
            });
        </script>
    @endpush
@endonce
