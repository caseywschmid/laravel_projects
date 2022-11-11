<?php

namespace Database\Factories;

use App\Models\ExpenseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExpenseCategory>
 */
class ExpenseCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            $categories = [
                'Housing - Mortgage',
                'Housing - Rent',
                'Housing - Property Taxes',
                'Housing - Household Repairs',
                'Housing - HOA Fees',
                'Transportation - Car Payment',
                'Transportation - Car Warranty',
                'Transportation - Gas',
                'Transportation - Tires',
                'Transportation - Car Maintenance',
                'Transportation - Parking Fees',
                'Transportation - Car Repairs',
                'Transportation - Car Registration',
                'Food - Groceries',
                'Food - Restaurants',
                'Food - Pet Food',
                'Utilities - Electricity',
                'Utilities - Cell Phone Plan',
                'Utilities - Water',
                'Utilities - Gas',
                'Utilities - Garbage',
                'Utilities - Phones',
                'Utilities - Cable',
                'Utilities - Internet',
                'Clothing - Adults’ Clothing',
                'Clothing - Adults’ Shoes',
                'Clothing - Children’s Clothing',
                'Clothing - Children’s Shoes',
                'Medical - Primary Care',
                'Medical - Dental Care',
                'Medical - Specialty Care',
                'Medical - Urgent Care',
                'Medical - Medications',
                'Medical - Medical Devices',
                'Insurance - Health',
                'Insurance - Homeowner’s',
                'Insurance - Renter’s',
                'Insurance - Home Warranty',
                'Insurance - Auto',
                'Insurance - Life',
                'Insurance - Disability',
                'Household - Toiletries',
                'Household - Cleaning Supplies',
                'Household - Tools',
                'Personal - Gym Memberships',
                'Personal - Haircuts',
                'Personal - Salon Services',
                'Personal - Cosmetics',
                'Personal - Babysitter',
                'Personal - Subscriptions',
                'Debt - Personal Loans',
                'Debt - Student Loans',
                'Debt - Credit Cards',
                'Retirement - Financial Planning',
                'Retirement - Investing',
                'Education - Children’s College',
                'Education - Your College',
                'Education - School Supplies',
                'Education - Books',
                'Savings - Emergency Fund',
                'Savings - Big Purchases',
                'Savings - Other Savings',
                'Gifts/Donations - Birthday',
                'Gifts/Donations - Anniversary',
                'Gifts/Donations - Wedding',
                'Gifts/Donations - Christmas',
                'Gifts/Donations - Special Occasion',
                'Gifts/Donations - Charities',
                'Entertainment - Alcohol',
                'Entertainment - Games',
                'Entertainment - Movies',
                'Entertainment - Concerts',
                'Entertainment - Vacations',
                'Entertainment - Subscriptions'
            ]
        ];
        foreach ($categories as $category){
            $entry = new ExpenseCategory;
            $entry->expense_category_name = $category;
            $entry->save();
        }
    }
}
