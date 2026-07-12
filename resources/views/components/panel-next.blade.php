@props([
    'icon' => 'spark',
    'label' => null,
    'to' => null,
])

@php
    $label = $label ?? __('home.nav.next');
    $arrow = app()->getLocale() === 'ar' ? '←' : '→';
@endphp

<button
    type="button"
    {{ $attributes->merge(['class' => 'panel-next']) }}
    @if ($to) data-zz-jump="{{ $to }}" @else data-zz-next @endif
>
    <span class="panel-next__ico mad-ico" data-mad="{{ $icon }}">
        <x-icon :name="$icon" />
    </span>
    <span class="panel-next__meta">
        <span class="panel-next__label">{{ $label }}</span>
        <span class="panel-next__arrow mono" aria-hidden="true">{{ $arrow }}</span>
    </span>
</button>
