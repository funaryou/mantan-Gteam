    <div class="home-card base-shadow">
        <button class="category-set-button" data-big-cat-id="{{ $items[0] }}" data-sub-cat-id="{{ $items[1] }}">
            <div class="category-image-item" style="background-image: linear-gradient(rgba(235, 224, 211, 0.5), rgba(235, 224, 211, 0.5)), url('{{ asset('storage/' . $items[3]) }}');">
                <p class="fs-{{$fs}}">{{ $items[2] }}</p>
            </div>
        </button>
    </div>
