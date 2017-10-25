<!DOCTYPE html>
<html lang="en">

<head>
@include('admin/partials/header')
</head>

<body class="fixed-nav sticky-footer bg-default" id="page-top">

  @include('admin/partials/nav')

  <div class="content-wrapper">
    @yield('content')
    @include('admin/partials/footer')
    @include('admin/partials/js')
  </div>
</body>

</html>