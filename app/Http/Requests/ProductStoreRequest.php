<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string','nullable'],
            'retail_price' => ['required', 'numeric', 'min:0'],
            'trade_price' => ['required', 'numeric', 'min:0'],
            'saved_amount' => ['required', 'in:virtual,generated,stored'],
            'sku' => ['required', 'string'],
            'tag_id' => ['required', 'exists:tags,id'],
        ];
    }
}
