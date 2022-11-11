<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Year;
use App\Models\Month;
use App\Models\Frequency;
use App\Models\IncomeCategory;
use App\Models\ExpenseCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        $expenseCategories = [
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
        ];
        foreach ($expenseCategories as $category){
            $entry = new ExpenseCategory;
            $entry->expense_category_name = $category;
            $entry->save();
        }

        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];

        foreach ($months as $month){
            $entry = new Month;
            $entry->month_name = $month;
            $entry->save();
        }

        $frequencies = [
            'Weekly' => 52,
            'Bi-Weekly' => 26,
            '1st & 15th' => 24,
            'Monthly' => 12,
            'Bi-Monthly' => 6,
            'Quartlerly' => 4,
            'Semi-Annually' => 2,
            'Annually' => 1
        ];

        foreach ($frequencies as $frequency => $timesAYear){
            $entry = new Frequency;
            $entry->frequency = $frequency;
            $entry->times_a_year = $timesAYear;
            $entry->save();
        } 

        $incomeCategories = [
            'Job 01',
            'Job 02',
            'Job 03',
            'Job 04',
            'Rental',
            'Dividend',
            'Bonus',
            'Tax Return'
        ];

        foreach ($incomeCategories as $category){
            $entry = new IncomeCategory();
            $entry->income_category_name = $category;
            $entry->save();
        }

        $years = [
            2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024,
            2025, 2026, 2027, 2028, 2029, 2030, 2031, 2032, 2033, 2034,
            2035, 2036, 2037, 2038, 2039, 2040, 2041, 2042, 2043, 2044,
            2045, 2046, 2047, 2048, 2049, 2050, 2051, 2052, 2053, 2054,
        ];

        foreach ($years as $year){
            $entry = new Year();
            $entry->year = $year;
            $entry->save();
        }

    }
}
