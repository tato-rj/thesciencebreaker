<form id="xml-form" action="{{route('xml')}}" method="post" enctype="multipart/form-data" style="opacity: 0;">
  @csrf
  <input type="file" id="xml" name="xml">
  <button type="submit">Upload XML</button>
</form>