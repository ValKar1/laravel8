<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\DTOs;

use App\Common\Infrastructure\DataTransferObject;

class ClientDTO extends DataTransferObject
{
    public $firstname;
    public $lastname;

    public $country;
    public $city;
    public $zip;
    public $street;

    public $phoneCountryCode;
    public $phoneCityCode;
    public $phoneNumber;

    public function load($data)
    {
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];

        $this->country = $data['country'];
        $this->city = $data['city'];
        $this->zip = $data['zip'];
        $this->street = $data['street'];

        $this->phoneCountryCode = $data['phone']['country_code'];
        $this->phoneCityCode = $data['phone']['city_code'];
        $this->phoneNumber = $data['phone']['number'];
    }

    /**
     * @param $request
     * @return ClientDTO
     */
    public static function fromRequest($request): ClientDTO
    {
        $dto = (new self());
        $dto->load($request->post());
        return $dto;
    }
}
