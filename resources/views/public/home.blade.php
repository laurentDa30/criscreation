@extends('layouts.public')
@section('title', 'Cris Création - Salon de Coiffure')
@section('content')
<section class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div id="carousel" class="relative min-h-[600px] flex items-center">
            @forelse($posts as $index => $post)
            <div class="carousel-slide absolute inset-0 flex items-center transition-all duration-700 ease-in-out {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}" data-index="{{ $index }}">
                <div class="grid grid-cols-1 md:grid-cols-12 w-full items-center gap-0 md:gap-12">

                    <div class="md:col-span-7 relative h-[400px] md:h-[550px] group">
                        <div class="absolute -inset-4 bg-cream scale-95 group-hover:scale-100 transition-transform duration-500"></div>
                        <img src="{{ $post->image_url }}" alt="Coiffure" class="relative w-full h-full object-cover shadow-2xl">
                    </div>
                    <div class="md:col-span-5 py-12 md:py-0">
                        <span class="inline-block text-gold font-semibold tracking-[0.2em] uppercase text-xs mb-4">
                            — Tendances {{ ucfirst($post->platform) }}
                        </span>
                        <h2 class="font-display text-3xl md:text-5xl text-gray-900 leading-tight mb-6">
                            {{ Str::limit($post->caption, 80) }}
                        </h2>
                        <p class="text-gray-600 mb-8 line-clamp-3 italic">
                            "{{ Str::limit($post->caption, 150) }}"
                        </p>
                        <a href="{{ $post->post_url }}" target="_blank" class="inline-flex items-center group text-sm font-bold uppercase tracking-widest">
                            <span class="border-b-2 border-gold pb-1 group-hover:pr-4 transition-all">Découvrir le look</span>
                            <span class="ml-2 text-gold">→</span>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="flex flex-col md:flex-row items-center w-full gap-12">
                <div class="w-full md:w-1/2 h-[500px] bg-gray-100 shadow-xl"></div>
                <div class="w-full md:w-1/2">
                    <h1 class="font-display text-5xl mb-6">L'art de vous sublimer.</h1>
                    <a href="{{ route('reservation') }}" class="bg-gray-900 text-white px-8 py-4 uppercase text-xs tracking-widest">Prendre rendez-vous</a>
                </div>
            </div>
            @endforelse
        </div>
        @if($posts->count() > 1)
        <div class="absolute bottom-10 right-4 md:right-8 z-20 flex space-x-4">
            @foreach($posts as $index => $post)
            <button class="carousel-dot group flex items-center" data-index="{{ $index }}">
                <span class="h-[2px] w-8 transition-all {{ $index === 0 ? 'bg-gold w-12' : 'bg-gray-300 group-hover:bg-gold' }}"></span>
            </button>
            @endforeach
        </div>
        @endif
    </div>
</section>
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16">
            <div>
                <h2 class="font-display text-4xl text-gray-900 mb-2">Nos Spécialités</h2>
                <div class="w-20 h-1 bg-gold"></div>
            </div>
            <p class="text-gray-500 max-w-xs mt-4 md:mt-0 italic">Expertise technique & produits haut de gamme pour des cheveux en pleine santé.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group cursor-pointer">
                <div class="overflow-hidden mb-6 h-80">
                    <img src="/images/coupe.jpg" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Coupe & Style">
                </div>
                <h3 class="font-display text-xl mb-2">Coupe & Style</h3>
                <p class="text-gray-600 text-sm uppercase tracking-tighter">À partir de 45€</p>
            </div>
            <div class="group cursor-pointer">
                <div class="overflow-hidden mb-6 h-80">
                    <img src="/images/coloration.jpg" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Coloration">
                </div>
                <h3 class="font-display text-xl mb-2">Coloration Signature</h3>
                <p class="text-gray-600 text-sm uppercase tracking-tighter">À partir de 85€</p>
            </div>
            <div class="group cursor-pointer mt-0 md:mt-12">
                <div class="overflow-hidden mb-6 h-80">
                    <img src="/images/soins.jpg" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Soins">
                </div>
                <h3 class="font-display text-xl mb-2">Soins Profonds</h3>
                <p class="text-gray-600 text-sm uppercase tracking-tighter">À partir de 30€</p>
            </div>
        </div>
    </div>
</section>
<section class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4">
        <div class="relative">
            <span class="absolute -top-12 -left-4 text-[12rem] font-display text-gray-50 opacity-50 pointer-events-none">Cris</span>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="relative z-10">
                    <h2 class="font-display text-4xl md:text-5xl mb-8 leading-tight">Bien plus qu'un salon,<br><span class="text-gold italic">une identité.</span></h2>
                    <div class="prose prose-lg text-gray-600">
                        <p class="mb-6">Situé au cœur de la ville, <strong>Cris Création</strong> est le fruit d'une passion transmise pour l'art capillaire. Nous croyons que chaque visage raconte une histoire et que vos cheveux en sont le plus bel ornement.</p>
                        <p>Notre philosophie repose sur l'écoute active et le respect de la fibre capillaire, pour un résultat qui dure bien après votre sortie du salon.</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-[4/5] bg-gray-200">
                         <img src="/images/salon-interior.jpg" class="w-full h-full object-cover shadow-2xl" alt="L'intérieur du salon">
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-gold text-white p-8 hidden md:block">
                        <p class="font-display text-2xl italic">15 ans</p>
                        <p class="text-xs uppercase tracking-widest">d'expertise</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-20 bg-gray-900 text-white relative">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="font-display text-4xl mb-6">Sublimez votre regard dès aujourd'hui</h2>
        <p class="text-gray-400 mb-10 text-lg uppercase tracking-[0.2em]">Ouvert du Mardi au Samedi — 9h / 19h</p>

        <div class="flex flex-col sm:flex-row justify-center gap-6">
            <a href="{{ route('reservation') }}" class="px-12 py-5 bg-gold hover:bg-white hover:text-gray-900 transition-all duration-300 font-bold uppercase tracking-widest text-sm">
                Réserver en ligne
            </a>
            <a href="tel:{{ $settings['salon_phone'] }}" class="px-12 py-5 border border-white/30 hover:border-gold transition-all duration-300 font-bold uppercase tracking-widest text-sm">
                {{ $settings['salon_phone'] }}
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

    function showSlide(index) {
        slides.forEach((s, i) => {
            if(i === index) {
                s.classList.replace('opacity-0', 'opacity-100');
                s.classList.replace('z-0', 'z-10');
            } else {
                s.classList.replace('opacity-100', 'opacity-0');
                s.classList.replace('z-10', 'z-0');
            }
        });
        dots.forEach((d, i) => {
            const bar = d.querySelector('span');
            if(i === index) {
                bar.classList.add('bg-gold', 'w-12');
                bar.classList.remove('bg-gray-300', 'w-8');
            } else {
                bar.classList.remove('bg-gold', 'w-12');
                bar.classList.add('bg-gray-300', 'w-8');
            }
        });
        current = index;
    }
    dots.forEach(dot => dot.addEventListener('click', function() {
        showSlide(parseInt(this.dataset.index));
    }));
    // Auto-play simple
    setInterval(() => {
        let next = (current + 1) % slides.length;
        showSlide(next);
    }, 6000);
});
</script>
@endpush
