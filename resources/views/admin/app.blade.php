<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin/partials/header')
</head>

<body class="fixed-nav sticky-footer bg-default" id="page-top">

  @include('admin/partials/nav')

  <div class="content-wrapper">
    @yield('content')
    {{-- Feedback Messages --}}
    @if($flash = session('db_feedback'))
      @include('admin/snippets/alerts/success')
    @endif
    @if ($errors->any())
    @include('admin/snippets/alerts/error')
    @endif
    
    @include('admin/partials/footer')
    @include('admin/partials/js')
    
    @yield('scripts')
  
  </div>
<script type="text/javascript">
Trix.config.textAttributes.sup = { tagName: "sup", inheritable: true }
Trix.config.textAttributes.sub = { tagName: "sub", inheritable: true }

addEventListener("trix-initialize", function(event) {
  var buttonHTML, buttonGroup
  
  buttonHTML  = '<button type="button" class="trix-button" data-trix-attribute="sup"><sup>SUP</sup></button>'
  buttonHTML += '<button type="button" class="trix-button" data-trix-attribute="sub"><sub>SUB</sub></button>'

  buttonGroup = event.target.toolbarElement.querySelector(".trix-button-group")
  buttonGroup.insertAdjacentHTML("beforeend", buttonHTML)
})
</script>
</body>

</html>