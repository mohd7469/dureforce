<div class="alert  keyword-container">
    @foreach(\App\Models\Tag::topTags($tag_type_id) as $tag)
        <a href="{{url("/search/item/filter?tag_id=$tag->id")}}" class="badge badge-primary">{{$tag->name}}</a>
    @endforeach
</div>