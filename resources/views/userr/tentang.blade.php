@include('layouts.navbar')
@extends('layouts.main')
<br>
<div class="container mt-5 pt-5 ">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            @if (isset($tentangs) && count(
                $tentangs) > 0)
                @foreach ($tentangs as $tentang)
                <div class="container mt-3 ">

                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h1 class="card-titl>e display-6">{{$tentang->judul}}</h1>
                            <p class="card-text lead">
                            {{$tentang->deskripsi}}
                            </p>
                            <small class="text-muted d-block text-end">Dibuat pada {{ $tentang->tanggal }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="text-center fs-4">Tentang tidak tersedia</p>
            @endif
        </div>
    </div>
</div>

@include('layouts.footer')
