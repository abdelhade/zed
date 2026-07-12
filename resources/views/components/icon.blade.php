@props(['name', 'class' => ''])

@php
$icons = [
    'spark' => '<path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/><circle cx="12" cy="12" r="3"/>',
    'target' => '<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.5"/>',
    'eye' => '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/>',
    'rocket' => '<path d="M5 15l-2 6 6-2"/><path d="M14 4c3 1 6 4 7 7l-8 8c-3-1-6-4-7-7l8-8z"/><path d="M9 15l-2-2"/>',
    'concept' => '<path d="M9 18h6"/><path d="M10 21h4"/><path d="M12 3a6 6 0 0 1 4 10c-.8.7-1.2 1.5-1.4 2.5H9.4C9.2 14.5 8.8 13.7 8 13a6 6 0 0 1 4-10z"/>',
    'production' => '<rect x="3" y="6" width="14" height="12" rx="1"/><path d="M17 10l4-2v10l-4-2z"/>',
    'editing' => '<circle cx="6" cy="6" r="2.5"/><circle cx="6" cy="18" r="2.5"/><circle cx="18" cy="12" r="2.5"/><path d="M8 7.5l8 3.5M8 16.5l8-3.5"/>',
    'publishing' => '<path d="M22 2L11 13"/><path d="M22 2l-7 20-4-9-9-4 20-7z"/>',
    'optimization' => '<path d="M4 14l4-4 3 3 6-7"/><path d="M15 6h5v5"/>',
    'idea' => '<path d="M12 3l1.5 4.5L18 9l-4.5 1.5L12 15l-1.5-4.5L6 9l4.5-1.5L12 3z"/><path d="M5 19h14"/>',
    'strategy' => '<path d="M4 20V10l8-6 8 6v10"/><path d="M9 20v-6h6v6"/>',
    'speed' => '<path d="M13 2L4 14h7l-1 8 10-14h-7l1-6z"/>',
    'honesty' => '<path d="M12 3l8 4v5c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V7l8-4z"/>',
    'unique' => '<path d="M12 3c4 4 7 7.2 7 11a7 7 0 1 1-14 0c0-3.8 3-7 7-11z"/>',
    'improve' => '<path d="M21 12a9 9 0 1 1-2.6-6.3"/><path d="M21 3v6h-6"/>',
    'media' => '<path d="M3 10v4a2 2 0 0 0 2 2h2l4 4V4L7 8H5a2 2 0 0 0-2 2z"/><path d="M16 8.5a5 5 0 0 1 0 7"/><path d="M18.5 6a8 8 0 0 1 0 12"/>',
    'video' => '<rect x="3" y="5" width="14" height="14" rx="2"/><path d="M17 10l4-2v8l-4-2z"/>',
    'brand' => '<path d="M12 2l3 7h7l-5.5 4.5L18 21l-6-4-6 4 1.5-7.5L2 9h7l3-7z"/>',
    'growth' => '<path d="M3 17l6-6 4 4 7-8"/><path d="M14 7h6v6"/>',
    'photo' => '<path d="M4 8h3l2-2h6l2 2h3v11H4z"/><circle cx="12" cy="13" r="3.5"/>',
    'web' => '<polyline points="8 8 4 12 8 16"/><polyline points="16 8 20 12 16 16"/><line x1="13" y1="5" x2="11" y2="19"/>',
    'content' => '<path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4L16.5 3.5z"/>',
    'cart' => '<circle cx="9" cy="20" r="1.5"/><circle cx="18" cy="20" r="1.5"/><path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.5L21 8H7"/>',
    'platforms' => '<rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>',
    'community' => '<path d="M16 20v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="3.5"/><path d="M22 20v-2a3.5 3.5 0 0 0-2.5-3.3"/><path d="M16.5 4.2a3.5 3.5 0 0 1 0 5.6"/>',
    'audio' => '<path d="M4 10v4"/><path d="M8 7v10"/><path d="M12 4v16"/><path d="M16 7v10"/><path d="M20 10v4"/>',
    'account' => '<rect x="3" y="7" width="18" height="13" rx="1"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>',
    'consult' => '<path d="M21 12a8 8 0 1 1-3.2-6.4"/><path d="M21 4v5h-5"/><path d="M8 13h5"/><path d="M8 17h8"/>',
    'design' => '<path d="M12 3l8 4.5v9L12 21l-8-4.5v-9L12 3z"/><path d="M12 12l8-4.5"/><path d="M12 12v9"/><path d="M12 12L4 7.5"/>',
    'arrow' => '<path d="M5 12h14"/><path d="M13 6l6 6-6 6"/>',
    'whatsapp' => '<path d="M20.5 11.5A8.5 8.5 0 0 1 7.2 19L4 20l1.1-3.1A8.5 8.5 0 1 1 20.5 11.5z"/><path d="M9.2 8.8c.2-.5.4-.5.7-.5h.5c.2 0 .4 0 .5.4l.7 1.7c.1.2 0 .4-.1.5l-.4.5c-.1.1-.2.3 0 .5.3.4.8 1 1.5 1.5.6.5 1.2.7 1.5.8.2.1.4 0 .5-.1l.6-.7c.2-.2.4-.1.6 0l1.6.8c.2.1.4.2.4.5 0 .3-.1 1.2-.6 1.5-.4.3-1 .4-1.7.2-1.7-.4-3.7-1.8-5.1-3.5-1.2-1.5-1.9-3.1-2.1-4.2-.1-.6 0-1.1.3-1.4z"/>',
    'instagram' => '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/>',
    'facebook' => '<path d="M14 9h3V6h-3c-2.2 0-4 1.8-4 4v2H7v3h3v7h3v-7h3l1-3h-4v-2c0-.6.4-1 1-1z"/>',
    'tiktok' => '<path d="M14 4v10.2a3.8 3.8 0 1 1-2.6-3.6"/><path d="M14 7.2c1.2 1.4 2.8 2.2 4.5 2.4V7c-1.5-.1-2.9-.8-4.5-2.8z"/>',
    'behance' => '<path d="M3 8h6.5a2.8 2.8 0 0 1 0 5.6H3V8zm0 5.6h7A3 3 0 0 1 10 19.4H3v-5.8z"/><path d="M14.5 9.2h6"/><path d="M20.5 15.5c0 2.2-1.6 3.9-3.7 3.9s-3.6-1.7-3.6-3.9 1.5-4 3.6-4 3.7 1.8 3.7 4z"/>',
    'linkedin' => '<rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 10v7M8 7v.01M12 17v-4.5a2.5 2.5 0 0 1 5 0V17"/>',
    'snapchat' => '<path d="M12 3c3.2 0 5 2.3 5 5.2 0 1.7-.3 2.5.8 3.5.5.4.9.7.9 1.2 0 .6-.7.9-1.5 1.1-.3.1-.5.2-.5.5 0 .9 1.5 1.5 1.5 2.3 0 1.4-2.2 1.5-3.4 1.6-.4 1.2-1.2 2.6-2.8 2.6s-2.4-1.4-2.8-2.6c-1.2-.1-3.4-.2-3.4-1.6 0-.8 1.5-1.4 1.5-2.3 0-.3-.2-.4-.5-.5-.8-.2-1.5-.5-1.5-1.1 0-.5.4-.8.9-1.2 1.1-1 .8-1.8.8-3.5C7 5.3 8.8 3 12 3z"/>',
    'deer' => '<path d="M7.2 8.2c-.8-1.2-.6-2.8.5-3.7.3-.2.5-.6.4-1C8 2.4 9.2 1.5 10.5 1.8c.6.1 1 .5 1.2 1 .3-.4.8-.7 1.4-.7 1.2 0 2.1 1 2 2.2 0 .3-.1.5-.2.7 1.2.4 2 1.6 1.9 2.9 0 .5-.2 1-.5 1.4l1.6 1.4c.6.5.7 1.4.2 2l-1.3 1.2v2.4c0 1.2-.7 2.3-1.7 2.8l.7 5.6h-2.1l-.6-3.8h-2.2l-.6 3.8H8.2l.7-5.6c-1-.5-1.7-1.6-1.7-2.8v-2.4L6.1 12c-.5-.6-.4-1.5.2-2l1.5-1.3c-.3-.4-.5-.8-.6-1.3z"/><path d="M9.2 3.2c-.4-.8-1.2-1.1-1.8-.8M14.8 3.4c.5-.9 1.4-1.1 2-.7"/>',
];
$paths = $icons[$name] ?? $icons['spark'];
@endphp

@if ($name === 'deer')
<span {{ $attributes->merge(['class' => 'ico ico--deer '.$class]) }} data-ico="deer" aria-hidden="true">
    <svg viewBox="0 0 24 24" fill="currentColor" stroke="none">
        <path d="M8.1 7.6c-.9-1.3-.7-3.1.5-4.1.2-.2.3-.5.2-.8C8.6 1.5 9.8.6 11.1.9c.5.1.9.4 1.1.8.3-.4.8-.7 1.4-.7 1.3 0 2.2 1.1 2.1 2.4v.5c1.3.5 2.1 1.8 2 3.2 0 .6-.2 1.1-.6 1.5l1.8 1.5c.7.6.8 1.6.2 2.3l-1.4 1.3v2.6c0 1.3-.7 2.5-1.9 3.1l.8 6.1h-2.3l-.6-4.1h-2.5l-.6 4.1H8.3l.8-6.1c-1.1-.6-1.9-1.8-1.9-3.1v-2.6L5.9 12c-.6-.7-.5-1.7.2-2.3l1.6-1.4c-.3-.4-.5-.9-.5-1.4 0-.4.1-.8.3-1.1z"/>
        <path d="M7.2 2.2c-.6-1.1-1.7-1.4-2.4-.8M16.8 2.4c.7-1.2 1.8-1.4 2.5-.7" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
    </svg>
</span>
@else
<span {{ $attributes->merge(['class' => 'ico '.$class]) }} data-ico="{{ $name }}" aria-hidden="true">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="miter">
        {!! $paths !!}
    </svg>
</span>
@endif
