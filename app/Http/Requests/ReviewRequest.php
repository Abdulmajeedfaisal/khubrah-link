<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'overall_rating' => 'required|integer|min:1|max:5',
            'communication_rating' => 'nullable|integer|min:1|max:5',
            'knowledge_rating' => 'nullable|integer|min:1|max:5',
            'punctuality_rating' => 'nullable|integer|min:1|max:5',
            'professionalism_rating' => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string|min:10|max:1000',
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
            'overall_rating.required' => 'التقييم العام مطلوب',
            'overall_rating.integer' => 'التقييم يجب أن يكون رقماً صحيحاً',
            'overall_rating.min' => 'التقييم يجب أن يكون على الأقل 1',
            'overall_rating.max' => 'التقييم يجب ألا يتجاوز 5',
            'communication_rating.integer' => 'تقييم التواصل يجب أن يكون رقماً صحيحاً',
            'communication_rating.min' => 'تقييم التواصل يجب أن يكون على الأقل 1',
            'communication_rating.max' => 'تقييم التواصل يجب ألا يتجاوز 5',
            'knowledge_rating.integer' => 'تقييم المعرفة يجب أن يكون رقماً صحيحاً',
            'knowledge_rating.min' => 'تقييم المعرفة يجب أن يكون على الأقل 1',
            'knowledge_rating.max' => 'تقييم المعرفة يجب ألا يتجاوز 5',
            'punctuality_rating.integer' => 'تقييم الالتزام بالمواعيد يجب أن يكون رقماً صحيحاً',
            'punctuality_rating.min' => 'تقييم الالتزام بالمواعيد يجب أن يكون على الأقل 1',
            'punctuality_rating.max' => 'تقييم الالتزام بالمواعيد يجب ألا يتجاوز 5',
            'professionalism_rating.integer' => 'تقييم الاحترافية يجب أن يكون رقماً صحيحاً',
            'professionalism_rating.min' => 'تقييم الاحترافية يجب أن يكون على الأقل 1',
            'professionalism_rating.max' => 'تقييم الاحترافية يجب ألا يتجاوز 5',
            'comment.min' => 'التعليق يجب أن يكون 10 أحرف على الأقل',
            'comment.max' => 'التعليق يجب ألا يتجاوز 1000 حرف',
        ];
    }
}
