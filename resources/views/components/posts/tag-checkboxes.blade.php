<h5>Tags</h5>
<div class="row">
    @foreach($tags as $tag)
        <div class="form-check col-md-6">
            <input class="form-check-input" type="checkbox"
                   name="tags[]"
                   @checked($currentTags->contains($tag))
                   value="{{ $tag->id }}" id="tag-{{ $tag->id }}">
            <label class="form-check-label" for="tag-{{ $tag->id }}">
                {{ $tag->title }}
            </label>
        </div>
    @endforeach
</div>
