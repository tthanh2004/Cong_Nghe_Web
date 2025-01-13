<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Xác định liệu người dùng có thể thực hiện yêu cầu này không.
     */
    public function authorize(): bool
    {
        return true; // Thiết lập tùy thuộc vào logic bảo mật của bạn
    }

    /**
     * Lấy các quy tắc xác thực cho yêu cầu.
     */
    public function rules(): array
    {
        return [
            'store_id' => 'required|exists:stores,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ];
    }
}
