@extends('layouts.main')

<div class="container">
    @include('layouts.navbar')
<br><br>
    <div class="d-flex flex-wrap justify-content-center gap-4 mt-4 mb-4 border-radius 20% pt-5 my-5">
        @if(isset($menus) && count($menus) > 0)
            @foreach ($menus as $menu)
            <div class="card col-lg-4 shadow-lg border-0" style="width: 18rem;">
                <a href="#" class="text-decoration-none"> <!-- Ganti # dengan link yang diinginkan -->
                    <div class="d-flex justify-content-center align-items-center p-3">
                        <img src="{{ url('storage/' . $menu->foto) }}" class="img-fluid w-100" alt="{{ $menu->nama }}" style="height: 200px; object-fit: cover; border-radius: 10%;">
                    </div>
                </a>
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $menu->nama }}</h5>
                    <p class="card-text">{{ $menu->deskripsi }}</p>
                    <p class="card-text fw-bold text-primary">Rp {{ $menu->harga}}</p>
                </div>
            </div>
            @endforeach
        @else
            <p class="text-center fs-4 ">Menu tidak tersedia</p>
        @endif
    </div>
{{--
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if(isset($menus) && count($menus) > 0)
                @php
                $menusPerSlide = 1; // Jumlah menu per slide
                $menuChunks = array_chunk($menus->all(), $menusPerSlide);
                @endphp

                @foreach ($menuChunks as $key => $menuChunk)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="d-flex flex-wrap justify-content-center gap-4">
                            @foreach ($menuChunk as $menu)
                                <div class="card col-lg-4 shadow-lg border-0" style="width: 18rem;">
                                    <a href="#" class="text-decoration-none">
                                        <div class="d-flex justify-content-center align-items-center p-3">
                                            <img src="{{ url('storage/' . $menu->foto) }}" class="img-fluid w-100" alt="{{ $menu->nama }}" style="height: 200px; object-fit: cover; border-radius: 10%;">
                                        </div>
                                    </a>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $menu->nama }}</h5>
                                        <p class="card-text">{{ $menu->deskripsi }}</p>
                                        <p class="card-text fw-bold text-primary">Rp {{ $menu->harga}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <div class="carousel-item active">
                    <p class="text-center fs-4">Menu tidak tersedia</p>
                </div>
            @endif
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br><br><br><br><br><br>

 --}}


    @include('layouts.footer')
</div>
