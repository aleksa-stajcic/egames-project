@include('shared.head')
@yield('content')

@section('script')
    <script src="{{ asset('js/_admin.js') }}"></script>
@endsection

@include('sctipts')