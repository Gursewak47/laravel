<?php

namespace App\Repositories\Employee;

use App\Models\EmployeeBankAccount;

class EmployeeBankAccountRepository
{
    public function getEmployeeBankAccountById(int $id, array $relations=[]): EmployeeBankAccount
    {
        return EmployeeBankAccount::with($relations)->findOrFail($id);
    }


    public function storeEmployeeBankAccount($employee, array $request)
    {
        $employeeBankAccounts = collect();
        if (! is_null($request)) {
            foreach ($request as $employeeBankAccountRequest) {
                $employeeBankAccount = new EmployeeBankAccount();
                if (!is_null(@$employeeBankAccountRequest['id'])) {
                    $employeeBankAccount = EmployeeBankAccount::findOrFail($employeeBankAccountRequest['id']);
                }
                $employeeBankAccount->fill($employeeBankAccountRequest);
                $employeeBankAccount->employee()->associate($employee);
                $employeeBankAccount->save();
                $employeeBankAccounts->push($employeeBankAccount);
            }
        }
    }
}
