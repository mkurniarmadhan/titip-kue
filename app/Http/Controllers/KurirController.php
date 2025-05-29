<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kurirs = User::with('profile')->where('role', 'kurir')->get();
        return view('pages.kurir.index', compact('kurirs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kurir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['nullable'],
            'place_of_birth' => ['nullable'],
            'date_of_birth' => ['nullable'],
            'gender' => ['nullable'],
            'phone_number' => ['nullable'],
            'address' => ['nullable'],
            'city' => ['nullable'],
            'province' => ['nullable'],
            'postal_code' => ['nullable'],
            'national_id_number' => ['nullable'],
            'marital_status' => ['nullable'],
            'occupation' => ['nullable'],
            'education' => ['nullable'],
        ]);

        $user = User::create([
            'name' => $request->full_name,
            'email' => "$request->phone_number@kurir.dev",
            'password' => bcrypt('password'),
        ]);

        $user->profile()->create($validated);

        return to_route('kurir.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $kurir)
    {
        $profile = $kurir->profile;
        return view('pages.kurir.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $kurir)
    {
        $validated = $request->validate([
            'full_name' => ['nullable'],
            'place_of_birth' => ['nullable'],
            'date_of_birth' => ['nullable'],
            'gender' => ['nullable'],
            'phone_number' => ['nullable'],
            'address' => ['nullable'],
            'city' => ['nullable'],
            'province' => ['nullable'],
            'postal_code' => ['nullable'],
            'national_id_number' => ['nullable'],
            'marital_status' => ['nullable'],
            'occupation' => ['nullable'],
            'education' => ['nullable'],
        ]);

        $kurir->profile()->update($validated);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
