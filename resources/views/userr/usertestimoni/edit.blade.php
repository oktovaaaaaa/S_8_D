
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body>
    <div class="container">
        <h1>Edit Testimoni</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('userr.testimoni.update', $testimoni->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Rating:</label><br>
                <div class="rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="fa fa-star star {{ $i <= $testimoni->rating ? 'active' : '' }}" data-rating="{{ $i }}"></span>
                    @endfor
                </div>
                <input type="hidden" name="rating" id="rating" value="{{ $testimoni->rating }}">
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5">{{ $testimoni->deskripsi }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('userr.testimoni.index') }}" class="btn btn-secondary">Batal</a>
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
