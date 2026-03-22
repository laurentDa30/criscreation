@extends('layouts.public')
@section('title', 'Cris Création - Salon de Coiffure')

@section('content')
<!-- Hero Carousel — photo à gauche, texte à droite -->
<section class="bg-white">
    <div class="max-w-7xl mx-auto">
        <div id="carousel" class="relative" style="min-height: 500px;">
            @forelse($posts as $index => $post)
            <div class="carousel-slide absolute inset-0 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" data-index="{{ $index }}">
                <div class="grid grid-cols-1 md:grid-cols-2 h-full" style="min-height: 500px;">
                    <!-- Photo -->
                    <div class="relative overflow-hidden bg-gray-100" style="min-height: 300px;">
                        <img src="{{ $post->image_url }}" alt="{{ Str::limit($post->caption, 50) }}" class="absolute inset-0 w-full h-full object-cover" loading="{{ $index === 0 ? 'eager' : 'lazy' }}">
                    </div>
                    <!-- Texte -->
                    <div class="flex items-center px-8 md:px-14 lg:px-20 py-12 md:py-0">
                        <div>
                            <span class="inline-block text-xs font-semibold uppercase tracking-wider text-gold mb-4">{{ ucfirst($post->platform) }} &middot; {{ $post->posted_at->diffForHumans() }}</span>
                            <p class="font-display text-xl md:text-2xl text-gray-900 leading-relaxed mb-6">{{ Str::limit($post->caption, 180) }}</p>
                            <a href="{{ $post->post_url }}" target="_blank" rel="noopener" class="text-gold text-sm font-medium uppercase tracking-wider hover:text-gold-dark transition-colors">
                                Voir le post &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <!-- Fallback sans posts -->
            <div class="grid grid-cols-1 md:grid-cols-2" style="min-height: 500px;">
                <div class="bg-gray-900 flex items-center justify-center" style="min-height: 300px;">
                    <span class="font-display text-4xl text-white">Cris Création</span>
                </div>
                <div class="flex items-center px-8 md:px-14 lg:px-20 py-12 md:py-0">
                    <div>
                        <h1 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-4">Bienvenue</h1>
                        <div class="w-12 h-0.5 bg-gold mb-6"></div>
                        <p class="text-gray-600 text-lg leading-relaxed mb-6">L'art de sublimer votre beauté naturelle dans un cadre d'exception.</p>
                        <a href="{{ route('reservation') }}" class="inline-block bg-gold text-white px-8 py-3 text-sm font-medium uppercase tracking-wider hover:bg-gold-dark transition-colors">
                            Prendre rendez-vous
                        </a>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        @if($posts->count() > 1)
        <div class="flex items-center justify-center space-x-3 py-6">
            @foreach($posts as $index => $post)
            <button class="carousel-dot w-2.5 h-2.5 rounded-full transition-colors {{ $index === 0 ? 'bg-gold' : 'bg-gray-300' }}" data-index="{{ $index }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        @endif
    </div>
</section>

<!-- Histoire du salon -->
<section class="py-20 md:py-28 bg-cream">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-4">Notre Histoire</h2>
        <div class="w-12 h-0.5 bg-gold mx-auto mb-8"></div>
        <p class="text-gray-600 text-lg leading-relaxed mb-6">
            Cris Création est né d'une passion pour la coiffure et d'une envie de créer un lieu où chaque client se sent unique.
            Notre salon vous accueille dans un cadre chaleureux, où notre équipe met tout son savoir-faire à votre service.
        </p>
        <p class="text-gray-500 leading-relaxed">
            Coupe, coloration, soins capillaires — chaque prestation est pensée sur mesure
            pour révéler le meilleur de vous-même.
        </p>
    </div>
</section>

<!-- Prise de rendez-vous -->
<section class="py-20 md:py-28 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-4">Prenez Rendez-vous</h2>
        <div class="w-12 h-0.5 bg-gold mx-auto mb-8"></div>
        <p class="text-gray-600 text-lg mb-10">Réservez votre créneau en quelques clics, on s'occupe du reste.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('reservation') }}" class="bg-gold text-white px-10 py-4 text-sm font-medium uppercase tracking-[0.15em] hover:bg-gold-dark transition-colors w-full sm:w-auto text-center">
                Réserver en ligne
            </a>
            <a href="tel:{{ $settings['salon_phone'] }}" class="border border-gray-300 text-gray-700 px-10 py-4 text-sm font-medium uppercase tracking-[0.15em] hover:border-gold hover:text-gold transition-colors w-full sm:w-auto text-center">
                Appeler le salon
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
        dots.forEach(d => { d.classList.remove('bg-gold'); d.classList.add('bg-gray-300'); });
        slides[index].classList.replace('opacity-0', 'opacity-100');
        if (dots[index]) { dots[index].classList.remove('bg-gray-300'); dots[index].classList.add('bg-gold'); }
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
