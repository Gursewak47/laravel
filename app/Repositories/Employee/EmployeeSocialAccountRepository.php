<?php

namespace App\Repositories\Employee;

use App\Models\EmployeeSocialAccount;

class EmployeeSocialAccountRepository
{
    public function getEmployeeSocialAccountById(int $id, array $relations=[]): EmployeeSocialAccount
    {
        return EmployeeSocialAccount::with($relations)->findOrFail($id);
    }


    public function storeEmployeeSocialAccount($employee, array $request)
    {
        $employeeBankAccounts = collect();
        if (! is_null($request)) {
            foreach ($request as $employeeBankAccountRequest) {
                $employeeBankAccount = new EmployeeSocialAccount();
                if (!is_null(@$employeeBankAccountRequest['id'])) {
                    $employeeBankAccount = EmployeeSocialAccount::findOrFail($employeeBankAccountRequest['id']);
                }
                $employeeBankAccount->fill($employeeBankAccountRequest);
                $employeeBankAccount->employee()->associate($employee);
                $employeeBankAccount->save();
                $employeeBankAccounts->push($employeeBankAccount);
            }
        }
    }
}
