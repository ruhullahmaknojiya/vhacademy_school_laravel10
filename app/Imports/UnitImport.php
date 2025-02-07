<?php

namespace App\Imports;

use App\Models\Topic;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\Subject;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UnitImport implements ToModel, WithHeadingRow
{
    public $subjectId;
    public $standardId;
    public $mediumId;
    public $stopProcessing = false;

    public function __construct($subjectId, $standardId, $mediumId)
    {

        $this->subjectId = $subjectId;
        $this->standardId = $standardId;
        $this->mediumId = $mediumId;
    }

    public function model(array $row)
    {
        // dd($row);
        // Check for empty rows
        // if ($row['unit']) || empty($row['unit_type']) || empty($row['description'])) {
        //     $this->stopProcessing = true;
        //     return null;
        // }



        // Validate foreign key references before insertion
        if (!Medium::find($this->mediumId) || !Standard::find($this->standardId) || !Subject::find($this->subjectId)) {
            $this->stopProcessing = true;
            return null;
        }


        return  new Topic([
            'sub_id' => $this->subjectId,
            'standard_id' => $this->standardId,
            'medium_id' => $this->mediumId,
            'topic' => $row['unit'],
            'type' => $row['unit_type'],
            'description' => $row['description'],
        ]);
    }
}
