<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class SubscriptionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'website_id'=> 'required|integer',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
    // public function messages() //OPTIONAL
    // {
    //     return [
    //         'user_id.required' => 'User Id is required',
    //         'website_id.email' => 'Website Id is not correct'
    //     ];
    // }
}