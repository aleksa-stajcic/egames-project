@include('shared.admin.head')
@include('shared.admin.sidebar')
@include('shared.admin.topbar')
@yield('content')

@section('scripts')
    <script src="{{ asset('js/_admin.js') }}"></script>
@endsection

@include('shared.admin.footer')