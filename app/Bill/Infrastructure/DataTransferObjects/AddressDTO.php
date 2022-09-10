<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\DataTransferObjects;

use App\Common\Infrastructure\DataTransferObject;

class AddressDTO extends DataTransferObject
{
    public $country;
    public $city;
    public $zip;
    public $street;

    public function load($data)
    {
        $this->country = $data['country'];
        $this->city = $data['city'];
        $this->zip = $data['zip'];
        $this->street = $data['street'];
    }

    /**
     * Helper
     *
     * @param $request
     * @return AddressDTO
     */
    public static function fromRequest($request)
    {
        $dto = (new self());
        $dto->load($request->post());
        return $dto;
    }
}
