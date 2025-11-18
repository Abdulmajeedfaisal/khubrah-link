<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:20|max:1000',
            'category_id' => 'required|exists:categories,id',
            'level' => 'required|in:beginner,intermediate,advanced,expert',
            'price_per_hour' => 'nullable|numeric|min:0|max:9999.99',
            'session_duration' => 'required|integer|min:15|max:240',
            'location' => 'nullable|string|max:255',
            'session_type' => 'required|in:online,in-person,both',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'عنوان المهارة مطلوب',
            'title.max' => 'عنوان المهارة يجب ألا يتجاوز 255 حرف',
            'description.required' => 'وصف المهارة مطلوب',
            'description.min' => 'وصف المهارة يجب أن يكون 20 حرف على الأقل',
            'description.max' => 'وصف المهارة يجب ألا يتجاوز 1000 حرف',
            'category_id.required' => 'الفئة مطلوبة',
            'category_id.exists' => 'الفئة المحددة غير موجودة',
            'level.required' => 'مستوى المهارة مطلوب',
            'level.in' => 'مستوى المهارة غير صحيح',
            'price_per_hour.numeric' => 'السعر يجب أن يكون رقماً',
            'price_per_hour.min' => 'السعر يجب أن يكون أكبر من أو يساوي 0',
            'price_per_hour.max' => 'السعر يجب ألا يتجاوز 9999.99',
            'session_duration.required' => 'مدة الجلسة مطلوبة',
            'session_duration.integer' => 'مدة الجلسة يجب أن تكون رقماً صحيحاً',
            'session_duration.min' => 'مدة الجلسة يجب أن تكون 15 دقيقة على الأقل',
            'session_duration.max' => 'مدة الجلسة يجب ألا تتجاوز 240 دقيقة',
            'location.max' => 'الموقع يجب ألا يتجاوز 255 حرف',
            'session_type.required' => 'نوع الجلسة مطلوب',
            'session_type.in' => 'نوع الجلسة غير صحيح',
        ];
    }
}
