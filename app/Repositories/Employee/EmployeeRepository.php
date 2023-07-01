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


    public function storeEmployee(EmployeeData $employeeData): Employee
    {
        $employee =new Employee();
        $employee->fill($employeeData->toArray());
        $employee->save();
        return $employee;
    }


    public function updateEmployee(Employee $employee, EmployeeData $employeeData): Employee
    {
        $employee->fill($employeeData->toArray());
        $employee->update();
        return $employee;
    }


    public function deleteEmployee(Employee $employee): bool
    {
        return $employee->delete();
    }
}
