@extends('master')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-3">
            <label for="category_id" class="form-label">Category:</label>
            <select name="category_id" id="category_id" class="form-select">
                @foreach ($categories as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
        </div>

        <div class="mb-3 mt-3">
            <label for="sku" class="form-label">SKU:</label>
            <input type="text" class="form-control" id="sku" placeholder="Enter sku" name="sku">
        </div>

        <div class="mb-3 mt-3">
            <label for="img_thumb" class="form-label">Img thumb:</label>
            <input type="file" class="form-control" id="img_thumb" placeholder="Enter img_thumb" name="img_thumb">
        </div>

        <div class="mb-3 mt-3">
            <label for="overview" class="form-label">Overview:</label>
            <textarea class="form-control" id="overview" placeholder="Enter overview" name="overview"></textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="content" class="form-label">Content:</label>
            <textarea class="form-control" id="content" rows="10" placeholder="Enter content" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a class="btn btn-primary" href="{{ route('products.index') }}">Quay lại</a>

    </form>
@endsection
