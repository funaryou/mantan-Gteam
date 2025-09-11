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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // カテゴリセットボタンの処理
            const buttons = document.querySelectorAll('.category-set-button');
            buttons.forEach(button => {
                button.addEventListener('click', async (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const bigCatId = button.dataset.bigCatId;
                    const subCatId = button.dataset.subCatId;
                    
                    try {
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
                        const response = await fetch('{{ route("client.menu.setCookies") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                            },
                            body: JSON.stringify({
                                bigCategoryID: bigCatId,
                                subCategoryID: subCatId
                            })
                        });
            
                        if (response.ok) {
                            window.location.href = "{{ route('client.menu.index') }}";
                        } else {
                            console.error('Failed to save cookies on server.');
                        }
                    } catch (error) {
                        console.error('An error occurred:', error);
                    }
                });
            });
        });
    </script>
</x-layout-set>