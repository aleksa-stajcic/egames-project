@extends('layouts.front')

@section('content')
    <div class="container">
        <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Developer</th>
            <th scope="col">Publisher</th>
            <th scope="col">Year</th>
            <th scope="col">Editors Choice</th>
            <th scope="col">Date Added</th>
            <th scope="col">Date Modified</th>
            {{-- <th scope="col">Make Editors Choice</th> --}}
            <th scope="col">Delete Game</th>
            {{-- <th scope="col">Delete</th> --}}
        </tr>
    </thead>
    <tbody>
        @php
            $page = $games->currentPage();
            $per_page = $games->perPage();
            $i = $page == 1 ? $page : (($page-1) * $per_page) + 1;
        @endphp
        @foreach ($games as $g)
            <tr>
                <td>{{$i++}}</td>
                <td><img src="{{ asset("img/" . $g->Path) }}" alt="" srcset="" width="50px" height="50px"></td>
                <td>{{$g->Title}}</td>
                <td>{{$g->Developer}}</td>
                <td>{{$g->Publisher}}</td>
                <td>{{$g->Year}}</td>
                <td class="" style=""><input type="checkbox" {{ $g->IsEditorsChoice ? 'checked' : '' }}/></td>
                <td>{{$g->DateAdded}}</td>
                <td>{{$g->DateModified}}</td>
                {{-- <td><a style="" href="" class="btn btn-xs btn-warning" data-id="{{ $g->Id }}">{{ $g->IsEditorsChoice ? '' : 'Unban' }}</a></td> --}}
                {{-- <td><button class="btn btn-xs ban-user " data-id="{{ $g->Id }}" data-status="{{ $g->IsActive }}">{{ $g->IsActive ? 'Ban' : 'Unban' }}</button></td> --}}
                <td><button class="btn btn-xs btn-danger delete-game" data-id="{{ $g->Id }}">Delete</button></td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="refresh">
    {{ $games->links() }}
</div>
    </div>
@endsection