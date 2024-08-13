@extends('master')
@section('title')
    Chỉnh sửa trò chơi : {{ $game->name_title }}
@endsection
@section('content')
    <form action="{{ route('games.update', $game) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 mt-3">
            <label for="game_title" class="form-label">Game: </label>
            <input type="text" name="game_title" id="game_title" class="form-control"
                value="{{ old('game_title', $game->game_title) }}">

            @error('game_title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 mt-3">

            <label for="cover_art" class="form-label">Image: </label>
            <input type="file" name="cover_art" id="cover_art" class="form-control">
            <img src="{{ asset($game->cover_art) }}" alt="anh san pham" width="100px">

            @error('cover_art')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 mt-3">
            <label for="developer" class="form-label">Developer: </label>
            <input type="text" name="developer" id="developer" class="form-control"
                value="{{ old('developer', $game->developer) }}">

            @error('developer')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 mt-3">
            <label for="release_year" class="form-label">Release year: </label>
            <input type="number" name="release_year" id="release_year" class="form-control"
                value="{{ old('release_year', $game->release_year) }}">

            @error('release_year')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label for="genre" class="form-label">Genre: </label>
            <input type="text" name="genre" id="genre" class="form-control"
                value="{{ old('genre', $game->genre) }}">

            @error('genre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-4">Sửa</button>
        <a href="{{ route('games.index') }}" class="btn btn-primary mt-4">Quay lại</a>
    </form>
@endsection