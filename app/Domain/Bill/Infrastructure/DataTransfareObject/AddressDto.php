<?php

class AddressDto extends DataTransfareObject
{
    public $country;
    public $city;
    public $zip;
    public $lines;

    public function load($data)
    {
        $this->country = $data['country'];
    }

    public static function fromRequest($request)
    {
        return (new self())->load($request->post());
    }

}
