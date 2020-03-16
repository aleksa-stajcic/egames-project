@include('shared.admin.head')
@include('shared.admin.sidebar')
@include('shared.admin.topbar')
@yield('content')

{{-- @section('script')
    <script src="{{ asset('js/_admin.js') }}"></script>
@endsection

@include('scripts') --}}

@include('shared.admin.footer')