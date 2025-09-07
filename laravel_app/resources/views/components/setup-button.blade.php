<div class="setup-box fs-48">
    @foreach ($items as $item)
        <div class="setup-item">
            <input type="radio" name="{{ $type }}" value="{{ $item }}" id="{{ $item }}" {{ $checked == $item ? 'checked' : '' }}>
            <label for="{{ $item }}" class="base-shadow"> {{ $item }} </label>
        </div>
    @endforeach
</div>