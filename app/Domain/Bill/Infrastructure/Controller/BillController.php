<?php

class BillController
{
    public function actionCreate($clientId)
    {
        $billId = $this->billService->create($clientId);
        return $billId;
    }
}
