<?php

namespace App\Imports;

use App\Models\Event;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Exception;


class EventsImport implements ToCollection, WithHeadingRow
{
    public $results = [];

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $existingEvent = Event::where('event_title', $row['event_title'])->first();
            if ($existingEvent) {
                $this->results[] = [
                    'row' => $row,
                    'status' => 'duplicate',
                    'errors' => ['Event with this title already exists']
                ];
                throw new Exception('Duplicate event found: ' . $row['event_title']);
            }
        }

        foreach ($rows as $row) {
            $event = Event::create([
                'event_title' => $row['event_title'],
                'event_image' => $row['event_image'],
                'repeated' => $row['repeated'],
                'event_video' => $row['event_video'],
                'event_pdf' => $row['event_pdf'],
                'start_date' => \Carbon\Carbon::parse($row['start_date']),
                'end_date' => \Carbon\Carbon::parse($row['end_date']),
                'short_Description' => $row['short_description'],
                'school_id' => $row['school_id'],
                'color' => $row['color'],
            ]);
            $this->results[] = [
                'row' => $row,
                'status' => 'success',
                'event' => $event
            ];
        }
    }
}
