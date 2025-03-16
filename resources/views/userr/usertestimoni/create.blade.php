@extends('layouts.main')

    <style>
        .rating {
            display: inline-block;
        }

        .star {
            font-size: 20px;
            cursor: pointer;
            color: black;
        }

        .star.active {
            color: gold;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="container">
        <h1>Tambah Testimoni</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('testimoni.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Rating:</label><br>
                <div class="rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="fa fa-star star" data-rating="{{ $i }}"></span>
                    @endfor
                </div>
                <input type="hidden" name="rating" id="rating" value="0">
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('testimoni.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script>
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.querySelector('#rating');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const ratingValue = this.getAttribute('data-rating');

                stars.forEach(s => {
                    if (s.getAttribute('data-rating') <= ratingValue) {
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                    }
                });

                ratingInput.value = ratingValue;
            });
        });
    </script>

