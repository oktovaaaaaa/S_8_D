@extends('layouts.mainadmin')

@section('contents')
<div class="d-flex justify-content-center align-items-center vh-15">
    <img src="{{asset('tentang.png')}}" class="img-fluid" style="width:200px">
</div>

<div class="d-flex pt-5">
    <div class="d-flex justify-content-between align-items-center w-100">
        <h2 class="fw-semibold fs-4">List tentang</h2>
        <a href="{{ route('tentangs.create') }}" class="btn btn-primary btn-sm px-3 py-1">Tambah</a>
    </div>
</div>
<br><br><br>

@if(session()->has('success'))
    <x-alert message="{{ session('success') }}" />
@endif

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($tentangs as $tentang)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $tentang->judul }}</h5>
                        <p class="card-text flex-grow-1 text-secondary">{{ $tentang->deskripsi }}</p>
                        <p class="text-muted fw-bold fs-6 mb-3">{{ $tentang->tanggal->format('d-m-Y') }}</p>
                        <a href="{{ route('tentangs.edit', $tentang) }}" class="btn btn-outline-primary w-100 mt-auto">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-5 d-flex justify-content-center">
        {{ $tentangs->links() }}
    </div>
</div>
@endsection
