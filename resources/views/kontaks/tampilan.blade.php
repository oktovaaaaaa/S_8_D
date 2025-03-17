@extends('layouts.mainadmin')
@section('contents')
    <div class="d-flex justify-content-center align-items-center vh-15">
        <img src="{{ asset('tentang.png') }}" class="img-fluid" style="width:200px">
    </div>
    <div class="d-flex pt-5">
        <div class="d-flex justify-content-between align-items-center w-100">
            <h2 class="fw-semibold fs-4">Kontak</h2>
        </div>
    </div>
    <br><br>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (isset($kontaks) && count($kontaks) > 0)
        <div class="kontak-container">
            <h2 class="text-center">Pesan Masuk</h2>
            <br>
            <table class="table table-bordered table-hover">
                <thead class="table-success">
                    <tr>
                        <th scope="col" class="text-center" style="width: 10%;">Nama</th>
                        <th scope="col" class="text-center" style="width: 15%;">Email</th>
                        <th scope="col" class="text-center" style="width: 15%;">Subjek</th>
                        <th scope="col" class="text-center" style="width: 50%;">Pesan</th>
                        <th scope="col" class="text-center" style="width: 10%;">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kontaks as $kontak)
                        <tr>
                            <td class="text-center">{{ $kontak->nama }}</td>
                            <td class="text-center">{{ $kontak->email }}</td>
                            <td class="text-center">{{ $kontak->subjek }}</td>
                            <td>{{ $kontak->pesan }}</td>
                            <td class="text-center">
                                @include('kontaks.delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center fs-4">Pesan tidak tersedia</p>
    @endif
@endsection
