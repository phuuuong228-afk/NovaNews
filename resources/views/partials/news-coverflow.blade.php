
@if(isset($coverflowPosts) && $coverflowPosts->isNotEmpty())
<section class="news-coverflow-section" aria-label="Tin tức nổi bật">
    <div class="news-coverflow-heading">
        <span class="news-coverflow-eyebrow">TIN TỨC MỚI NHẤT</span>
        <h2>Khám phá NovaNews</h2>
        <p>Những câu chuyện đáng chú ý, cập nhật mỗi ngày.</p>
    </div>

    <div class="news-coverflow" data-coverflow>
        <div class="news-coverflow-track">
            @foreach($coverflowPosts as $post)
                <a
                    class="news-coverflow-card"
                    data-coverflow-card
                    data-slot="{{ $loop->index - 2 }}"
                    href="{{ route('posts.show', $post->id) }}"
                    aria-label="Đọc bài viết: {{ $post->title }}"
                >
                    <div class="news-coverflow-image">
                        
                @if($post->thumbnail)
                    <img
                        src="{{ asset('storage/' . $post->thumbnail) }}"
                        alt="{{ $post->title }}"
                        loading="{{ $loop->index < 2 ? 'eager' : 'lazy' }}"
                        onerror="this.onerror=null; this.style.display='none';"
                    >
                @else
                    <div class="news-coverflow-no-image">
                        <span>NovaNews</span>
                    </div>
                @endif


                        <div class="news-coverflow-overlay"></div>

                        <div class="news-coverflow-content">
                            <span class="news-coverflow-label">
                                {{ $post->category?->name ?? 'Tin mới' }}
                            </span>

                            <h3>{{ $post->title }}</h3>

                            <span class="news-coverflow-read">
                                Đọc bài viết <span aria-hidden="true">→</span>
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        @if($coverflowPosts->count() > 1)
            <button
                type="button"
                class="news-coverflow-arrow news-coverflow-prev"
                data-coverflow-prev
                aria-label="Tin trước"
            >&#8592;</button>

            <button
                type="button"
                class="news-coverflow-arrow news-coverflow-next"
                data-coverflow-next
                aria-label="Tin tiếp theo"
            >&#8594;</button>
        @endif
    </div>

    <div class="news-coverflow-footer">
        <div class="news-coverflow-dots" data-coverflow-dots>
            @foreach($coverflowPosts as $post)
                <button
                    type="button"
                    data-coverflow-dot="{{ $loop->index }}"
                    aria-label="Chuyển đến tin {{ $loop->iteration }}"
                ></button>
            @endforeach
        </div>

        <button
            type="button"
            class="news-coverflow-pause"
            data-coverflow-pause
            aria-pressed="false"
        >Ⅱ Tạm dừng</button>
    </div>
</section>
@endif

<style>
.news-coverflow-section {
    --cf-blue: #1677ff;
    --cf-card-width: clamp(230px, 43vw, 540px);
    position: relative;
    width: 100%;
    overflow: hidden;
    padding: 64px 0 46px;
    margin: 24px 0 38px;
    color: #f5f7fb;
    background:
        radial-gradient(ellipse at 50% 45%, rgba(22,119,255,.13), transparent 58%),
        #101114;
}

.news-coverflow-heading {
    text-align: center;
    padding: 0 20px;
    margin-bottom: 12px;
}

.news-coverflow-eyebrow {
    color: #438cff;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 3px;
}

.news-coverflow-heading h2 {
    margin: 10px 0;
    font-size: clamp(25px, 3vw, 36px);
    font-weight: 800;
}

.news-coverflow-heading p {
    color: #aeb8c7;
    font-size: 14px;
}

.news-coverflow {
    position: relative;
    width: 100%;
    height: clamp(320px, 39vw, 450px);
    perspective: 1200px;
    overflow: hidden;
    touch-action: pan-y;
}

.news-coverflow-track {
    position: relative;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
}

.news-coverflow-card {
    position: absolute;
    left: 50%;
    top: 50%;
    width: var(--cf-card-width);
    height: 88%;
    display: block;
    color: white;
    text-decoration: none;
    border-radius: 18px;
    overflow: hidden;
    border: 1px solid rgba(255,255,255,.17);
    background: #1b202a;
    box-shadow: 0 18px 55px rgba(0,0,0,.42);
    transform-style: preserve-3d;
    transition:
        transform .7s cubic-bezier(.2,.7,.2,1),
        opacity .7s ease,
        filter .7s ease,
        box-shadow .7s ease;
    will-change: transform;
}


.news-coverflow-card[data-slot="-2"] {
    transform: translate(-50%, -50%) translateX(-105%) scale(.62) rotateY(25deg);
    opacity: .48;
    filter: brightness(.55);
    z-index: 1;
}

.news-coverflow-card[data-slot="-1"] {
    transform: translate(-50%, -50%) translateX(-60%) scale(.82) rotateY(13deg);
    opacity: .82;
    filter: brightness(.75);
    z-index: 3;
}

.news-coverflow-card[data-slot="0"] {
    transform: translate(-50%, -50%) scale(1);
    opacity: 1;
    filter: brightness(1);
    z-index: 5;
}

.news-coverflow-card[data-slot="1"] {
    transform: translate(-50%, -50%) translateX(60%) scale(.82) rotateY(-13deg);
    opacity: .82;
    filter: brightness(.75);
    z-index: 3;
}

.news-coverflow-card[data-slot="2"] {
    transform: translate(-50%, -50%) translateX(105%) scale(.62) rotateY(-25deg);
    opacity: .48;
    filter: brightness(.55);
    z-index: 1;
}


.news-coverflow-image,
.news-coverflow-image img {
    width: 100%;
    height: 100%;
}

.news-coverflow-image {
    position: relative;
    overflow: hidden;
}

.news-coverflow-image img {
    display: block;
    object-fit: cover;
    transition: transform .8s ease;
}

.news-coverflow-card[data-slot="0"]:hover img {
    transform: scale(1.04);
}

.news-coverflow-no-image {
    display: grid;
    width: 100%;
    height: 100%;
    place-items: center;
    color: #65a4ff;
    font-size: 28px;
    font-weight: 800;
    background: linear-gradient(135deg, #101a2e, #243958);
}

.news-coverflow-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        rgba(0,0,0,.02) 25%,
        rgba(0,0,0,.25) 45%,
        rgba(0,0,0,.92) 100%
    );
}

.news-coverflow-content {
    position: absolute;
    inset: auto 0 0;
    padding: clamp(15px, 2.5vw, 28px);
}

.news-coverflow-label {
    display: inline-block;
    margin-bottom: 12px;
    padding: 6px 10px;
    color: white;
    background: var(--cf-blue);
    border-radius: 4px;
    font-size: 11px;
    font-weight: 700;
}

.news-coverflow-content h3 {
    margin: 0 0 13px;
    font-size: clamp(16px, 2vw, 24px);
    font-weight: 800;
    line-height: 1.4;
    display: -webkit-box;
    line-clamp: 3;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.news-coverflow-read {
    color: #80b4ff;
    font-size: 13px;
    font-weight: 700;
}

.news-coverflow-arrow {
    position: absolute;
    top: 50%;
    z-index: 10;
    display: grid;
    place-items: center;
    width: 44px;
    height: 44px;
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 50%;
    color: white;
    background: rgba(10,14,22,.8);
    font-size: 23px;
    cursor: pointer;
    transform: translateY(-50%);
    transition: background .2s ease, border-color .2s ease;
}

.news-coverflow-arrow:hover {
    background: var(--cf-blue);
    border-color: var(--cf-blue);
}

.news-coverflow-prev { left: 20px; }
.news-coverflow-next { right: 20px; }

.news-coverflow-footer {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 22px;
    padding: 8px 16px 0;
}

.news-coverflow-dots {
    display: flex;
    align-items: center;
    gap: 8px;
}

.news-coverflow-dots button {
    width: 8px;
    height: 8px;
    padding: 0;
    border: 0;
    border-radius: 50%;
    background: #596171;
    cursor: pointer;
    transition: all .25s ease;
}

.news-coverflow-dots button[aria-current="true"] {
    width: 24px;
    border-radius: 8px;
    background: var(--cf-blue);
}

.news-coverflow-pause {
    border: 1px solid #424957;
    border-radius: 7px;
    padding: 7px 11px;
    color: #dce5f2;
    background: transparent;
    font-size: 12px;
    cursor: pointer;
}

.news-coverflow-pause:hover {
    border-color: var(--cf-blue);
    color: #80b4ff;
}

.news-coverflow-card:focus-visible,
.news-coverflow-arrow:focus-visible,
.news-coverflow-dots button:focus-visible,
.news-coverflow-pause:focus-visible {
    outline: 3px solid #80b4ff;
    outline-offset: 3px;
}

@media (max-width: 700px) {
    .news-coverflow-section {
        --cf-card-width: 76vw;
        padding-top: 44px;
    }

    .news-coverflow {
        height: 340px;
    }

    .news-coverflow-card[data-slot="-1"] {
        transform: translate(-50%, -50%) translateX(-48%) scale(.78) rotateY(12deg);
        opacity: .65;
    }

    .news-coverflow-card[data-slot="1"] {
        transform: translate(-50%, -50%) translateX(48%) scale(.78) rotateY(-12deg);
        opacity: .65;
    }

    .news-coverflow-card[data-slot="-2"] {
        transform: translate(-50%, -50%) translateX(-80%) scale(.58) rotateY(25deg);
        opacity: .25;
    }

    .news-coverflow-card[data-slot="2"] {
        transform: translate(-50%, -50%) translateX(80%) scale(.58) rotateY(-25deg);
        opacity: .25;
    }

    .news-coverflow-arrow {
        width: 36px;
        height: 36px;
    }

    .news-coverflow-prev { left: 8px; }
    .news-coverflow-next { right: 8px; }
}

@media (prefers-reduced-motion: reduce) {
    .news-coverflow-card,
    .news-coverflow-image img {
        transition: none;
    }
}
</style>

<script>
(() => {
    function initNewsCoverflow(root) {
        if (root.dataset.coverflowReady === 'true') return;
        root.dataset.coverflowReady = 'true';

        const cards = Array.from(root.querySelectorAll('[data-coverflow-card]'));
        const dots = Array.from(root.querySelectorAll('[data-coverflow-dot]'));
        const prev = root.querySelector('[data-coverflow-prev]');
        const next = root.querySelector('[data-coverflow-next]');
        const pause = root.querySelector('[data-coverflow-pause]');

        if (!cards.length) return;

        let center = 0;
        let timer = null;
        let paused = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        function render() {
            const total = cards.length;

            cards.forEach((card, index) => {
                let slot = (index - center + total) % total;
                if (slot > Math.floor(total / 2)) slot -= total;

                card.dataset.slot = String(slot);
                card.setAttribute('aria-hidden', slot === 0 ? 'false' : 'true');
                card.tabIndex = slot === 0 ? 0 : -1;
            });

            dots.forEach((dot, index) => {
                if (index === center) {
                    dot.setAttribute('aria-current', 'true');
                } else {
                    dot.removeAttribute('aria-current');
                }
            });
        }

        function go(step) {
            center = (center + step + cards.length) % cards.length;
            render();
        }

        function stopTimer() {
            if (timer !== null) {
                window.clearInterval(timer);
                timer = null;
            }
        }

        function startTimer() {
            stopTimer();
            if (!paused && cards.length > 1) {
                timer = window.setInterval(() => go(1), 2000);
            }
            updatePauseButton();
        }

        function updatePauseButton() {
            if (!pause) return;
            pause.textContent = paused ? '▶ Tiếp tục' : 'Ⅱ Tạm dừng';
            pause.setAttribute('aria-pressed', paused ? 'true' : 'false');
        }

        if (prev) prev.addEventListener('click', () => {
            go(-1);
            startTimer();
        });

        if (next) next.addEventListener('click', () => {
            go(1);
            startTimer();
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                center = index;
                render();
                startTimer();
            });
        });

        if (pause) {
            pause.addEventListener('click', () => {
                paused = !paused;
                startTimer();
            });
        }

        root.addEventListener('mouseenter', stopTimer);
        root.addEventListener('mouseleave', startTimer);
        root.addEventListener('focusin', stopTimer);
        root.addEventListener('focusout', event => {
            if (!root.contains(event.relatedTarget)) startTimer();
        });

        let touchStartX = 0;
        root.addEventListener('touchstart', event => {
            touchStartX = event.changedTouches[0].screenX;
        }, { passive: true });

        root.addEventListener('touchend', event => {
            const delta = event.changedTouches[0].screenX - touchStartX;
            if (Math.abs(delta) > 45) {
                go(delta < 0 ? 1 : -1);
                startTimer();
            }
        }, { passive: true });

        render();
        startTimer();
    }

    document.querySelectorAll('[data-coverflow]').forEach(initNewsCoverflow);
})();
</script>
