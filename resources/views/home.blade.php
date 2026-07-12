@extends('layouts.app')

@section('content')
{{--
  Zig-zag path: RIGHT → DOWN → RIGHT → DOWN …
  Camera follows panels in order via scroll progress.
--}}
<div class="zz" id="zz" data-zz>
    <div class="zz__sticky">
        <div class="zz__world" data-zz-world>
            <section class="zz__panel hero" id="top" data-zz-panel data-step="0">
                <span class="accent-rail accent-rail--left accent-rail--magenta" aria-hidden="true"></span>
                <span class="accent-slash accent-slash--cyan" aria-hidden="true"></span>
                <div class="hero__bg" aria-hidden="true"></div>
                <div class="hero__orbs" aria-hidden="true">
                    <span class="orb orb--1"></span>
                    <span class="orb orb--2"></span>
                    <span class="orb orb--3"></span>
                    <span class="orb orb--ring"></span>
                </div>
                <div class="hero__scan" aria-hidden="true"></div>

                <div class="container hero__inner">
                    <div class="hero__meta mono">
                        <span class="meta-blink">{{ __('home.hero.coords') }}</span>
                        <span class="hero__status"><i></i>{{ __('home.hero.status') }}</span>
                    </div>

                    <p class="hero__tagline mono reveal">
                        <span class="tint tint--cyan">IDEAS</span>
                        <span class="tag-sep"> · </span>
                        <span class="tint tint--peach">IMAGINATION</span>
                        <span class="tag-sep"> · </span>
                        <span class="tint tint--magenta">IMPACT</span>
                    </p>
                    <h1 class="hero__brand reveal">
                        <span class="hero__brand-name glitch" data-text="ZED">ZED</span>
                        <span class="hero__brand-sub">STUDIO</span>
                    </h1>
                    <p class="hero__title reveal">
                        @if(app()->getLocale() === 'ar')
                            استوديو <span class="tint tint--cyan">إبداعي</span> أساسه <span class="tint tint--magenta">الاستراتيجية</span> و<span class="tint tint--peach">التسويق</span>
                        @else
                            <span class="tint tint--magenta">Strategy-First</span>
                            <span class="tint tint--cyan">Creative</span> &amp;
                            <span class="tint tint--peach">Marketing</span> Studio
                        @endif
                    </p>
                    <p class="hero__subtitle reveal">{{ __('home.hero.subtitle') }}</p>

                    <div class="hero__cta reveal">
                        <a href="#cta" class="btn btn--magnetic" data-zz-jump="cta">
                            <span class="btn__fill" aria-hidden="true"></span>
                            <x-icon name="rocket" class="ico--btn ico--spin-hover" />
                            <span class="btn__label">{{ __('home.hero.cta_primary') }}</span>
                            <span class="btn__arrow" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '←' : '→' }}</span>
                        </a>
                        <a href="#who" class="btn btn--ghost btn--magnetic" data-zz-jump="who">
                            <span class="btn__fill" aria-hidden="true"></span>
                            <x-icon name="target" class="ico--btn ico--pulse-hover" />
                            <span class="btn__label">{{ __('home.hero.cta_secondary') }}</span>
                            <span class="btn__arrow" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '←' : '→' }}</span>
                        </a>
                    </div>

                    <div class="hero__icons" aria-hidden="true">
                        <button type="button" class="float-ico float-ico--1 mad-ico" tabindex="-1"><x-icon name="spark" /></button>
                        <button type="button" class="float-ico float-ico--2 mad-ico" tabindex="-1"><x-icon name="eye" /></button>
                        <button type="button" class="float-ico float-ico--3 mad-ico" tabindex="-1"><x-icon name="brand" /></button>
                        <button type="button" class="float-ico float-ico--4 mad-ico" tabindex="-1"><x-icon name="growth" /></button>
                    </div>
                </div>

                <div class="hero__scroll mono" aria-hidden="true">
                    <span class="hero__scroll-label">{{ app()->getLocale() === 'ar' ? 'التالي ←' : 'NEXT →' }}</span>
                    <div class="hero__scroll-track">
                        <span class="hero__scroll-dot"></span>
                    </div>
                </div>

                <x-panel-next icon="spark" :label="__('home.nav.who')" to="who" class="panel-next--hero" />
            </section>

            <section class="zz__panel section section--split" id="who" data-zz-panel data-step="1">
                <span class="accent-rail accent-rail--right accent-rail--cyan" aria-hidden="true"></span>
                <span class="accent-dot accent-dot--magenta" aria-hidden="true"></span>
                <div class="zz__dir mono" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '← يسار' : '→ RIGHT' }}</div>
                <div class="container split">
                    <aside class="split__sticky">
                        <p class="section-label mono reveal">
                            <span class="tint tint--cyan">01</span> / {{ app()->getLocale() === 'ar' ? 'نحن من' : 'WHO WE ARE' }}
                        </p>
                    </aside>
                    <div class="split__content">
                        <h2 class="display-title reveal">
                            @if(app()->getLocale() === 'ar')
                                استوديو إبداعي أساسه <span class="tint tint--magenta">الاستراتيجية</span>، اتبنى عشان <span class="tint tint--peach">ينمّي</span> البراندات.
                            @else
                                A <span class="tint tint--magenta">strategy-first</span> creative studio built for <span class="tint tint--cyan">growth</span>.
                            @endif
                        </h2>
                        <p class="body-lg reveal">{{ __('home.who.p1') }}</p>
                        <p class="body-lg muted reveal">{{ __('home.who.p2') }}</p>
                    </div>
                </div>
                <x-panel-next icon="eye" :label="__('home.nav.vision')" to="vision" />
            </section>

            <section class="zz__panel section section--alt" id="vision" data-zz-panel data-step="2">
                <span class="accent-rail accent-rail--left accent-rail--peach" aria-hidden="true"></span>
                <span class="accent-corner accent-corner--magenta" aria-hidden="true"></span>
                <div class="zz__dir mono" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '↓ تحت' : '↓ DOWN' }}</div>
                <div class="container split">
                    <aside class="split__sticky">
                        <p class="section-label mono reveal">
                            <span class="tint tint--peach">02</span> / {{ app()->getLocale() === 'ar' ? 'الرؤية' : 'VISION' }}
                        </p>
                    </aside>
                    <div class="split__content">
                        <h2 class="display-title reveal">
                            @if(app()->getLocale() === 'ar')
                                إننا نبقى الشريك <span class="tint tint--cyan">الإبداعي</span> اللي البراندات بتثق فيه عشان <span class="tint tint--magenta">تكبر</span>.
                            @else
                                To become the creative growth partner that brands <span class="tint tint--magenta">trust</span>.
                            @endif
                        </h2>
                        <p class="body-lg reveal">{{ __('home.vision.p1') }}</p>
                        <p class="body-lg muted reveal">{{ __('home.vision.p2') }}</p>
                    </div>
                </div>
                <x-panel-next icon="target" :label="__('home.nav.mission')" to="mission" />
            </section>

            <section class="zz__panel section" id="mission" data-zz-panel data-step="3">
                <span class="accent-rail accent-rail--right accent-rail--magenta" aria-hidden="true"></span>
                <div class="zz__dir mono" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '← يسار' : '→ RIGHT' }}</div>
                <div class="container split">
                    <aside class="split__sticky">
                        <p class="section-label mono reveal">{{ __('home.mission.label') }}</p>
                    </aside>
                    <div class="split__content">
                        <h2 class="display-title reveal">{{ __('home.mission.title') }}</h2>
                        <p class="body-lg reveal">{{ __('home.mission.p1') }}</p>
                        <p class="body-lg muted reveal">{{ __('home.mission.p2') }}</p>

                        <div class="process reveal">
                            <p class="mono muted process__label">
                                <span class="live-dot"></span>
                                {{ __('home.mission.process_label') }}
                            </p>
                            @php
                                $processIcons = ['concept', 'production', 'editing', 'publishing', 'optimization'];
                            @endphp
                            <ol class="process__list">
                                @foreach (__('home.mission.process') as $i => $step)
                                    <li class="process__item tilt-card">
                                        <span class="process__ico mad-ico" data-mad="{{ $processIcons[$i] ?? 'spark' }}">
                                            <x-icon :name="$processIcons[$i] ?? 'spark'" />
                                        </span>
                                        <span class="process__code mono">{{ $step['code'] }}</span>
                                        <span class="process__title">{{ $step['title'] }}</span>
                                        <span class="process__shine" aria-hidden="true"></span>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
                <x-panel-next icon="strategy" :label="__('home.nav.values')" to="values" />
            </section>

            <section class="zz__panel section section--alt" id="values" data-zz-panel data-step="4">
                <span class="accent-rail accent-rail--left accent-rail--cyan" aria-hidden="true"></span>
                <span class="accent-slash accent-slash--peach" aria-hidden="true"></span>
                <div class="zz__dir mono" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '↓ تحت' : '↓ DOWN' }}</div>
                <div class="container zz__panel-inner">
                    <div class="section-head">
                        <p class="section-label mono reveal">{{ __('home.values.label') }}</p>
                        <h2 class="display-title reveal">{{ __('home.values.title') }}</h2>
                    </div>
                    <div class="bento bento--values">
                        @php
                            $valueIcons = ['idea', 'strategy', 'speed', 'honesty', 'unique', 'improve'];
                        @endphp
                        @foreach (__('home.values.items') as $i => $item)
                            <article class="bento-card reveal tilt-card mad-card">
                                <span class="mad-card__border" aria-hidden="true"></span>
                                <span class="bento-card__ico mad-ico" data-mad="{{ $valueIcons[$i] ?? 'spark' }}">
                                    <x-icon :name="$valueIcons[$i] ?? 'spark'" />
                                </span>
                                <span class="bento-card__code mono">{{ $item['code'] }}</span>
                                <h3 class="bento-card__title">{{ $item['title'] }}</h3>
                                <p class="bento-card__text">{{ $item['text'] }}</p>
                                <span class="mad-card__arrow mono" aria-hidden="true">↗</span>
                            </article>
                        @endforeach
                    </div>
                </div>
                <x-panel-next icon="honesty" :label="__('home.nav.next')" to="promise" />
            </section>

            <section class="zz__panel section section--promise" id="promise" data-zz-panel data-step="5">
                <span class="accent-rail accent-rail--right accent-rail--peach" aria-hidden="true"></span>
                <div class="zz__dir mono" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '← يسار' : '→ RIGHT' }}</div>
                <div class="promise-marquee" aria-hidden="true">
                    <div class="promise-marquee__track">
                        @for ($i = 0; $i < 4; $i++)
                            <span>GROWTH</span>
                            <span class="outline">ATTENTION</span>
                            <span>BRAND</span>
                            <span class="outline">IMPACT</span>
                        @endfor
                    </div>
                </div>
                <div class="container promise">
                    <p class="section-label mono reveal">
                        <span class="tint tint--magenta">05</span> / {{ app()->getLocale() === 'ar' ? 'وعدنا' : 'OUR PROMISE' }}
                    </p>
                    <p class="promise__line reveal">{{ __('home.promise.line1') }}</p>
                    <p class="promise__line promise__line--strong reveal">
                        @if(app()->getLocale() === 'ar')
                            إحنا بنعمل محتوى يبني <span class="tint tint--cyan">براندك</span>، يكسبلك <span class="tint tint--magenta">انتباه</span>، ويحقق <span class="tint tint--peach">نمو</span> ملموس.
                        @else
                            We create content that builds your <span class="tint tint--cyan">brand</span>, earns <span class="tint tint--magenta">attention</span>, and drives measurable <span class="tint tint--peach">growth</span>.
                        @endif
                    </p>
                </div>
                <x-panel-next icon="growth" :label="__('home.nav.services')" to="services" />
            </section>

            <section class="zz__panel section" id="services" data-zz-panel data-step="6">
                <span class="accent-rail accent-rail--left accent-rail--magenta" aria-hidden="true"></span>
                <span class="accent-dot accent-dot--cyan" aria-hidden="true"></span>
                <div class="zz__dir mono" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '↓ تحت' : '↓ DOWN' }}</div>
                <div class="container zz__panel-inner">
                    <div class="section-head section-head--row">
                        <div>
                            <p class="section-label mono reveal">{{ __('home.services.label') }}</p>
                            <h2 class="display-title reveal">{{ __('home.services.title') }}</h2>
                            <p class="body-lg muted reveal">{{ __('home.services.subtitle') }}</p>
                        </div>
                        <div class="stats reveal">
                            <div class="stat">
                                <span class="stat__num mono" data-count="15">0</span>
                                <span class="stat__label">{{ __('home.services.stat_disciplines') }}</span>
                            </div>
                            <div class="stat">
                                <span class="stat__num mono" data-count="1">0</span>
                                <span class="stat__label">{{ __('home.services.stat_team') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="bento bento--services">
                        @php
                            $serviceIcons = [
                                'strategy', 'media', 'video', 'brand', 'growth',
                                'photo', 'web', 'content', 'cart', 'platforms',
                                'community', 'audio', 'account', 'consult', 'design',
                            ];
                        @endphp
                        @foreach (__('home.services.items') as $index => $service)
                            <div class="service-cell reveal mad-service">
                                <span class="mad-service__bg" aria-hidden="true"></span>
                                <span class="service-cell__ico mad-ico" data-mad="{{ $serviceIcons[$index] ?? 'spark' }}">
                                    <x-icon :name="$serviceIcons[$index] ?? 'spark'" />
                                </span>
                                <span class="service-cell__idx mono">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <span class="service-cell__name">{{ $service }}</span>
                                <span class="mad-service__icon mono" aria-hidden="true">+</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <x-panel-next icon="platforms" :label="__('home.nav.work_with_us')" to="cta" />
            </section>

            <section class="zz__panel section section--cta" id="cta" data-zz-panel data-step="7">
                <span class="accent-rail accent-rail--right accent-rail--cyan" aria-hidden="true"></span>
                <span class="accent-corner accent-corner--peach" aria-hidden="true"></span>
                <div class="zz__dir mono" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '← يسار' : '→ RIGHT' }}</div>
                <div class="cta-pulse" aria-hidden="true"></div>
                <div class="container cta-block">
                    <p class="section-label mono reveal">{{ __('home.cta.label') }}</p>
                    <h2 class="cta-block__title reveal glitch-hover" data-text="{{ __('home.cta.title') }}">{{ __('home.cta.title') }}</h2>
                    <p class="body-lg muted reveal">{{ __('home.cta.subtitle') }}</p>
                    <a href="https://wa.me/201080909920" class="btn btn--lg btn--magnetic reveal" target="_blank" rel="noopener">
                        <span class="btn__fill" aria-hidden="true"></span>
                        <x-icon name="whatsapp" class="ico--btn ico--shake-hover" />
                        <span class="btn__label">{{ __('home.cta.button') }}</span>
                        <span class="btn__arrow" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '←' : '→' }}</span>
                    </a>
                </div>
                <x-panel-next icon="rocket" :label="__('home.nav.contact')" to="contact" />
            </section>

            <section class="zz__panel zz__panel--footer" id="contact" data-zz-panel data-step="8">
                <span class="accent-rail accent-rail--left accent-rail--peach" aria-hidden="true"></span>
                <div class="zz__dir mono" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '↓ تحت' : '↓ DOWN' }}</div>
                <div class="container footer-grid zz__footer">
                    <div class="footer-brand reveal">
                        <p class="section-label">{{ __('home.contact.label') }}</p>
                        <p class="footer-brand__name">{{ __('home.footer.brand') }}</p>
                        <p class="footer-brand__tag mono">IDEAS · IMAGINATION · IMPACT</p>
                    </div>
                    <div class="footer-info reveal">
                        <div class="footer-block">
                            <span class="mono muted">{{ __('home.contact.phone_label') }}</span>
                            <a href="https://wa.me/201080909920" class="footer-link" dir="ltr">{{ __('home.contact.phone') }}</a>
                        </div>
                        <div class="footer-block">
                            <span class="mono muted">{{ __('home.contact.web_label') }}</span>
                            <a href="https://www.zedstudiio.com" target="_blank" rel="noopener" class="footer-link" dir="ltr">{{ __('home.contact.web') }}</a>
                        </div>
                    </div>
                    <div class="footer-social reveal">
                        <span class="mono muted">{{ __('home.contact.social_label') }}</span>
                        <ul class="social-list social-list--icons">
                            <li>
                                <a href="https://www.instagram.com/zedstudii0/" target="_blank" rel="noopener" class="social-chip mad-ico">
                                    <x-icon name="instagram" /><span>Instagram</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/zedstudiio" target="_blank" rel="noopener" class="social-chip mad-ico">
                                    <x-icon name="facebook" /><span>Facebook</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.tiktok.com/@zedstudiio" target="_blank" rel="noopener" class="social-chip mad-ico">
                                    <x-icon name="tiktok" /><span>TikTok</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.behance.net/zedstudiio" target="_blank" rel="noopener" class="social-chip mad-ico">
                                    <x-icon name="behance" /><span>Behance</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/zedstudiio" target="_blank" rel="noopener" class="social-chip mad-ico">
                                    <x-icon name="linkedin" /><span>LinkedIn</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.snapchat.com/add/zedstudiio" target="_blank" rel="noopener" class="social-chip mad-ico">
                                    <x-icon name="snapchat" /><span>Snapchat</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-bar">
                    <div class="container footer-bar__inner">
                        <span class="mono muted">&copy; {{ date('Y') }} ZED STUDIO</span>
                        <span class="mono muted">{{ __('home.footer.rights') }}</span>
                    </div>
                </div>
                <x-panel-next icon="deer" :label="__('home.nav.back_top')" to="top" class="panel-next--end" />
            </section>
        </div>

        <div class="zz__hud mono" aria-hidden="true">
            <span data-zz-hud-dir>{{ app()->getLocale() === 'ar' ? '← يسار' : '→ RIGHT' }}</span>
            <div class="zz__hud-bar"><span data-zz-hud-fill></span></div>
            <span data-zz-hud-step>01 / 09</span>
        </div>
    </div>
</div>

<div class="deer-cursor" id="deer-cursor" aria-hidden="true">
    <x-icon name="deer" class="deer-cursor__ico" />
</div>
@endsection
