@extends('layouts.mainadmin')
@section('contents')
<br><br><br>
<div class="d-flex pt-5">
    <div class="d-flex justify-content-between align-items-center w-100">
        <h2 class="fw-semibold fs-4">Jadwal</h2>
        <a href="{{ route('jadwals.create') }}" class="btn btn-primary btn-sm px-3 py-1">Tambah</a>
    </div>
</div>
<br><br>
@if(session()->has('success'))
    <x-alert message="{{ session('success') }}" />
@endif

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
            @if(isset($jadwals) && count($jadwals) > 0)
            @foreach ($jadwals as $jadwal)
            <tr style="cursor: pointer;" onclick="window.location='{{ route('jadwals.edit', $jadwal) }}';">  <!-- Tambahkan style dan onclick -->
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
@endsection
