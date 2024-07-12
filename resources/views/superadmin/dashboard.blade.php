@extends('layouts.superadmin')

@section('title', 'Super Admin Dashboard')

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
                    ['bg-warning', 'fas fa-money-bill-wave', 'School', $schools],
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar1');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['dayGrid', 'interaction'],
            editable: true,
            selectable: true,
            height: 480,
            contentHeight: 490,
            events: [
                @foreach($events as $event)
                {
                    title: '{{ $event->event_title }}',
                    start: '{{ $event->start_date }}',
                    end: '{{ $event->end_date }}',
                    backgroundColor: '{{ $event->color }}',
                    borderColor: '{{ $event->color }}',
                    description: '{{ $event->short_Description }}',
                    pdfLink: '{{ $event->event_pdf }}', // Update to use event_pdf
                    videoLink: '{{ $event->event_video }}'
                },
                @endforeach
            ],
             eventClick: function(info) {
                // Set modal title and description
                document.getElementById('modalEventTitle').textContent = info.event.title;
                document.getElementById('modalEventDescription').textContent = info.event.extendedProps.description;

                // Set links for PDF and video
                var pdfLink = info.event.extendedProps.pdfLink ? '/pdf/subtopic/' + info.event.extendedProps.pdfLink : null;
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
