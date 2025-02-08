<?php


namespace App\Imports;

use App\Models\SubTopic;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VideoImport implements ToModel, WithHeadingRow
{
    protected $mediumId;
    protected $standardId;
    protected $subjectId;
    protected $topicId; // Added topic ID

    public function __construct($mediumId, $standardId, $subjectId, $topicId)
    {
        $this->mediumId = $mediumId;
        $this->standardId = $standardId;
        $this->subjectId = $subjectId;
        $this->topicId = $topicId; // Store topic ID
    }

    public function model(array $row)
    {
        Log::info("Processing Row:", $row);
        Log::info("Importing with Topic ID: {$this->topicId}");

        return new SubTopic([
            'video'          => trim($row['video']),
            'type'           => trim($row['video_type']),
            'description'    => trim($row['description']),
            'vhm_start_title' => trim($row['vhm_start_title']),
            'vhm_end_title'   => trim($row['vhm_end_title']),
            'medium_id'      => $this->mediumId,
            'standard_id'    => $this->standardId,
            'subject_id'     => $this->subjectId,
            'topic_id'       => $this->topicId,
        ]);
    }
}
