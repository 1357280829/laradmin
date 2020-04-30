<?php

namespace App\Models;

class License extends Model
{
    protected $fillable = [
        'title', 'tax_no', 'legal_person', 'identity', 'phone', 'tax_declaration_account',
        'tax_declaration_password', 'personal_income_tax_account', 'personal_income_tax_password',
        'contract_period', 'monthly_report', 'quarterly_report', 'salesman'
    ];
}
