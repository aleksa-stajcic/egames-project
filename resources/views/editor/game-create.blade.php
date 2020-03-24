@extends('layouts.front')

@section('content')
    <section class="articles-are section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <form action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-10">
                    <strong>Title</strong>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="">
                </div>

                <div class="col-10">
                    <strong>Description</strong>
                    <textarea  class="form-control" id="desc" name="desc" placeholder="Game Description" value=""></textarea>
                </div>

                <div class="col-10">
                    <strong>Publisher</strong>
                    <select class="form-control" name="ddlPublisher" id="ddlPublisher">
                        <option value="0">Select publisher</option>
                    @foreach ($publishers as $p)
                        <option value="{{ $p->Id }}" >{{ $p->Name }}</option>
                    @endforeach
                    </select> 
                </div>

                <div class="col-10">
                    <strong>Developers</strong>
                    <select class="form-control" name="ddlDevs" id="ddlDevs">
                        <option value="0">Select developer</option>
                    @foreach ($publishers as $d)
                        <option value="{{ $d->Id }}" >{{ $d->Name }}</option>
                    @endforeach
                    </select> 
                </div>

                <div class="col-10">
                    <strong>Platforms</strong>
                    @foreach ($platforms as $pl)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="chk{{ $pl->Name }}" name="publishers">
                            <label class="form-check-label" for="chk{{ $pl->Name }}">
                                {{ $pl->Name }}
                            </label>
                        </div>
                    @endforeach
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