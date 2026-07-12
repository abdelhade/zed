@php
    $sections = [
        ['id' => 'top', 'icon' => 'spark', 'title' => 'ZED Studio'],
        ['id' => 'who', 'icon' => 'eye', 'title' => __('home.nav.who')],
        ['id' => 'vision', 'icon' => 'target', 'title' => __('home.nav.vision')],
        ['id' => 'mission', 'icon' => 'strategy', 'title' => __('home.nav.mission')],
        ['id' => 'values', 'icon' => 'honesty', 'title' => __('home.nav.values')],
        ['id' => 'promise', 'icon' => 'growth', 'title' => __('home.promise.label')],
        ['id' => 'services', 'icon' => 'platforms', 'title' => __('home.nav.services')],
        ['id' => 'cta', 'icon' => 'rocket', 'title' => __('home.nav.work_with_us')],
        ['id' => 'contact', 'icon' => 'consult', 'title' => __('home.nav.contact')],
    ];
@endphp

<nav class="section-rail" aria-label="{{ app()->getLocale() === 'ar' ? 'أقسام الصفحة' : 'Page sections' }}">
    @foreach ($sections as $section)
        <button
            type="button"
            class="section-rail__btn"
            data-zz-jump="{{ $section['id'] }}"
            data-section="{{ $section['id'] }}"
            aria-label="{{ $section['title'] }}"
        >
            <span class="section-rail__ico mad-ico">
                <x-icon :name="$section['icon']" />
            </span>
            <span class="section-rail__drop" role="tooltip">{{ $section['title'] }}</span>
        </button>
    @endforeach
</nav>
