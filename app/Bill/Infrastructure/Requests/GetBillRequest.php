<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Requests;

use App\Common\Requests\AuthRequest;

class GetBillRequest extends AuthRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        parent::authorize();

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
            'bill_id' => 'required|int|min:1'
        ];
    }
}
