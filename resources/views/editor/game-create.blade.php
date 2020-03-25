@extends('layouts.front')

@section('title')
    Add new game
@endsection

@section('content')
    <section class="articles-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <form action="{{ route('games.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="col-10">
                    <strong>Title</strong>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="" required>
                </div>
                <div class="col-10">
                    <strong>Year</strong>
                    <input type="number" max="2100" min="1900" class="form-control" id="year" name="year" placeholder="Year" value="" required>
                </div>
                <div class="col-10">
                    <strong>Description</strong>
                    <textarea  class="form-control" id="desc" name="desc" placeholder="Game Description" value="" required></textarea>
                </div>

                <div class="col-10">
                    <strong>Publisher</strong>
                    <select class="form-control" name="ddlPublisher" id="ddlPublisher" required>
                        <option value="0">Select publisher</option>
                    @foreach ($publishers as $p)
                        <option value="{{ $p->Id }}" >{{ $p->Name }}</option>
                    @endforeach
                    </select> 
                </div>

                <div class="col-10">
                    <strong>Developers</strong>
                    <select class="form-control" name="ddlDevs" id="ddlDevs" required>
                        <option value="0">Select developer</option>
                    @foreach ($devs as $d)
                        <option value="{{ $d->Id }}" >{{ $d->Name }}</option>
                    @endforeach
                    </select> 
                </div>

                <div class="col-10">
                    <strong>Platforms</strong>
                    @foreach ($platforms as $pl)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $pl->Id }}" id="chk{{ $pl->Name }}" name="platforms[]">
                            <label class="form-check-label" for="chk{{ $pl->Name }}">
                                {{ $pl->Name }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="col-10">
                    <strong>Cover</strong>
                    <input type="file" class="form-control" id="cover" name="cover" placeholder="" required> 
                </div>

                <div class="col-10">
                    <strong>Banner</strong>
                    <input type="file" class="form-control" id="banner" name="banner" placeholder="" required> 
                </div>
    
                <div class="col-10 col-md-5 btn">
                    <button class="btn btn-info btn-icon-split form-control" id="btnAddGame" name="btnAddGame" type="submit">Add Game</button>
                </div>
            </div>
        </form>


        <div id="error-msg" ></div>
            </div>
        </div>
    </section>
    
@endsection

@section('scripts')
    <script src="{{ asset('js/_editor.js') }}"></script>
@endsection