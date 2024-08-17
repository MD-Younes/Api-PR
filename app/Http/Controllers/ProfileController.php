<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return Profile::where('user_id', Auth::id())->first();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'about' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $profile = Profile::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'title' => $request->title,
                'about' => $request->about,
                'image' => $request->image ? $request->file('image')->store('profiles') : null,
            ]
        );

        return response()->json($profile, 200);
    }

    public function update(Request $request, Profile $profile)
    {
        // Logic مشابه لـ store لكن فقط مع تعديل السجلات
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response()->json(null, 204);
    }
}
