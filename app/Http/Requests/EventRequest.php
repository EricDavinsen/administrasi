<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Adjust this based on your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'title' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
            'disposition' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ];
    }

    /**
     * Customize the error messages for the defined validation rules.
     */
    public function messages()
    {
        return [
            'start_date.required' => 'Tanggal mulai harus diisi',
            'end_date.required' => 'Tanggal selesai harus diisi',
            'title.required' => 'Judul harus diisi',
            'start_time.required' => 'Waktu mulai harus diisi',
            'end_time.required' => 'Waktu selesai harus diisi',
            'location.required' => 'Lokasi harus diisi',
            'disposition.required' => 'Disposisi harus diisi',
            'category.required' => 'Kategori harus diisi',
        ];
    }
}
