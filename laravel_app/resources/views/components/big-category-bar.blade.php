<ul class="big-category-bar">
    @foreach ($bigCategories as $bigCategory)
        <li class="big-category-button">
            <input type="radio" name="bigCategory" value="{{ $bigCategory->id }}" id="{{ $bigCategory->id }}" {{ $bigCategory->id == $selectBigCategoryId ? 'checked' : '' }}>
            <label for="{{ $bigCategory->id }}" class="base-shadow fs-24" >{{ $bigCategory->name }}</label>
        </li>   
    @endforeach
</ul>
