<?php

namespace App\Repositories\Employee;

use App\DTO\EmployeeData;
use App\Models\Employee;

class EmployeeRepository
{
    public function getEmployeeById(int $id, array $relations=[]): Employee
    {
        return Employee::with($relations)->findOrFail($id);
    }


    public function storeEmployee(array $request): Employee
    {
        $employee = Employee::create($request);
        $this->saveChildRecords($employee, $request);
        return $employee->load('employee_bank_accounts');
    }

    public function saveChildRecords($employee, array $request)
    {
        (new EmployeeBankAccountRepository())->storeEmployeeBankAccount($employee, $request['employee_bank_accounts']);
    }

    public function updateEmployee(Employee $employee, array $request): Employee
    {
        if (is_int($employee)) {
            $employee = $this->getEmployeeById($employee);
        }
        $employee->fill($request);
        $this->saveChildRecords($employee, $request);
        $employee->update();
        return $employee;
    }


    public function deleteEmployee(Employee $employee): bool
    {
        return $employee->delete();
    }
}
