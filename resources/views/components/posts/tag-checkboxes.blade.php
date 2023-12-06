<h5>Tags</h5>
<div class="row">
    @foreach($tags as $tag)
        <div class="form-check col-md-6">
            <input class="form-check-input my-tag" type="checkbox"
                   name="tags[]"
                   @checked($currentTags->contains($tag) || collect(old('tags'))->contains($tag->id))
                   value="{{ $tag->id }}" id="tag-{{ $tag->id }}" onchange="checkTagsNumber();">
            <label class="form-check-label" for="tag-{{ $tag->id }}">
                {{ $tag->title }}
            </label>
        </div>
    @endforeach
</div>
<script>
    function checkTagsNumber() {
        let tags = document.querySelectorAll('.my-tag');
        let checkedTagsCount = document.querySelectorAll('.my-tag:checked').length;
        let button = document.getElementById('postButton');
        if (checkedTagsCount > 4) {
            tags.forEach(function (tag) {
                if (!tag.checked) {
                    tag.disabled = true;
                }
            });
        } else {
            tags.forEach(function (tag) {
                tag.disabled = false;
            });
        }
        button.disabled = checkedTagsCount < 3 || checkedTagsCount > 5;
    }

    checkTagsNumber();
</script>
