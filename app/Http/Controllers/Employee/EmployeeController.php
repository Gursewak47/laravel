<?php

namespace App\Http\Controllers\Employee;

use App\DTO\EmployeeData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Repositories\Employee\EmployeeRepository;

class EmployeeController extends Controller
{
    public function __construct(private EmployeeRepository $employeeRepository)
    {
    }

    public function index()
    {
        return Employee::query()->get();
    }


    public function show(int $id)
    {
        return $this->employeeRepository->getEmployeeById($id);
    }



    public function store(StoreEmployeeRequest $storeEmployeeRequest)
    {
        return $this->employeeRepository->storeEmployee($storeEmployeeRequest->validated());
    }


    public function update(UpdateEmployeeRequest $updateEmployeeRequest, int $id)
    {
        $user = $this->employeeRepository->getEmployeeById($id);
        return $this->employeeRepository->updateEmployee($user, $updateEmployeeRequest->validated());
    }

    /**
     * @param int $id
     * @return void
     */
    public function destory(int $id)
    {
        $this->employeeRepository->deleteEmployee($this->employeeRepository->getEmployeeById($id));
    }
}
