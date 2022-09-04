<?php

namespace App\Shared\Requests;

use App\Shared\Exceptions\AuthenticationRequiredException;

class AuthRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool|void
     * @throws AuthenticationRequiredException
     */
	public function authorize()
	{
		if(!auth()->user()) {
			throw new AuthenticationRequiredException();
		}
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
