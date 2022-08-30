<?php

class ClientController
{
    public function actionChangeAddress($clientId)
    {
        $dto = AddressDto::fromRequest($this->request);
        $this->clientService->changeAddress($clientId, $dto);

        return $clientId;
    }
}
