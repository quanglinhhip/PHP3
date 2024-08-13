<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'games.';
    const PATH_UPLOAD = 'games';
    public function index()
    {
        $data = Game::query()->latest('id')->paginate(5);
        // dd($data);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {
        $data = $request->except('cover_art');
        if ($request->hasFile('cover_art')) {
            $pathFile = Storage::putFile(self::PATH_UPLOAD, $request->file('cover_art'));
            $data['cover_art'] = 'storage/' . $pathFile;
        }

        // if ($request->hasFile('cover_art')) {
        //     $data['cover_art'] = Storage::put(self::PATH_UPLOAD, $request->file('cover_art'));
        // }
        Game::create($data);
        // dd($data);
        return redirect()->route('games.index')->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $data = $request->except('cover_art');
        if ($request->hasFile('cover_art')) {
            $pathFile = Storage::putFile(self::PATH_UPLOAD, $request->file('cover_art'));
            $data['cover_art'] = 'storage/' . $pathFile;
        }

        $currentImage = $game->cover_art;
        // update
        $game->update($data);
        // del old image
        if ($request->hasFile('cover_art') && $currentImage && file_exists(public_path($currentImage))) {
            unlink(public_path($currentImage));
        }
        return back()->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {

        if (
            $game->cover_art
            && file_exists(public_path($game->cover_art))
        ) {
            unlink(public_path($game->cover_art));
        }
        $game->delete();
        return back()->with('success', 'Xoá cứng thành công');
    }

    // Xóa mềm
    public function softDelete(Game $game)
    {
        // Xóa file ảnh nếu có
        if ($game->cover_art && file_exists(public_path($game->cover_art))) {
            unlink(public_path($game->cover_art));
        }

        // Xóa mềm
        $game->delete();

        return back()->with('success', 'Xoá mềm thành công');
    }
}
