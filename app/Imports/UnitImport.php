<?php

namespace App\Imports;

use App\Models\Topic;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UnitImport implements ToModel, WithHeadingRow
{
    public $subId;
    public $stopProcessing = false;

    public function __construct($subId)
    {
        $this->subId = $subId;
    }

    public function model(array $row)
    {

        if (empty($row['unit']) || empty($row['unit_type']) || empty($row['description'])) {
            $this->stopProcessing = true;
            return null;
        }


        $topic = new  Topic([
            'sub_id' => $this->subId,
            'topic' => $row['unit'],
            'type' => $row['unit_type'],
            'description' => $row['description'],
        ]);



        return $topic;
    }
}
