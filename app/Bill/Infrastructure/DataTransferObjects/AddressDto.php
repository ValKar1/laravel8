<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\DataTransferObjects;

class AddressDto extends DataTransferObject
{
    public $country;
    public $city;
    public $zip;
    public $lines;

    public function load($data)
    {
        $this->country = $data['country'];
    }

    /**
     * Helper
     *
     * @param $request
     */
    public static function fromRequest($request)
    {
        return (new self())->load($request->post());
    }

}
