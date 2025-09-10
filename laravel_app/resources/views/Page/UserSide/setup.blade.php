<x-layout-set title="setup">
    <section class="setup-section">
        <h1 class="fs-64 setup-title">マンタン</h1>
        <form action="{{ route('client.setup.store') }}" method="POST">
            @csrf
            <div class="setup-button-box">
                <x-setup-button :items="$person_count" :type="'person_count'" :checked="'3人'"/>
                <x-setup-button :items="$lang" :type="'lang'" :checked="'日本語'"/>
                <div class=setup-box>
                    <button type="submit" class="base-shadow fs-24"><p class="fs-32">スタート</p></button>
                </div>
            </div>
            
        </form>
    </section>
</x-layout-set>

