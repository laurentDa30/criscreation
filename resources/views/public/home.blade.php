@extends('layouts.public')
@section('title', 'Cris Création - Salon de Coiffure')

@section('content')
<!-- Hero -->
<section class="relative bg-gray-900" style="height: 85vh; min-height: 500px;">
    <div id="carousel" class="relative w-full h-full">
        @forelse($posts as $index => $post)
        <div class="carousel-slide absolute inset-0 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" data-index="{{ $index }}">
            <img src="{{ $post->image_url }}" alt="{{ Str::limit($post->caption, 50) }}" class="w-full h-full object-cover" loading="{{ $index === 0 ? 'eager' : 'lazy' }}">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
        @empty
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 to-gray-800"></div>
        @endforelse
    </div>

    <div class="absolute inset-0 flex items-center justify-center z-10">
        <div class="text-center px-4">
            <h1 class="font-display text-5xl md:text-7xl font-bold text-white mb-4">Cris Création</h1>
            <div class="w-12 h-0.5 bg-gold mx-auto mb-6"></div>
            <p class="text-white/70 text-lg md:text-xl font-light max-w-lg mx-auto mb-10">
                L'art de sublimer votre beauté naturelle
            </p>
            <a href="{{ route('reservation') }}" class="inline-block bg-gold text-white px-10 py-4 text-sm font-medium uppercase tracking-[0.15em] hover:bg-gold-dark transition-colors">
                Prendre rendez-vous
            </a>
        </div>
    </div>

    @if($posts->count() > 1)
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-2 z-20">
        @foreach($posts as $index => $post)
        <button class="carousel-dot w-2 h-2 rounded-full transition-colors {{ $index === 0 ? 'bg-gold' : 'bg-white/40' }}" data-index="{{ $index }}" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
    @endif
</section>

<!-- Présentation -->
<section class="py-20 md:py-28 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-6">Bienvenue</h2>
        <div class="w-12 h-0.5 bg-gold mx-auto mb-8"></div>
        <p class="text-gray-600 text-lg leading-relaxed mb-4">
            Niché au c&oelig;ur de Paris, notre salon vous accueille dans un cadre raffiné et chaleureux.
            Notre équipe de coiffeurs passionnés met son savoir-faire à votre service.
        </p>
        <p class="text-gray-500 leading-relaxed">
            Coupe, coloration, soins — chaque prestation est une expérience personnalisée.
        </p>
    </div>
</section>

<!-- Services -->
@if($services->count() > 0)
<section class="py-20 md:py-28 bg-cream">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-4">Nos Services</h2>
            <div class="w-12 h-0.5 bg-gold mx-auto"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($services->take(6) as $service)
            <div class="bg-white p-7 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-medium uppercase tracking-wider text-gold">{{ $service->category }}</span>
                    <span class="text-xs text-gray-400">{{ $service->duration }} min</span>
                </div>
                <h3 class="font-display text-lg font-semibold text-gray-900 mb-1">{{ $service->name }}</h3>
                @if($service->description)
                <p class="text-gray-500 text-sm leading-relaxed mb-3">{{ Str::limit($service->description, 80) }}</p>
                @endif
                <p class="text-gold font-display text-xl font-bold">{{ number_format($service->price, 0) }} €</p>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('tarifs') }}" class="text-gold text-sm font-medium uppercase tracking-wider hover:text-gold-dark transition-colors">
                Tous nos tarifs &rarr;
            </a>
        </div>
    </div>
</section>
@endif

<!-- CTA -->
<section class="py-20 md:py-28 bg-gray-900 text-white">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <h2 class="font-display text-3xl md:text-4xl font-bold mb-6">Envie d'un nouveau look ?</h2>
        <div class="w-12 h-0.5 bg-gold mx-auto mb-6"></div>
        <p class="text-gray-400 text-lg mb-10">Réservez en quelques clics, on s'occupe du reste.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('reservation') }}" class="bg-gold text-white px-10 py-4 text-sm font-medium uppercase tracking-[0.15em] hover:bg-gold-dark transition-colors w-full sm:w-auto text-center">
                Prendre rendez-vous
            </a>
            <a href="{{ route('contact') }}" class="border border-white/30 text-white px-10 py-4 text-sm font-medium uppercase tracking-[0.15em] hover:bg-white/10 transition-colors w-full sm:w-auto text-center">
                Nous contacter
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
        dots.forEach(d => { d.classList.remove('bg-gold'); d.classList.add('bg-white/40'); });
        slides[index].classList.replace('opacity-0', 'opacity-100');
        if (dots[index]) { dots[index].classList.remove('bg-white/40'); dots[index].classList.add('bg-gold'); }
        current = index;
    }

    function next() { showSlide((current + 1) % slides.length); }
    function startAutoplay() { interval = setInterval(next, 5000); }

    dots.forEach(dot => dot.addEventListener('click', function() {
        clearInterval(interval);
        showSlide(parseInt(this.dataset.index));
        startAutoplay();
    }));

    startAutoplay();
});
</script>
@endpush
