<div class="container mt-4 border p-3">
  <form id="xml-form" action="{{route('xml')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <input type="file" id="xml" name="xml" class="form-control">
    </div>

    <button type="submit" class="btn btn-theme-orange">Upload XML</button>
  </form>
</div>