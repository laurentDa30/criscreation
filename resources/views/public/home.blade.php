@extends('layouts.public')
@section('title', 'Cris Création - Salon de Coiffure')

@section('content')
<!-- Hero -->
<section class="relative overflow-hidden" style="height: 100vh; min-height: 600px;">
    <div id="carousel" class="relative w-full h-full">
        @forelse($posts as $index => $post)
        <div class="carousel-slide absolute inset-0 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" data-index="{{ $index }}">
            <img src="{{ $post->image_url }}" alt="{{ Str::limit($post->caption, 50) }}" class="w-full h-full object-cover scale-105" loading="{{ $index === 0 ? 'eager' : 'lazy' }}" style="animation: slowZoom 20s ease-in-out infinite alternate;">
            <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/20 to-black/70"></div>
        </div>
        @empty
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
            <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,<svg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"><g fill=\"none\" fill-rule=\"evenodd\"><g fill=\"%23B8956A\" fill-opacity=\"0.4\"><path d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/></g></g></svg>');"></div>
        </div>
        @endforelse
    </div>

    <!-- Hero content overlay -->
    <div class="absolute inset-0 flex items-center justify-center z-10">
        <div class="text-center px-4 max-w-4xl">
            <div class="inline-block mb-6">
                <span class="text-gold text-sm font-semibold uppercase tracking-[0.3em] border border-gold/30 px-5 py-2">Salon de Coiffure</span>
            </div>
            <h1 class="font-display text-5xl md:text-7xl lg:text-8xl font-bold text-white mb-6 leading-tight" style="text-shadow: 0 2px 40px rgba(0,0,0,0.3);">
                Cris Création
            </h1>
            <p class="text-white/80 text-lg md:text-xl font-light max-w-2xl mx-auto mb-10 leading-relaxed">
                L'art de sublimer votre beauté naturelle dans un cadre d'exception
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('reservation') }}" class="group bg-gold text-white px-10 py-4 text-sm font-medium uppercase tracking-[0.2em] hover:bg-gold-dark transition-all duration-300 w-full sm:w-auto text-center">
                    Prendre rendez-vous
                    <span class="inline-block ml-2 transform group-hover:translate-x-1 transition-transform">&rarr;</span>
                </a>
                <a href="{{ route('tarifs') }}" class="border border-white/40 text-white px-10 py-4 text-sm font-medium uppercase tracking-[0.2em] hover:bg-white/10 backdrop-blur-sm transition-all duration-300 w-full sm:w-auto text-center">
                    Découvrir nos services
                </a>
            </div>
        </div>
    </div>

    @if($posts->count() > 1)
    <!-- Carousel indicators -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-3 z-20">
        @foreach($posts as $index => $post)
        <button class="carousel-dot w-8 h-1 rounded-full transition-all duration-500 {{ $index === 0 ? 'bg-gold w-12' : 'bg-white/40' }}" data-index="{{ $index }}" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
    @endif

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 right-8 z-20 hidden md:block">
        <div class="flex flex-col items-center text-white/50 text-xs uppercase tracking-widest">
            <span class="mb-2" style="writing-mode: vertical-rl;">Scroll</span>
            <div class="w-px h-8 bg-white/30 animate-pulse"></div>
        </div>
    </div>
</section>

<!-- Présentation -->
<section class="py-20 md:py-32 bg-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-gold/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-gold/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="fade-in">
                <span class="text-gold text-sm font-semibold uppercase tracking-[0.2em] mb-4 block">Notre histoire</span>
                <h2 class="font-display text-3xl md:text-5xl font-bold text-gray-900 mb-8 leading-tight">
                    Un savoir-faire<br>
                    <span class="text-gold">d'exception</span>
                </h2>
                <div class="w-16 h-0.5 bg-gold mb-8"></div>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    Niché au c&oelig;ur de Paris, notre salon vous accueille dans un cadre raffiné et chaleureux.
                    Notre équipe de coiffeurs passionnés met son savoir-faire à votre service pour sublimer votre beauté naturelle.
                </p>
                <p class="text-gray-500 leading-relaxed mb-8">
                    Que vous recherchiez une coupe tendance, une coloration sur mesure ou un soin revitalisant,
                    nous vous offrons une expérience personnalisée dans une ambiance apaisante.
                </p>
                <a href="{{ route('contact') }}" class="inline-flex items-center text-gold font-medium text-sm uppercase tracking-wider hover:text-gold-dark transition-colors group">
                    En savoir plus
                    <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4 fade-in">
                <div class="space-y-4">
                    <div class="bg-cream rounded-2xl p-8 text-center">
                        <span class="font-display text-4xl font-bold text-gold block mb-1">15+</span>
                        <span class="text-gray-500 text-sm">Années d'expérience</span>
                    </div>
                    <div class="bg-gray-900 rounded-2xl p-8 text-center">
                        <span class="font-display text-4xl font-bold text-gold block mb-1">5000+</span>
                        <span class="text-gray-400 text-sm">Clients satisfaits</span>
                    </div>
                </div>
                <div class="space-y-4 pt-8">
                    <div class="bg-gold/10 rounded-2xl p-8 text-center">
                        <span class="font-display text-4xl font-bold text-gold block mb-1">100%</span>
                        <span class="text-gray-500 text-sm">Produits premium</span>
                    </div>
                    <div class="bg-cream rounded-2xl p-8 text-center">
                        <span class="font-display text-4xl font-bold text-gold block mb-1">4.9</span>
                        <span class="text-gray-500 text-sm">Note Google</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
@if($services->count() > 0)
<section class="py-20 md:py-32 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 fade-in">
            <span class="text-gold text-sm font-semibold uppercase tracking-[0.2em] mb-4 block">Ce que nous proposons</span>
            <h2 class="font-display text-3xl md:text-5xl font-bold text-gray-900 mb-6">Nos Services</h2>
            <div class="w-16 h-0.5 bg-gold mx-auto"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services->take(6) as $service)
            <div class="group bg-white p-8 shadow-sm hover:shadow-xl transition-all duration-500 fade-in relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gold transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                <div class="flex items-start justify-between mb-4">
                    <span class="text-xs font-semibold uppercase tracking-wider text-gold bg-gold/10 px-3 py-1 rounded-full">{{ $service->category }}</span>
                    <span class="font-display text-2xl font-bold text-gray-900">{{ number_format($service->price, 0) }}€</span>
                </div>
                <h3 class="font-display text-xl font-semibold text-gray-900 mb-2 group-hover:text-gold transition-colors">{{ $service->name }}</h3>
                @if($service->description)
                <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ Str::limit($service->description, 100) }}</p>
                @endif
                <div class="flex items-center text-gray-400 text-sm">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $service->duration }} min
                </div>
            </div>
            @endforeach
        </div>
        @if($services->count() > 6)
        <div class="text-center mt-12">
            <a href="{{ route('tarifs') }}" class="inline-flex items-center text-gold font-medium text-sm uppercase tracking-wider hover:text-gold-dark transition-colors group">
                Voir tous nos services
                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        @endif
    </div>
</section>
@endif

<!-- Spécialités -->
<section class="py-20 md:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 fade-in">
            <span class="text-gold text-sm font-semibold uppercase tracking-[0.2em] mb-4 block">Notre expertise</span>
            <h2 class="font-display text-3xl md:text-5xl font-bold text-gray-900 mb-6">Pourquoi Nous Choisir</h2>
            <div class="w-16 h-0.5 bg-gold mx-auto"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="text-center fade-in group">
                <div class="w-20 h-20 bg-cream rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-gold/10 transition-colors duration-300">
                    <svg class="w-9 h-9 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.764m3.42 3.42a6.776 6.776 0 00-3.42-3.42"/></svg>
                </div>
                <h3 class="font-display text-xl font-semibold mb-4">Coloration Expert</h3>
                <p class="text-gray-500 text-sm leading-relaxed max-w-xs mx-auto">Balayage, mèches, couleur complète. Nos coloristes créent des nuances uniques qui subliment votre teint.</p>
            </div>
            <div class="text-center fade-in group">
                <div class="w-20 h-20 bg-cream rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-gold/10 transition-colors duration-300">
                    <svg class="w-9 h-9 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.848 8.25l1.536.887M7.848 8.25a3 3 0 11-5.196-3 3 3 0 015.196 3zm1.536.887a2.165 2.165 0 011.083 1.839c.005.351.054.695.14 1.024M9.384 9.137l2.077 1.199M7.848 15.75l1.536-.887m-1.536.887a3 3 0 11-5.196 3 3 3 0 015.196-3zm1.536-.887a2.165 2.165 0 001.083-1.838c.005-.352.054-.695.14-1.025m-1.223 2.863l2.077-1.199m0-3.328a4.323 4.323 0 012.068-1.379l5.325-1.628a4.5 4.5 0 012.48 0l.518.159a2.25 2.25 0 011.633 2.165c0 .957-.607 1.812-1.514 2.126l-5.325 1.629a4.324 4.324 0 01-2.068.137m0-3.328l.458.407a2.25 2.25 0 01.69 2.044l-.112.677a2.25 2.25 0 00.797 2.148l.961.721"/></svg>
                </div>
                <h3 class="font-display text-xl font-semibold mb-4">Coupe Sur Mesure</h3>
                <p class="text-gray-500 text-sm leading-relaxed max-w-xs mx-auto">Des coupes tendance et personnalisées. Nos stylistes sont formés aux dernières techniques pour un résultat impeccable.</p>
            </div>
            <div class="text-center fade-in group">
                <div class="w-20 h-20 bg-cream rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-gold/10 transition-colors duration-300">
                    <svg class="w-9 h-9 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.455 2.456L21.75 6l-1.036.259a3.375 3.375 0 00-2.455 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"/></svg>
                </div>
                <h3 class="font-display text-xl font-semibold mb-4">Soins Premium</h3>
                <p class="text-gray-500 text-sm leading-relaxed max-w-xs mx-auto">Des soins capillaires haut de gamme avec des produits professionnels pour des cheveux en pleine santé.</p>
            </div>
        </div>
    </div>
</section>

<!-- Social feed -->
@if($posts->count() > 0)
<section class="py-20 md:py-32 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 fade-in">
            <span class="text-gold text-sm font-semibold uppercase tracking-[0.2em] mb-4 block">Suivez-nous</span>
            <h2 class="font-display text-3xl md:text-5xl font-bold text-gray-900 mb-6">Nos Dernières Créations</h2>
            <div class="w-16 h-0.5 bg-gold mx-auto"></div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
            @foreach($posts as $post)
            <a href="{{ $post->post_url }}" target="_blank" rel="noopener" class="group relative aspect-square overflow-hidden bg-gray-200">
                <img src="{{ $post->image_url }}" alt="{{ Str::limit($post->caption, 30) }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-all duration-300 flex items-center justify-center">
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center px-3">
                        <svg class="w-6 h-6 text-white mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                        <span class="text-white text-xs">{{ ucfirst($post->platform) }}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA -->
<section class="relative py-24 md:py-32 bg-gray-900 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-5" style="background-image: url('data:image/svg+xml,<svg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"><g fill=\"none\" fill-rule=\"evenodd\"><g fill=\"%23B8956A\" fill-opacity=\"0.4\"><path d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/></g></g></svg>');"></div>
    <div class="max-w-4xl mx-auto px-4 text-center relative">
        <span class="text-gold text-sm font-semibold uppercase tracking-[0.2em] mb-6 block">Passez à l'action</span>
        <h2 class="font-display text-3xl md:text-5xl font-bold mb-6 leading-tight">
            Prêt(e) pour une<br><span class="text-gold">transformation ?</span>
        </h2>
        <p class="text-gray-400 text-lg mb-10 max-w-2xl mx-auto">
            Réservez votre rendez-vous en quelques clics et laissez nos experts prendre soin de vous.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('reservation') }}" class="group bg-gold text-white px-10 py-4 text-sm font-medium uppercase tracking-[0.2em] hover:bg-gold-dark transition-all duration-300 w-full sm:w-auto text-center">
                Réserver maintenant
                <span class="inline-block ml-2 transform group-hover:translate-x-1 transition-transform">&rarr;</span>
            </a>
            <a href="{{ route('tarifs') }}" class="border border-white/30 text-white px-10 py-4 text-sm font-medium uppercase tracking-[0.2em] hover:bg-white/10 backdrop-blur-sm transition-all duration-300 w-full sm:w-auto text-center">
                Voir les tarifs
            </a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    if (slides.length <= 1) return;

    let current = 0;
    let interval;

    function showSlide(index) {
        slides.forEach(s => s.classList.replace('opacity-100', 'opacity-0'));
        dots.forEach(d => { d.classList.remove('bg-gold', 'w-12'); d.classList.add('bg-white/40'); d.style.width = ''; });
        slides[index].classList.replace('opacity-0', 'opacity-100');
        if (dots[index]) { dots[index].classList.remove('bg-white/40'); dots[index].classList.add('bg-gold', 'w-12'); }
        current = index;
    }

    function next() { showSlide((current + 1) % slides.length); }
    function prev() { showSlide((current - 1 + slides.length) % slides.length); }

    function startAutoplay() { interval = setInterval(next, 6000); }
    function stopAutoplay() { clearInterval(interval); }

    dots.forEach(dot => dot.addEventListener('click', function() { stopAutoplay(); showSlide(parseInt(this.dataset.index)); startAutoplay(); }));

    // Swipe support for mobile
    let touchStartX = 0;
    const carousel = document.getElementById('carousel');
    carousel.addEventListener('touchstart', function(e) { touchStartX = e.changedTouches[0].screenX; }, {passive: true});
    carousel.addEventListener('touchend', function(e) {
        const diff = touchStartX - e.changedTouches[0].screenX;
        if (Math.abs(diff) > 50) { stopAutoplay(); diff > 0 ? next() : prev(); startAutoplay(); }
    }, {passive: true});

    startAutoplay();

    // Intersection Observer for fade-in animations
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-in').forEach(function(el) {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out';
        observer.observe(el);
    });
});
</script>
@endpush
