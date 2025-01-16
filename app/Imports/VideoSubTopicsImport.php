<?php

namespace App\Imports;

use App\Models\SubTopic;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VideoSubTopicsImport implements ToModel, WithHeadingRow
{
    public $subId;

    public function __construct($subId)
    {
        $this->subId = $subId;
    }

    public function model(array $row)
    {
        if (empty($row['video_type']) || empty($row['description'])) {
            return null;
        }

        $subTopics = new SubTopic([
            'video' => $row['video'],
            'type' => $row['video_type'],
            'description' => $row['description'],
            'subject_id' => $this->subId,
        ]);

        @dd($subTopics);
    }
}
