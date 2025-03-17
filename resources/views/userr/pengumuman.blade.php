@extends('layouts.main')
    @include('layouts.navbar')

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
            <h2 class="mtitle">Pengumuman</h2>

            @if(isset($jadwals) && count($jadwals) > 0)
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @foreach ($pengumumans as $pengumuman)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pengumuman->judul }}</h5>
                            <p class="card-text">{{ $pengumuman->teks }}</p>
                            @if ($pengumuman->tautan)
                                <a href="{{ $pengumuman->tautan }}" target="_blank" style="color: blue; text-decoration: underline;">
                                    Klik di sini
                                </a>
                            @endif
                            <p class="card-text">
                                <small class="text-muted">
                                    Dibuat pada {{ date('d-m-Y', strtotime($pengumuman->tanggal)) }}
                                </small>
                            </p>
                        </div>
                    </div>
                @endforeach
                @else
                <p class="text-center fs-4 pt-5">Pengumuman tidak tersedia</p>
            @endif
            </div>
        </div>
    </div>

    @include('layouts.footer')

