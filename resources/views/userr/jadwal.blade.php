@extends('layouts.main')
<div class="container">
    @include('layouts.navbar')
    <div class="jadwal-container pt-5 my-5">
        <br>
    @if(isset($jadwals) && count($jadwals) > 0)
        <h2  class="text-center">Jadwal Harian</h2>
        <br>
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col" class="text-center">Hari</th>
                    <th scope="col" class="text-center">Waktu Mulai</th>
                    <th scope="col" class="text-center">Waktu Selesai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwals as $jadwal)
                    <tr>
                        <td class="text-center">{{ $jadwal->hari }}</td>
                        <td class="text-center">{{ $jadwal->waktu_mulai }}</td>
                        <td class="text-center">{{ $jadwal->waktu_selesai }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center fs-4">Jadwal tidak tersedia</p>
    @endif
    </div>


@include('layouts.footer')
</div>
