<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Holiday;
use App\Models\Attendance;
use Faker\Factory as Faker;

class AttendancesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $students = Student::all();
        $holidays = Holiday::all();

        foreach ($students as $student) {
            for ($i = 0; $i < 30; $i++) {
                $attendanceDate = $faker->dateTimeThisMonth();
                $holiday = $holidays->where('start_date', '<=', $attendanceDate->format('Y-m-d'))
                                    ->where('end_date', '>=', $attendanceDate->format('Y-m-d'))
                                    ->first();

                Attendance::create([
                    'student_id' => $student->id,
                    'attendance_date' => $attendanceDate,
                    'status' => $holiday ? 'Holiday' : $faker->randomElement(['Present', 'Late', 'Absent', 'Half Day']),
                    'holiday_id' => $holiday ? $holiday->id : null,
                ]);
            }
        }
    }
}
