@extends('admin/app')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Breaks
        @slot('comment')
          Use the form below to add a break by <u>uploading</u> an xml file
        @endslot
      @endcomponent

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto border p-3">
          <form id="xml-form" action="{{route('xml')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <input type="file" id="xml-input" name="xml" class="form-control-file" required>
            </div>

            <button type="submit" class="btn btn-dark">Upload XML</button>
          </form>
        </div>
      </div>
    </div>
@endsection