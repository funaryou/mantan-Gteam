<div class="side-bar">
    <!-- ヘッダーアイコン -->
    <div class="sidebar-header">
        <div class="header-icon">
            <input type="checkbox" id="staff-call-button" class="modal-button" hidden>
            <label for="staff-call-button" class="icon-button bell-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M18 8C18 6.4087 17.3679 4.88258 16.2426 3.75736C15.1174 2.63214 13.5913 2 12 2C10.4087 2 8.88258 2.63214 7.75736 3.75736C6.63214 4.88258 6 6.4087 6 8C6 15 3 17 3 17H21C21 17 18 15 18 8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.73 21C13.5542 21.3031 13.3019 21.5547 12.9982 21.7295C12.6946 21.9044 12.3504 21.9965 12 21.9965C11.6496 21.9965 11.3054 21.9044 11.0018 21.7295C10.6982 21.5547 10.4458 21.3031 10.27 21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </label>
        </div>
        <div class="header-icon">
            <input type="checkbox" id="search-button" class="modal-button" hidden>
            <label for="search-modal-toggle" class="icon-button search-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                    <path d="m21 21-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </label>
        </div>
    </div>

    <!-- 言語選択バー -->
    <div class="language-select">
        <span class="language-text">Language</span>
        <span class="language-arrow">^</span>
    </div>

    <!-- カートアイテムリスト -->
    <div class="carts">
        @if($carts && count($carts) > 0)
            @foreach ($carts as $cart)
                <div class="cart-item">
                    <div class="item-name">{{ $cart->menu->name ?? '商品名' }}</div>
                    <div class="item-price">¥{{ number_format($cart->menu->price ?? 0) }}</div>
                </div>
            @endforeach
        @else
            <div class="cart-item">
                <div class="item-name">カートは空です</div>
                <div class="item-price">¥0</div>
            </div>
        @endif
    </div>

    <!-- 注文ボタン -->
    <div class="cart-button-container">
        <a href="{{ route('client.order.cart') }}" class="order-button">注文する</a>
    </div>
</div>