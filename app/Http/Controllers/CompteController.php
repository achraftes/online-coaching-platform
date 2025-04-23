<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompteController extends Controller
{
    /**
     * Affiche le tableau de bord de l'utilisateur.
     */
    public function index()
    {
        $user = Auth::user();
        return view('compte.index', compact('user'));
    }

    /**
     * Affiche le formulaire pour éditer le profil
     */
    public function edit()
    {
        $user = Auth::user();
        return view('compte.edit', compact('user'));
    }

    /**
     * Met à jour les informations du profil utilisateur.
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'full_name'  => 'required|string|max:255',
            'nick_name'  => 'nullable|string|max:255',
            'gender'     => 'nullable|string|max:50',
            'country'    => 'nullable|string|max:100',
            'language'   => 'nullable|string|max:50',
            'time_zone'  => 'nullable|string|max:100',
        ]);

        $user = Auth::user();
        $user->update([
            'full_name'  => $request->full_name,
            'nick_name'  => $request->nick_name,
            'gender'     => $request->gender,
            'country'    => $request->country,
            'language'   => $request->language,
            'time_zone'  => $request->time_zone,
        ]);

        return redirect()->route('compte.index')->with('success', 'Profile updated successfully.');
    }

    /**
     * Met à jour la photo de profil.
     */
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        // Supprimer l'ancienne photo si elle existe
        if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        // Sauvegarde de la nouvelle photo
        $path = $request->file('photo')->store('profile_photos', 'public');
        
        $user->profile_photo = $path;
        $user->save();

        return redirect()->route('compte.index')->with('success', 'Photo updated successfully.');
    }
}