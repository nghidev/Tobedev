@extends('layouts.fe')
@section('content')

<section id="itemboxes">

   	
    
    <div id="code_card_itembox">
    <div class="row">
        @foreach($orders as $item)
    <div class="col-md-3 mb15">
        <article class="box h-100">
            <figure class="itembox text-center">
                <span class="mt-2 icon-wrap rounded icon-sm bg-success">#{{$item->id}}</span>
                <figcaption class="text-wrap">
                <h5 class="title">Mã đơn:<a href="">{{$item->code}}</a></h5>
                {{-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod </p> --}}
                </figcaption>
            </figure> <!-- iconbox // -->
        </article> <!-- panel-lg.// -->
    </div> <!-- row.// -->
    @endforeach
    </div> <!-- code-wrap.// -->
    </section>
    @endsection