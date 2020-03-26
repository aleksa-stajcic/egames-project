@extends('layouts.front')

@section('content')
    <!-- ##### Game Review Area Start ##### -->
    <section class="game-review-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    @foreach ($games as $g)
                        @php
                            // $string = wordwrap($g->Description, 15);
                            $string = explode(".", $g->Description, 2);
                            $string = $string[0] . '...';
                        @endphp
                        <!-- *** Single Review Area *** -->
                        <div class="single-game-review-area d-flex flex-wrap mb-30">
                            <div class="game-thumbnail" width="50px">
                                <img src="{{ asset('img/' . $g->Path) }}" alt="{{ $g->Alt }}" width="50px">
                            </div>
                            <div class="game-content">
                                <a href="{{ route('games.show', ['id'=>$g->Id]) }}" class="game-title">{{ $g->Title }}</a>
                                <div class="game-meta">
                                    <a href="#" class="game-date">{{ $g->Year }}</a>
                                    {{-- <a href="#" class="game-comments">2 Comments</a> --}}
                                </div>
                                <p> {{ $string }} </p>
                                <!-- Download & Rating Area -->
                                <div class="download-rating-area d-flex align-items-center justify-content-between">
                                    <div class="rating-area text-center">
                                        <h3>9.1</h3>
                                        <div class="stars">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    
                    {{ $games->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Game Review Area End ##### -->
@endsection