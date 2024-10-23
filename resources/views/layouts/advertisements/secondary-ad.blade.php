<div class="trending-area fix no-print">
  <div class="container">
    <div class="card text-bg-dark mb-3">
      @php
        $randomAds2 = rand(0, $secondaryAds->count() - 1);
      @endphp
      <a href="{{ $secondaryAds[$randomAds2]->url }}" @if ($secondaryAds[$randomAds2]->target) target="_blank" @endif>
        <img src="{{ asset('storage/' . $secondaryAds[$randomAds2]->advertisement) }}" class="card-img rounded"
          alt="...">
      </a>
    </div>
  </div>
</div>
