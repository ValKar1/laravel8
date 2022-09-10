<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Requests\Address;

use App\Common\Infrastructure\Requests\AuthRequest;

class GetAddressRequest extends AuthRequest
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
            'client_id' => 'required|int|min:1',
        ];
    }

    /**
     * Inject GET parameters into validation data
     */
    public function all($keys = null)
    {
        $data              = parent::all($keys);
        $data['client_id'] = $this->route('client_id');
        return $data;
    }
}
