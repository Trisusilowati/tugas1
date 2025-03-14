<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'class' => 'required',
                'addres' => 'required',
                'gender' => 'required|in:male,female',
                'status' => 'required|in:active,inactive',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()      
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'phone.required' => 'Nomor telepon harus diisi.',
            'class.required' => 'Kelas harus diisi.',
            'addres.required' => 'Alamat harus diisi.',
            'gender.required' => 'Jenis kelamin harus diisi.',
            'gender.in' => 'Jenis kelamin harus laki-laki atau perempuan.',
            'status.required' => 'Status harus diisi.',
            'status.in' => 'Status harus aktif atau tidak aktif.',
            'photo.image' => 'Foto harus berupa gambar.',
            'photo.mimes' => 'Foto harus dalam format jpeg, png, jpg, gif, atau svg.',
            'photo.max' => 'Ukuran foto maksimal 2MB.',
        ];
        
    }
}
