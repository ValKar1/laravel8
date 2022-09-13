<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Requests\Bill;

use App\Common\Infrastructure\Requests\AuthRequest;

class CreateBillRequest extends AuthRequest
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
			'client_id' => 'required|uuid',
		];
	}
}
