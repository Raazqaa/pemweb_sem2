@extends('layouts.index')

@section('content')
    <div class="row">
        @foreach ($ar_staff as $row)
            <div class="col-md-3 mb-3">
                <div class="card h-100">

                    <img src="{{ $row->foto ? asset('storage/' . $row->foto) : asset('images/default.webp') }}"
                        class="card-img-top" style="height:250px; object-fit:cover;" alt="Foto Staff">

                    <div class="card-body">
                        <h5 class="card-title">{{ $row->nama }}</h5>
                        <p>{{ $row->nip }}</p>
                        <p>{{ $row->gender }}</p>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
