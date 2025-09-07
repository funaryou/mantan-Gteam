<x-layout-set title="testpage">
    <h1>テンプレート</h1>
    <p>x-layout-setの属性として、titleの情報を入力すると、ページタイトルが変更できます</p>
    <x-setup-button :items="$person_count" :type="'person_count'" :checked="'3人'"/>
    <x-setup-button :items="$lang" :type="'lang'" :checked="'日本語'"/>
</x-layout-set>
