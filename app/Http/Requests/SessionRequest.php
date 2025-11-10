<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
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
            'skill_id' => 'required|exists:skills,id',
            'teacher_id' => 'required|exists:users,id',
            'scheduled_at' => 'required|date|after:now',
            'duration' => 'required|integer|min:30|max:240',
            'session_type' => 'required|in:online,in-person',
            'meeting_link' => 'nullable|url|required_if:session_type,online',
            'location' => 'nullable|string|max:255|required_if:session_type,in-person',
            'notes' => 'nullable|string|max:500',
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
            'skill_id.required' => 'المهارة مطلوبة',
            'skill_id.exists' => 'المهارة المحددة غير موجودة',
            'teacher_id.required' => 'مقدم الخدمة مطلوب',
            'teacher_id.exists' => 'مقدم الخدمة غير موجود',
            'scheduled_at.required' => 'تاريخ ووقت الجلسة مطلوب',
            'scheduled_at.date' => 'تاريخ ووقت الجلسة غير صحيح',
            'scheduled_at.after' => 'يجب أن يكون موعد الجلسة في المستقبل',
            'duration.required' => 'مدة الجلسة مطلوبة',
            'duration.integer' => 'مدة الجلسة يجب أن تكون رقماً صحيحاً',
            'duration.min' => 'مدة الجلسة يجب أن تكون 30 دقيقة على الأقل',
            'duration.max' => 'مدة الجلسة يجب ألا تتجاوز 240 دقيقة',
            'session_type.required' => 'نوع الجلسة مطلوب',
            'session_type.in' => 'نوع الجلسة غير صحيح',
            'meeting_link.url' => 'رابط الاجتماع غير صحيح',
            'meeting_link.required_if' => 'رابط الاجتماع مطلوب للجلسات عن بُعد',
            'location.max' => 'الموقع يجب ألا يتجاوز 255 حرف',
            'location.required_if' => 'الموقع مطلوب للجلسات الحضورية',
            'notes.max' => 'الملاحظات يجب ألا تتجاوز 500 حرف',
        ];
    }
}
