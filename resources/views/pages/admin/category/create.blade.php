@extends('layouts.admin.kerangka')
@section('content')
    <div class="container">
        <form action="/dashboard/category" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_category" class="form-label">Nama Category</label>
                <input type="text" class="form-control" id="nama_category" name="nama_category" value="{{ old('nama_category') }}">
                <input type="hidden" class="form-control" id="slug" name="slug">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">
                <li class="fa fa-save"></li> Save
            </button>
        </form>
    </div>
    <script>
        const title = document.querySelector('#nama_category')
        const slug = document.querySelector('#slug')

        title.addEventListener('change', function() {
            fetch('/dashboard/category/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })
    </script>
@endsection
