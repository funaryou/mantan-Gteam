<x-layout-set title="menu">
    <section class="menu-index-section">
        <nav class="category-bar">
            <x-big-category-bar :big-categories="$bigCategories" :select-big-category-id="$selectBigCategoryId" />
            <x-sub-category-bar :sub-categories="$subCategories" :select-sub-category-id="$selectSubCategoryId" />
            <x-side-bar :carts="$carts"/>
        </nav>
        
    </section>
    
    <!-- 検索モーダル -->
    <input type="checkbox" id="search-modal-toggle" class="modal-toggle" hidden>
    <div class="modal-overlay">
        <div class="modal-content">
            <x-search-modal />
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            initMenuIndex();
            initSearchModal();
        });

        function initSearchModal() {
            const searchInput = document.querySelector('.search-input');
            const keyButtons = document.querySelectorAll('.key-button');
            
            keyButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const number = button.getAttribute('data-number');
                    const action = button.getAttribute('data-action');
                    
                    if (number) {
                        searchInput.value += number;
                    } else if (action === 'back') {
                        searchInput.value = searchInput.value.slice(0, -1);
                    }
                });
            });
        }
    </script>
</x-layout-set>