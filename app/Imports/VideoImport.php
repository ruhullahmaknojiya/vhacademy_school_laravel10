<?php


namespace App\Imports;

use App\Models\SubTopic;
use Illuminate\Support\Facades\Log;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\Subject;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VideoImport implements ToModel, WithHeadingRow
{
    public $subjectId;
    public $standardId;
    public $mediumId;

    public function __construct($subjectId, $standardId, $mediumId)
    {
        $this->subjectId = $subjectId;
        $this->standardId = $standardId;
        $this->mediumId = $mediumId;
    }

    public function model(array $row)
    {

        if (!isset($row['unit'], $row['video'], $row['video_type'], $row['description'], $row['vhm_start_title'], $row['vhm_end_title'])) {
            Log::error('Skipping invalid row: ' . json_encode($row));
            return null;
        }

        try {
            return   new SubTopic([
                'video'          => trim($row['video']),
                'type'     => trim($row['video_type']),
                'description'    => trim($row['description']),
                'vhm_start_title' => trim($row['vhm_start_title']),
                'vhm_end_title'   => trim($row['vhm_end_title']),
                'topic_id'       => trim($row['unit']),
                'medium_id'      => $this->mediumId,
                'standard_id'    => $this->standardId,
                'subject_id'     => $this->subjectId,
            ]);
        } catch (\Exception $e) {
            Log::error('Error inserting row: ' . json_encode($row) . ' Error: ' . $e->getMessage());
            return null;
        }
    }
}
