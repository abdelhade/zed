<header class="site-nav" id="site-nav">
    <div class="nav-inner">
        <a href="#top" class="nav-brand" aria-label="ZED Studio" data-zz-jump="top">
            <span class="nav-brand__mark">ZED</span>
            <span class="nav-brand__sub">STUDIO</span>
        </a>

        <nav class="nav-links" aria-label="Primary">
            <a href="#who" data-zz-jump="who">{{ __('home.nav.who') }}</a>
            <a href="#vision" data-zz-jump="vision">{{ __('home.nav.vision') }}</a>
            <a href="#mission" data-zz-jump="mission">{{ __('home.nav.mission') }}</a>
            <a href="#values" data-zz-jump="values">{{ __('home.nav.values') }}</a>
            <a href="#services" data-zz-jump="services">{{ __('home.nav.services') }}</a>
            <a href="#contact" data-zz-jump="contact">{{ __('home.nav.contact') }}</a>
        </nav>

        <div class="nav-actions">
            <div class="lang-switch" role="group" aria-label="Language">
                <a href="{{ route('locale.switch', 'en') }}" class="lang-switch__btn {{ app()->getLocale() === 'en' ? 'is-active' : '' }}">EN</a>
                <a href="{{ route('locale.switch', 'ar') }}" class="lang-switch__btn {{ app()->getLocale() === 'ar' ? 'is-active' : '' }}">AR</a>
            </div>
            <a href="#cta" class="btn btn--sm" data-zz-jump="cta">{{ __('home.nav.work_with_us') }}</a>
            <button type="button" class="nav-toggle" id="nav-toggle" aria-expanded="false" aria-controls="nav-drawer" aria-label="Menu">
                <span></span><span></span>
            </button>
        </div>
    </div>

    <div class="nav-drawer" id="nav-drawer" hidden>
        <a href="#who" data-zz-jump="who">{{ __('home.nav.who') }}</a>
        <a href="#vision" data-zz-jump="vision">{{ __('home.nav.vision') }}</a>
        <a href="#mission" data-zz-jump="mission">{{ __('home.nav.mission') }}</a>
        <a href="#values" data-zz-jump="values">{{ __('home.nav.values') }}</a>
        <a href="#services" data-zz-jump="services">{{ __('home.nav.services') }}</a>
        <a href="#contact" data-zz-jump="contact">{{ __('home.nav.contact') }}</a>
        <a href="#cta" class="btn" data-zz-jump="cta">{{ __('home.nav.work_with_us') }}</a>
    </div>
</header>
