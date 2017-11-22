<div class="modal fade" id="tags" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-tag mr-2" aria-hidden="true"></i>Tags</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="input-group mb-2 mb-sm-0">
            <input type="text" class="form-control" name="tag" placeholder="Add a new tag here...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" id="addTag" type="button">Create tag</button>
            </span>
          </div>
        </div>
        <div class="tags">
        @foreach ($tags as $tag)
          <span class="badge badge-pill m-1 {{ (in_array($tag->id, $article->tagsIds())) ? 'selected' : '' }}" data-id="{{ $tag->id }}">
            <a>{{ $tag->name }} ({{ $tag->articles->count() }})</a>
          </span>
        @endforeach
      </div>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <div>
          <div id="success" class="hidden">
            <small class="text-success"><i class="fa fa-check mr-1" aria-hidden="true"></i><span></span></small>
          </div>
          <div id="fail" class="hidden">
            <small class="text-danger"><i class="fa fa-times mr-1" aria-hidden="true"></i><span></span></small>
          </div>
        </div>
        <button type="button" id="setTags" data-break-slug={{ $article->slug }} class="btn btn-theme-green">Save changes</button>
      </div>
    </div>
  </div>
</div>