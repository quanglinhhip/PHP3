@extends('master')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                placeholder="Enter name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        {{-- <div class="mb-3 mt-3">
            <label for="img_thumb" class="form-label">Img thumb:</label>
            <input type="file" class="form-control" id="img_thumb" placeholder="Enter img_thumb" name="img_thumb">
        </div> --}}


        <button type="submit" class="btn btn-primary">Thêm</button>
        <a class="btn btn-primary" href="{{ route('categories.index') }}">Quay lại</a>

    </form>
@endsection
