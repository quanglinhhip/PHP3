@extends('master')
@section('title')
    Chi tiết sản phẩm: {{ $category->name }}
@endsection
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="bg-primary text-white">FIELD NAME </th>
                <th class="bg-primary text-white">VALUE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category->toArray() as $column => $value)
                <tr>
                    <td>
                        <li>{{ $column }}: {{ $value }}</li>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ route('categories.index') }}">Quay lại</a>
@endsection
