@extends('layouts.superadmin')

@section('title', 'Super Admin Dashboard')

@section('content_header')
<h1>Dashboard</h1>

<style>
    body {
        background-color: #f4f4f9;
    }

    .stat-box,
    .calendar {
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

</style>

@stop

@section('content')

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> --}}

<div class="content" style="height: 5pt"></div>
<!-- Main content -->
<section class="content">
    {{-- @include('flash-message') --}}

    @if(Session::has('success'))
    <div class="p-1 alert alert-success">
        {{-- <p>User Logged In.Welcome to User Dashboard</p> --}}
        {{ Session::get('success') }}
    </div>
    @endif
    {{-- @endif --}}
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            @foreach([
            ['bg-warning', 'fas fa-money-bill-wave', 'School', $schools],
            ['bg-info', 'fas fa-user-graduate', 'Students', $studentsCount],
            ['bg-success', 'fas fa-check-circle', 'Total Boy', $totalBoys],
            ['bg-danger', 'fas fa-exclamation-circle', 'Total Girl', $totalGirls],
            ['bg-primary', 'fas fa-chalkboard-teacher', 'Teachers', $teachersCount],
            ['bg-secondary', 'fas fa-user-friends', 'Parents', $parentsCount]
            ] as [$bg, $icon, $text, $number])
            <div class="col-12 col-sm-6 col-md-2">
                <div class="mb-3 info-box">
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
                @if(Session::has('success'))
                <h5 class="alert alert-success">{{Session::get('success') }}</h5>
                @endif

                @if(Session::has('error'))
                <h5 class="alert alert-success">{{Session::get('error') }}</h5>
                @endif
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
                <div class="mb-2 info-box">
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
                    <div id="modalEventLinks">
                        <a href="#" id="modalEventPDF" class="btn btn-primary disabled" target="_blank" disabled>Open PDF</a>
                        <a href="#" id="modalEventVideo" class="btn btn-secondary disabled" target="_blank" disabled>Open Video</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="videoPlayerModal" tabindex="-1" role="dialog" aria-labelledby="videoPlayerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoPlayerModalLabel">Video Player</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <video id="videoPlayer" controls style="width: 100%;">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar1');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['dayGrid', 'interaction']
            , editable: true
            , selectable: true
            , height: 480
            , contentHeight: 490
            , events: [
                @foreach($events as $event) {
                    id: '{{ $event->id }}',
                    title: '{{ $event->event_title }}'
                    , start: '{{ $event->start_date }}'
                    , end: '{{ $event->end_date }}'
                    , backgroundColor: '{{ $event->color }}'
                    , borderColor: '{{ $event->color }}'
                    , description: '{{ $event->short_Description }}'
                    , pdfLink: '{{ $event->event_pdf }}',
                    videoLink: '{{ $event->event_video }}'
                }
                , @endforeach
            ]
            , eventClick: function(info) {
                document.getElementById('modalEventTitle').textContent = info.event.title;
                document.getElementById('modalEventDescription').textContent = info.event.extendedProps.description;


                var pdfLink = info.event.extendedProps.pdfLink ? '/storage/app/public/admin/event/' + info.event.extendedProps.pdfLink : null;
                var videoLink = info.event.extendedProps.videoLink;

                var pdfButton = document.getElementById('modalEventPDF');
                var videoButton = document.getElementById('modalEventVideo');

                if (pdfLink) {
                    pdfButton.href = pdfLink;
                    pdfButton.classList.remove('disabled');
                    pdfButton.removeAttribute('disabled');
                } else {
                    pdfButton.href = '#';
                    pdfButton.classList.add('disabled');
                    pdfButton.setAttribute('disabled', 'disabled');
                }

                if (videoLink) {
                    videoButton.href = '#';
                    videoButton.classList.remove('disabled');
                    videoButton.removeAttribute('disabled');
                    videoButton.setAttribute('data-video', videoLink);
                } else {
                    videoButton.href = '#';
                    videoButton.classList.add('disabled');
                    videoButton.setAttribute('disabled', 'disabled');
                }

                // Show the modal
                $('#eventModal').modal('show');
            }
            , eventDrop: function(info) {
                var eventId = info.event.id;
                var newStartDate = moment(info.event.start).format('YYYY-MM-DD HH:mm:ss'); // Format the start date
                var newEndDate = info.event.end ? moment(info.event.end).format('YYYY-MM-DD HH:mm:ss') : null; // Format the end date

                // AJAX request to update the event start and end dates in the database
                $.ajax({
                    url: '{{ route('update.event.date') }}', // Use Blade to generate the URL
                    method: 'POST'
                    , data: {
                        id: eventId
                        , start_date: newStartDate
                        , end_date: newEndDate
                        , _token: '{{ csrf_token() }}' // CSRF token for security
                    }
                    , success: function(response) {
                        alert('Event dates updated successfully.');
                    }
                    , error: function(xhr, status, error) {
                        alert('Error updating event dates.');
                        console.log(xhr.responseText); // Log the error response for debugging
                    }
                });
            }
        });
        calendar.render();

        // Handle video button click to open video in video player
        document.getElementById('modalEventVideo').addEventListener('click', function(event) {
            var videoLink = event.currentTarget.getAttribute('data-video');
            if (videoLink) {
                var videoPlayerModal = new bootstrap.Modal(document.getElementById('videoPlayerModal'));
                var videoPlayer = document.getElementById('videoPlayer');
                videoPlayer.src = videoLink;
                videoPlayerModal.show();
            }
        });
    });

</script>
@endpush
