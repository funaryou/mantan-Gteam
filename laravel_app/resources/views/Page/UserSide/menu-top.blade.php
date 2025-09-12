<x-layout-set title="menu-top">
    <section class="menu-top-section">
        <div class="menu-top-box">
            <div class="menu-left-box">
                <x-category-image-block :items="$menusPickImages[0]" :fs="64"/>
            </div>
            <div class="menu-right-box">
                <div class="menu-right-top-box">
                    <x-category-image-block :items="$menusPickImages[1]" :fs="64"/>
                </div>
                <div class="menu-right-bottom-box">
                    <div>
                        <x-category-image-block :items="$menusPickImages[2]" :fs="36"/>
                    </div>
                    <div>
                        <x-category-image-block :items="$menusPickImages[3]" :fs="32"/>
                    </div>
                    <div>
                        <x-category-image-block :items="$menusPickImages[4]" :fs="32" />
                    </div>
                    <div>
                        <x-category-image-block :items="$menusPickImages[5]" :fs="32"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/menu-top.js') }}"></script>
    <script>
        // ルート情報をグローバル変数として定義
        window.routes = {
            setCookies: '{{ route("client.menu.setCookies") }}',
            menuIndex: '{{ route("client.menu.index") }}'
        };
        
        document.addEventListener('DOMContentLoaded', () => {
            initCategorySetButtons();
        });
    </script>
</x-layout-set>