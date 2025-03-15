<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Assurez-vous que vous avez les bonnes conditions d'autorisation
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'surface' => 'nullable|integer|min:0',
            'sold' => ['required', 'boolean'],
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'price' => 'required|numeric',
            'area' => 'required|numeric',
            'bedrooms' => 'required|numeric',
            'bathrooms' => 'required|numeric',
            'toilets' => 'required|numeric',
            'levels' => 'nullable|numeric',
            'property_type' => 'required|string',
            'construction_year' => 'nullable|numeric',
            'condition' => 'nullable|string',
            'garage' => 'nullable|boolean',
            'garden' => 'nullable|boolean',
            'garden_area' => 'nullable|numeric',
            'pool' => 'nullable|boolean',
            'heating_type' => 'nullable|string',
            'air_conditioning' => 'nullable|boolean',
            'energy_certifications' => 'nullable|string',
            'amenities' => 'nullable|string',
            'availability' => 'nullable|array',
            'fichiers.*' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'], // Validation des fichiers
            'documents.*' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'], // Validation des fichiers
        ];
        
    }
}
