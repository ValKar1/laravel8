<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Requests\Client;

use App\Common\Infrastructure\Requests\AuthRequest;

class CreateClientRequest extends AuthRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
	public function authorize()
	{
		// parent::authorize();

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
			'firstname'         => 'required|string|max:255',
            'lastname'          => 'required|string|max:255',
            'country'           => 'required|string|max:255',
            'city'              => 'required|string|max:255',
            'zip'               => 'required|string|max:255',
            'street'            => 'required|string|max:255',
            'phone.number'      => 'required|string|max:255',
            'phone.city_code'    => 'required|string|max:255',
            'phone.country_code' => 'required|string|max:255',
		];
	}
}
