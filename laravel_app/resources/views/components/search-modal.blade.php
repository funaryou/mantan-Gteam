<div class="search-modal">
    <label for="search-modal-toggle" class="modal-close-btn">×</label>
    <div class="search-modal-content">
        
        <!-- 左側：キーパッド -->
        <div class="search-modal-left">
            <!-- 入力フィールド -->
            <div class="search-input-container">
                <input type="text" class="search-input" placeholder="" readonly>
            </div>
            
            <!-- 数字キーパッド -->
            <div class="ten-key-pad">
                <button class="key-button" data-number="1">1</button>
                <button class="key-button" data-number="2">2</button>
                <button class="key-button" data-number="3">3</button>
                <button class="key-button" data-number="4">4</button>
                <button class="key-button" data-number="5">5</button>
                <button class="key-button" data-number="6">6</button>
                <button class="key-button" data-number="7">7</button>
                <button class="key-button" data-number="8">8</button>
                <button class="key-button" data-number="9">9</button>
                <button class="key-button back-button" data-action="back">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M19 12H5M12 19l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="key-button" data-number="0">0</button>
            </div>
        </div>

        <!-- 右側：商品表示 -->
        <div class="search-modal-right">
            
            @php
                $searchResult = [
                    'id' => 1,
                    'name' => "商品名が入ります",
                    'image_path' => "https://images.unsplash.com/photo-1563379091339-03246963d1b9?w=300&h=200&fit=crop",
                    'price' => 9999
                ];
            @endphp
            @if ($searchResult)
                <div class="product-image-container">
                    <img src="{{ $searchResult['image_path'] }}" alt="{{ $searchResult['name'] }}" class="product-image">
                </div>
                <div class="product-info">
                    <h3 class="product-name">{{ $searchResult['name'] }}</h3>
                    <p class="product-price">¥{{ number_format($searchResult['price']) }}</p>
                    <a href="{{ route('client.menu.detail', $searchResult['id']) }}" class="detail-button">商品詳細へ進む</a>
                </div>
            @else
                <div class="no-results">
                    <p>検索結果がありません</p>
                </div>
            @endif
        </div>
    </div>
</div>