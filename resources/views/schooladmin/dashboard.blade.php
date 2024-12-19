@extends('layouts.school_admin')

@section('title', 'School Admin Dashboard')

@section('content_header')
    <h1>Dashboard</h1>

    <style>
        body {
            background-color: #f4f4f9;
        }
        .stat-box, .calendar {
            background-color: white;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .calendar {
            margin-bottom: 15px;
        }
        .user-role {
            background-color: #ffca28;
            color: white;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .user-role img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }
        .user-role span {
            font-size: 1.2em;
        }
       .holiday-background {
    background-color: yellow !important;
    color: black !important;
}
    </style>

@stop

@section('content')
    <div class="content" style="height: 5pt"></div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                @foreach([
                    ['bg-warning', 'fas fa-money-bill-wave', 'Monthly Fee Collection', $monthlyCollectedFee],
                    ['bg-info', 'fas fa-user-graduate', 'Students', $studentsCount],
                    ['bg-success', 'fas fa-check-circle', 'Total Boy', $totalBoys],
                    ['bg-danger', 'fas fa-exclamation-circle', 'Total Girl', $totalGirls],
                    ['bg-primary', 'fas fa-chalkboard-teacher', 'Teachers', $teachersCount],
                    ['bg-secondary', 'fas fa-user-friends', 'Parents', $parentsCount]
                ] as [$bg, $icon, $text, $number])
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3">
                            <span class="info-box-icon {{ $bg }} elevation-1"><i class="{{ $icon }}"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ $text }}</span>
                                <span class="info-box-number">{{ $number }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <div id="calendar1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                    @foreach([
                        ['bg-purple', 'fas fa-book', 'Medium', $mediumCount],
                        ['bg-teal', 'fas fa-school', 'Standard', $standardCount],
                        ['bg-maroon', 'fas fa-chalkboard', 'Class', $classCount],
                        ['bg-olive', 'fas fa-book-open', 'Subject', $subjectCount],
                        ['bg-navy', 'fas fa-layer-group', 'Chapter', $chapterCount],
                        ['bg-lime', 'fas fa-list', 'Topic', $topicCount]
                    ] as [$bg, $icon, $text, $number])
                        <div class="info-box mb-2">
                            <span class="info-box-icon {{ $bg }} elevation-1"><i class="{{ $icon }}"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ $text }}</span>
                                <span class="info-box-number">{{ $number }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h4 id="modalEventTitle"></h4>
                  <p id="modalEventDescription"></p>
                  <div id="modalEventLinks" style="display: none;">
                    <a href="#" id="modalEventPDF" class="btn btn-primary" target="_blank">Open PDF</a>

                  </div>
                </div>
              </div>
            </div>
          </div>


    </section>
@stop

@php
    $sundays = [];
    $date = \Carbon\Carbon::now()->startOfYear();
    while ($date->lessThanOrEqualTo(\Carbon\Carbon::now()->endOfYear())) {
        if ($date->isSunday()) {
            $sundays[] = $date->format('Y-m-d');
        }
        $date->addDay();
    }
@endphp

@push('js')
<script>
 document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar1');
    var sundays = @json($sundays); // Pass PHP array of Sundays to JavaScript

    // Collect holiday dates into an array
    var holidays = [
        @foreach($holidays as $holiday)
            '{{ $holiday->start_date }}',
        @endforeach
        // Add Sundays as holidays
        ...@json($sundays)
    ];

    var events = [
        @foreach($events as $event)
        {
            title: '{{ $event->event_title }}',
            start: '{{ $event->start_date }}',
            end: '{{ $event->end_date }}',
            backgroundColor: '{{ $event->color }}',
            borderColor: '{{ $event->color }}',
            description: '{{ $event->short_Description }}',
            pdfLink: '{{ $event->event_pdf }}',
            videoLink: '{{ $event->event_video }}'
        },
        @endforeach
        // Add holidays to the events array to enable event click and display
        @foreach($holidays as $holiday)
        {
            title: '{{ $holiday->holiday_name }}',
            start: '{{ $holiday->start_date }}',
            end: '{{ $holiday->end_date }}',
            backgroundColor: 'yellow',
            borderColor: 'yellow',
            textColor: 'black',
            type: 'Holiday',
            description: '{{ $holiday->description }}'
        },
        @endforeach
    ];

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['dayGrid', 'interaction'],
        editable: true,
        selectable: true,
        height: 480,
        contentHeight: 490,
        events: events,

        // Callback to style specific day cells (holidays)
        dayCellDidMount: function (info) {
            // Convert the date to 'YYYY-MM-DD' format
            var dateStr = info.date.toISOString().split('T')[0];

            // Check if the current date is a holiday
            if (holidays.includes(dateStr)) {
                info.el.style.backgroundColor = 'yellow'; // Set cell background color to yellow
                info.el.style.color = 'black'; // Set text color to black for better visibility
            }
        },

        eventDidMount: function (info) {
            // This callback allows for custom styling of events if needed
            if (info.event.extendedProps.type === 'Holiday') {
                // Ensure the event itself does not override the cell's yellow background
                info.el.style.backgroundColor = 'transparent';
                info.el.style.color = 'black';
            }
        },

        eventClick: function (info) {
            // Set modal title and description
            document.getElementById('modalEventTitle').textContent = info.event.title;
            document.getElementById('modalEventDescription').textContent = info.event.extendedProps.description;

            var pdfButton = document.getElementById('modalEventPDF');
            var modalEventLinks = document.getElementById('modalEventLinks');

            // If it's a holiday, hide the PDF button
            if (info.event.extendedProps.type === 'Holiday') {
                modalEventLinks.style.display = 'none';
            } else {
                var pdfLink = info.event.extendedProps.pdfLink ? '/storage/app/public/school/event/' + encodeURIComponent(info.event.extendedProps.pdfLink) : null;

                if (pdfLink) {
                    pdfButton.href = pdfLink;
                    pdfButton.classList.remove('disabled');
                    pdfButton.removeAttribute('disabled');
                } else {
                    pdfButton.href = '#';
                    pdfButton.classList.add('disabled');
                    pdfButton.setAttribute('disabled', 'disabled');
                }

                modalEventLinks.style.display = 'block';
            }

            // Show the modal
            $('#eventModal').modal('show');
        }
    });

    calendar.render();
});


</script>
@endpush
