<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HomeWorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_works')->insert([
            [
                'teacher_id' => 1,
                'medium_id' => 3,
                'standard_id' => 7,
                'class_id' => 1,
                'subject_id' => 63,
                'school_id' => 1,
                'date' => '2024-06-28',
                'submition_date' => '2024-06-30',
                'submition_status' => 'complete',
                'pdf_file' => 'uploads/homework_pdfs/NWP8mvP88WObBo74TmAqQ8rqPxTElMKOIphgobEJ.pdf',
                'topic_title' => 'chapter 1 Novel Hindi',
                'topic_description' => 'write a novel in home work',
                'status' => 0,
                'created_at' => Carbon::create('2024', '06', '29', '15', '44', '15'),
                'updated_at' => Carbon::create('2024', '06', '29', '18', '26', '44'),
            ],
            [
                'teacher_id' => 1,
                'medium_id' => 3,
                'standard_id' => 7,
                'class_id' => 1,
                'subject_id' => 63,
                'school_id' => 1,
                'date' => '2024-06-28',
                'submition_date' => '2024-06-10',
                'submition_status' => 'complete',
                'pdf_file' => 'uploads/homework_pdfs/X8lt2gMaUkV21y3N3nu8EPaTVoLOJEdBbwakbIKc.pdf',
                'topic_title' => 'chapter 2 : Johnny Johnny little star',
                'topic_description' => 'write thie poem in home work note and remember it.',
                'status' => 0,
                'created_at' => Carbon::create('2024', '06', '29', '15', '46', '29'),
                'updated_at' => Carbon::create('2024', '06', '30', '12', '28', '05'),
            ],

        ]);
    }
}
