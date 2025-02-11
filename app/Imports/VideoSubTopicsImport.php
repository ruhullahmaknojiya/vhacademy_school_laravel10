<?php

namespace App\Imports;

use App\Models\SubTopic;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VideoSubTopicsImport implements ToModel, WithHeadingRow
{
    public $subId;
    public $stopProcessing = false;

    public function __construct($subId)
    {
        $this->subId = $subId;
    }

    public function model(array $row)
    {
        if (empty($row['video']) || empty($row['video_type']) || empty($row['description'])) {
            $this->stopProcessing = true;
            return null;
        }

        $subtopics = new  SubTopic([
            'subject_id' => $this->subId,
            'video' => $row['video'],
            'type' => $row['video_type'],
            'description' => $row['description'],
        ]);

        return $subtopics;
    }
}
