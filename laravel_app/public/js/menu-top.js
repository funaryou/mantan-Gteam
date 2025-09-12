// カテゴリセットボタンの処理
function initCategorySetButtons() {
    const buttons = document.querySelectorAll('.category-set-button');
    
    buttons.forEach(button => {
        button.addEventListener('click', async (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            const bigCatId = button.dataset.bigCatId;
            const subCatId = button.dataset.subCatId;
            
            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                // グローバル変数からルート情報を取得
                const setCookiesUrl = window.routes?.setCookies || '/client/menu/set-cookies';
                const menuIndexUrl = window.routes?.menuIndex || '/client/menu';
                
                const response = await fetch(setCookiesUrl, {
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
                    window.location.href = menuIndexUrl;
                } else {
                    console.error('Failed to save cookies on server.');
                }
            } catch (error) {
                console.error('An error occurred:', error);
            }
        });
    });
}
