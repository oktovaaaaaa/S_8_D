@extends('layouts.mainadmin')

@section('contents')
<div class="d-flex justify-content-center align-items-center vh-15">
    <img src="{{asset('menu.png')}}" class="img-fluid" style="width:200px">
</div>

<div class="d-flex pt-5">
    <div class="d-flex justify-content-between align-items-center w-100">
        <h2 class="fw-semibold fs-4">List Menu</h2>
        <a href="{{ route('menus.create') }}" class="btn btn-primary btn-sm px-3 py-1">Tambah</a>
    </div>
</div>
<br><br><br>

@if(session()->has('success'))
    <x-alert message="{{ session('success') }}" />
@endif

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($menus as $menu)
            <div class="col">
                <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
                    <!-- Gambar dengan aspect ratio 1:1 -->
                    <div class="ratio ratio-1x1">
                        <img src="{{ url('storage/' . $menu->foto) }}" class="card-img-top img-fluid rounded-top-4" alt="Menu Image" style="object-fit: cover;">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $menu->nama }}</h5>
                        <p class="card-text flex-grow-1">{{ $menu->deskripsi }}</p>
                        <p class="text-muted fw-bold fs-5">Rp {{$menu->harga}}</p>
                        <a href="{{ route('menus.edit', $menu) }}" class="btn btn-outline-primary w-100 mt-auto rounded-3">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-5 d-flex justify-content-center">
        {{ $menus->links() }}
    </div>
</div>
@endsection
