@extends('layouts.admin.kerangka')
@section('content')
    <div class="container">
        <form action="/dashboard/product/{{ $dataproduct->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Product</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ $dataproduct->name, old('name') }}">
                <input type="hidden" class="form-control" id="slug" name="slug" value="{{ $dataproduct->slug }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form form-control">
                    @foreach ($datacategories as $category)
                        <option value="{{ $category->id }}" {{ $dataproduct->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->nama_category }}</option>
                    @endforeach
                </select>
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" class="form-control" id="price" name="price"
                    value="{{ $dataproduct->price, old('price') }}">
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description">{{ $dataproduct->description, old('description') }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">
                <li class="fa fa-save"></li> Update
            </button>
        </form>
    </div>
    <script>
        const title = document.querySelector('#name')
        const slug = document.querySelector('#slug')

        title.addEventListener('change', function() {
            fetch('/dashboard/product/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })
    </script>
@endsection
