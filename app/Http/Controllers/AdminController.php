<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function dashboard()
    {
        // Récupérer tous les utilisateurs qui ont demandé l'autorisation
        $users = User::whereNotNull('address')
                     ->whereNotNull('phone')
                     ->whereNotNull('birthdate')
                     ->get();

        return view('admin.dashboard', compact('users'));
    }
 
    public function approve(User $user)
    {
        // Mettre à jour le statut de l'utilisateur comme Agent approuvé
        $user->update(['role' => 'Agent']);

        // Rediriger l'administrateur vers le tableau de bord avec un message de succès
        return redirect()->route('admin.dashboard')->with('success', 'L\'utilisateur a été approuvé comme Agent avec succès.');
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
