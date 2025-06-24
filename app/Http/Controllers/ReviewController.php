<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\PointsModel;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /** Tampilkan daftar review dengan filter pantai */
    public function index(Request $request)
    {
        // Ambil semua daftar pantai untuk dropdown
        $pantais = PointsModel::select('id', 'name')->orderBy('name')->get();

        // Cek apakah user sedang memilih pantai tertentu
        $pantaiId = $request->query('pantai');

        // Ambil review sesuai filter (dengan relasi ke point)
        $reviews = Review::with('point') // untuk menampilkan nama pantai
                    ->when($pantaiId, function ($q) use ($pantaiId) {
                        return $q->where('point_id', $pantaiId);
                    })
                    ->latest()
                    ->paginate(5); // tampilkan 5 ulasan per halaman

        return view('reviews.index', compact('reviews', 'pantais', 'pantaiId'));
    }

    /** Simpan ulasan baru */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'content'   => 'required|string',
            'rating'    => 'required|integer|min:1|max:5',
            'point_id'  => 'required|exists:points,id',
        ]);

        Review::create($request->only('user_name', 'content', 'rating', 'point_id'));

        return back()->with('success', 'Ulasan berhasil dikirim!');
    }

    public function destroy($id)
{
    $review = Review::findOrFail($id);
    $review->delete();

    return redirect()->route('reviews.index')->with('success', 'Ulasan berhasil dihapus.');
}
}
