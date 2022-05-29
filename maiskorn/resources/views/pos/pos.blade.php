@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('/css/pos.css')}}">
@endsection

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="container  d-grid gap-3">

    {{-- each products --}}
    <div class="row">
      <div class="col-6">
        <div class="row">
          <h2>Products:</h2>
          @foreach ($products as $product)
            <div class="col-sm-4">
              <div class="card mb-2">
                <img src="{{ asset('/storage/img/'.$product->photo) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title fw-bolder ">{{$product->name}}</h5>
                  <p class="card-text fw-semibold fst-italic text-muted">#{{$product->code}}</p>
                  <p class="card-text fw-light">{{$product->desc}}</p>
                  <p class="card-text fw-light">Price: ₱{{$product->price}}.00</p>
                  <a href="#"
                    class="btn btn-success orange-bg black-cl addBtn"
                    data-name="{{$product->name}}"
                    data-code="{{$product->code}}"
                    data-id="{{$product->id}}"
                    data-price="{{$product->price}}"
                    >Add</a>
                </div>
              </div>      
            </div>  
          @endforeach
        </div>
      </div>



      {{-- For the whole orders --}}
      <div class="col-6">
      <h2>Orders:</h2>
        <ol class="list-group list-group-numbered  checklist">
          {{-- <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div class="fw-bold">Title</div>
              Product Code
            </div>
            <span class="badge bg-primary rounded-pill">14</span>
          </li> --}}
        </ol>
        
        <div class="checkout mt-2">
      
        </div>

        <div class="myalert">
                
        </div>
    
      </div>
    </div>

  </div>
@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('/js/pos.js')}}"></script>
@endsection
