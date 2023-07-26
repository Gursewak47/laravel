<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesOrder\StoreSalesOrderRequest;
use App\Models\SalesOrder;
use App\Repositories\SalesOrderRepository;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    public function __construct(private SalesOrderRepository $salesOrderRepository)
    {
    }

    public function index()
    {
        return SalesOrder::query()->get();
    }
    public function store(StoreSalesOrderRequest $storeSalesOrderRequest)
    {
        return $this->salesOrderRepository->storeSalesOrder($storeSalesOrderRequest->validated());
    }
    public function destory(int $id)
    {
        $this->salesOrderRepository->deleteSalesOrder($this->salesOrderRepository->getSalesOrderById($id));
    }
}
