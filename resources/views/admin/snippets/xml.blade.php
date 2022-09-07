<div class="container mt-4 border p-3">
  <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
    <form id="xml-form" action="{{route('xml')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <input type="file" id="xml" name="xml" class="form-control">
      </div>

      <button type="submit" class="btn btn-dark">Upload XML</button>
    </form>
  </div>
</div>