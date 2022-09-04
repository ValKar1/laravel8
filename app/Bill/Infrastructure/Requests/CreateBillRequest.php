<?php

namespace App\Bill\Infrastructure\Requests;

use App\Shared\Requests\AuthRequest;
use App\Shared\Exceptions\AuthorizationRequiredException;


class CreateBillRequest extends AuthRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
	public function authorize()
	{
		parent::authorize();

		if(!auth()->user()->hasPermission('Phrase.create')) {
            throw new AuthorizationRequiredException();
		}
        return true;
	}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return string[]
     */
	public function rules()
	{
		return [
			'playlist_id'           => 'required|string|size:24',
            'phrases'               => 'required|array',
			'phrases.*.name'        => 'required|string|max:255',
			'phrases.*.translation' => 'required|string|max:255'
		];
	}
}
