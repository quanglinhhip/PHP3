@extends('master')
@section('title')
    Chi tiết game: {{ $game->name_title }}
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <td class="bg-primary text-white">FIELD NAME</td>
                <td class="bg-primary text-white">VALUE</td>
            </tr>
        </thead>

        <tbody>
            {{-- Lặp qua từng cặp field-value trong mảng chuyển đổi từ đối tượng $games --}}
            @foreach ($game->toArray() as $field => $value)
                <tr>
                    <td>{{ Str::ucfirst($field) }}</td>
                    @if ($field == 'cover_art')
                        <td><img src="{{ asset($game->cover_art) }}" alt="" width="100px"></td>
                    @else
                        {{-- hiển thị giá trị bình thường --}}
                        <td>{{ $value }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('games.index') }}" class="btn btn-primary">Trở lại</a>
@endsection
