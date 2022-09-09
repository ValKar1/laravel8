<?php
declare(strict_types=1);

namespace App\Common\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
	protected function failedValidation(Validator $validator)
	{
		$exception = new ValidationException($validator);
		$errors = $exception->errors();

		$jsonResponse = response()->json([
			'message' => $errors[array_key_first($errors)][0],
			'code' => $exception->status
        ], $exception->status);

		throw new HttpResponseException($jsonResponse);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [];
	}
}
