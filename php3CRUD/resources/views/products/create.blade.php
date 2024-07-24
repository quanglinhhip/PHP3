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
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 mt-3">
            <label for="sku" class="form-label">SKU:</label>
            <input type="text" class="form-control" id="sku" placeholder="Enter sku" name="sku"
                value="{{ old('sku') }}">
            @error('sku')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 mt-3">
            <label for="price" class="form-label">Price:</label>
            <input type="text" class="form-control" id="price" placeholder="Enter price" name="price"
                value="{{ old('price') }}">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 mt-3">
            <label for="quantity" class="form-label">Quantity:</label>
            <input type="number" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity"
                value="{{ old('quantity') }}">
            @error('quantity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 mt-3">
            <label for="img_thumb" class="form-label">Img thumb:</label>
            <input type="file" class="form-control" id="img_thumb" name="img_thumb">
            @error('img_thumb')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 mt-3">
            <label for="overview" class="form-label">Overview:</label>
            <textarea class="form-control" id="overview" placeholder="Enter overview" name="overview">{{ old('overview') }}</textarea>
            @error('overview')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 mt-3">
            <label for="content" class="form-label">Content:</label>
            <textarea class="form-control" id="content" rows="10" placeholder="Enter content" name="content">{{ old('content') }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a class="btn btn-primary" href="{{ route('products.index') }}">Quay lại</a>
    </form>
@endsection
