@extends('layouts.main')
<div class="container">
    @include('layouts.navbar')
    <br><br><br><br><br>
    @if(isset($jadwals) && count($jadwals) > 0)
    @foreach ($jadwals as $jadwal)
<div class="jadwal-container">
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
<br><br><br>
<br><br><br>
<br><br><br>

@include('layouts.footer')
</div>
