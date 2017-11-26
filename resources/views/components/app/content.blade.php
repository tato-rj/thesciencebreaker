@yield('earlyJS')

<header>
    <div class="container">
        @include('components/partials/header/main')
        @include('components/partials/header/menu')
    </div>
</header>

<main>
    @yield('content')
</main>

@include('components/partials/footer')