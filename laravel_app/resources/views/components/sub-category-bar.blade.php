<ul class="sub-category-bar">
    @foreach ($subCategories as $subCategory)
        <li class="sub-category-button">
            <input type="radio" name="subCategory" value="{{ $subCategory->id }}" id="sub{{ $subCategory->id }}" {{ $subCategory->id == $selectSubCategoryId ? 'checked' : '' }}>
            <label for="sub{{ $subCategory->id }}" class="base-shadow fs-20">{{ $subCategory->name }}</label>
        </li>   
    @endforeach
</ul>