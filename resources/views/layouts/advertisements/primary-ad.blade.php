<div class="trending-area fix no-print">
  <div class="container">
    <div class="card text-bg-dark mt-20">
      @php
        $randomAds = rand(0, $primaryAds->count() - 1);
      @endphp
      <a href="{{ $primaryAds[$randomAds]->url }}" @if ($primaryAds[$randomAds]->target) target="_blank" @endif>
        <img src="{{ asset('storage/' . $primaryAds[$randomAds]->advertisement) }}" class="card-img rounded"
          alt="...">
      </a>
    </div>
  </div>
</div>
