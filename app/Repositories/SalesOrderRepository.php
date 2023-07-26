<?php

namespace App\Repositories;

use App\Models\SalesOrder;

class SalesOrderRepository
{
    public function getSalesOrderById(int $id, array $relations=[]): SalesOrder
    {
        return SalesOrder::with($relations)->findOrFail($id);
    }

    public function storeSalesOrder(array $request): SalesOrder
    {
        $salesOrder = SalesOrder::create($request);

        return $salesOrder;
    }


    public function deleteSalesOrder(SalesOrder $salesOrder): bool
    {
        return $salesOrder->delete();
    }
}
