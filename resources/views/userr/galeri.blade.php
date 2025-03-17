@include('layouts.navbar')
@extends('layouts.main')
<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
}
.mtitle {
    font-size: 2rem;
    font-weight: bold;
    text-align: center;
    margin-top: 50px;
}
</style>

    <div class="container pt-5 my-5">
        <h2 class="mtitle">Galeri DEL Cafe</h2>
<div id="carouselExample" class="carousel slide " data-bs-ride="carousel">
    <div class="carousel-inner pt-5">
        @if(isset($galeris) && count($galeris) > 0)
            @php
            $galerisPerSlide = 3; // Jumlah galeri per slide
            $galeriChunks = array_chunk($galeris->all(), $galerisPerSlide);
            @endphp

            @foreach ($galeriChunks as $key => $galeriChunk)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="d-flex flex-wrap justify-content-center gap-4">
                        @foreach ($galeriChunk as $galeri)
                            <div class="card col-lg-4 shadow-lg border-0" style="width: 18rem;">
                                <a href="#" class="text-decoration-none">
                                    <div class="d-flex justify-content-center align-items-center p-3">
                                        <img src="{{ url('storage/images/' . $galeri->foto) }}" class="img-fluid w-100" alt="{{ $galeri->nama }}" style="height: 200px; object-fit: cover; border-radius: 10%;">
                                    </div>
                                </a>
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $galeri->nama }}</h5>
                                    <p class="card-text">{{ $galeri->deskripsi }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @else
            <div class="carousel-item active">
                <p class="text-center fs-4">galeri tidak tersedia</p>
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
@include('layouts.footer')
