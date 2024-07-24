@extends('master')
@section('title')
    Cập nhật sản phẩm: {{ $product->name }}
@endsection
@section('content')
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 mt-3">
            <label for="category_id" class="form-label">Category:</label>
            <select name="category_id" id="category_id" class="form-select">
                @foreach ($categories as $id => $name)
                    <option @if ($product->category_id == $id) selected @endif value="{{ $id }}">{{ $name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                value="{{ $product->name }}">
        </div>

        <div class="mb-3 mt-3">
            <label for="sku" class="form-label">SKU:</label>
            <input type="text" class="form-control" id="sku" placeholder="Enter sku" name="sku"
                value="{{ $product->sku }}">
        </div>

        <div class="mb-3 mt-3">
            <label for="img_thumb" class="form-label">Img thumb:</label>
            <input type="file" class="form-control" id="img_thumb" placeholder="Enter img_thumb" name="img_thumb">
            <img src="{{ asset($product->img_thumb) }}" alt="" width="100px">

        </div>

        <div class="mb-3 mt-3">
            <label for="overview" class="form-label">Overview:</label>
            <textarea class="form-control" id="overview" placeholder="Enter overview" name="overview">{{ $product->overview }}</textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="content" class="form-label">Content:</label>
            <textarea class="form-control" id="content" rows="10" placeholder="Enter content" name="content">{{ $product->content }}</textarea>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Sửa</button>
        <a class="btn btn-primary" href="{{ route('products.index') }}">Quay lại</a>

    </form>
@endsection
