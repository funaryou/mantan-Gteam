<x-layout-set title="menu">
    <section class="menu-index-section">
        <nav class="category-bar">
            <x-big-category-bar :big-categories="$bigCategories" :select-big-category-id="$selectBigCategoryId" />
            <x-sub-category-bar :sub-categories="$subCategories" :select-sub-category-id="$selectSubCategoryId" />
        </nav>
        
    </section>
</x-layout-set>