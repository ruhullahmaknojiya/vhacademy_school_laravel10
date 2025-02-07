@extends('front.layouts.app')

@section('frontend-content')
<style>
    .card-img-top {
        width: 100%;
        border-radius: 12px;
    }

</style>


<section class="mt-3 hero bg-light">
    <div class="container text-center">
        <h1 class="fw-bold">Explore Our Courses</h1>
        <p class="lead">Find the right course for your learning journey.</p>
    </div>
</section>

<!-- Course Categories -->
<section class="py-4 course-categories">
    <div class="container text-center">
        <button class="mx-2 btn btn-outline-primary filter-btn" data-filter="all">All</button>
        @php
        $mediums = \App\Models\Medium::all();
        @endphp

        @foreach ($mediums as $medium)
        <button class="mx-2 btn btn-outline-primary filter-btn medium" data-medium="{{ $medium->medium_name }}" data-medium-id="{{ $medium->id }}">
            {{ $medium->medium_name }}
        </button>
        @endforeach
    </div>
</section>



<!-- Courses Listing -->
<section class="py-5 courses">
    <div class="container">
        <div class="row" id="standards_container">
            @foreach($standards as $standard)
            <div class="mb-4 col-md-4 course-item">
                <div class="border-0 shadow card">
                    <img src="{{ asset('images/blog/3.jpg') }}" class="card-img-top" alt="Course Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $standard->medium->medium_name }}</h5>
                        <p class="card-text standard-show-medium">{{ $standard->standard_name }}</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call-to-Action -->
<section class="py-5 text-center text-white apply-now bg-primary">
    <div class="container">
        <h2 class="mb-3">Start Learning Today</h2>
        <p>Enroll now and upgrade your skills with our expert-led courses.</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Contact Us</a>
    </div>
</section>

@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $(".filter-btn").click(function() {
            let selectedStandard = $(this).attr("data-standard");

            $(".standard-show-medium").html(selectedStandard);
        });
    });

</script>
<script>
    $(document).ready(function() {
        $(".medium").click(function(e) {
            e.preventDefault();

            var mediumName = $(this).data('medium');
            var mediumId = $(this).data('medium-id');

            $("#medium_name").text(mediumName);

            $.ajax({
                type: "GET"
                , url: "{{ url('/get-standards') }}/" + mediumId,
                dataType: "json"
                , success: function(response) {
                    var courseItems = "";
                    if (response.length > 0) {
                        $.each(response, function(key, value) {
                            courseItems += `
                                <div class="mb-4 col-md-4 course-item">
                                    <div class="border-0 shadow card">
                                        <img src="{{ asset('images/blog/3.jpg') }}" class="card-img-top" alt="Course Image">
                                        <div class="card-body">
                                            <h5 class="card-title">${mediumName}</h5>
                                            <p class="card-text standard-show-medium">${value.standard_name}</p>
                                            <a href="#" class="btn btn-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                    } else {
                        courseItems = `<p class="text-center text-danger">No standards available for ${mediumName}</p>`;
                    }
                    $("#standards_container").html(courseItems); // Update courses dynamically
                }
            });

        });

        // Show All Courses
        $(".filter-btn[data-filter='all']").click(function() {
            $("#standards_container").html(`
                @foreach($standards as $standard)
                    <div class="mb-4 col-md-4 course-item">
                        <div class="border-0 shadow card">
                            <img src="{{ asset('images/logo.png') }}" class="card-img-top" alt="Course Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $standard->medium->medium_name }}</h5>
                                <p class="card-text standard-show-medium">{{ $standard->standard_name }}</p>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            `);
        });

    });

</script>



<script>
    $(document).ready(function() {
        $(".filter-btn").click(function() {
            let selectedMedium = $(this).attr("data-medium");
            let selectedStandard = $(this).attr("data-standard");

            $(".course-item").each(function() {
                if (selectedMedium) {
                    $(this).find(".course-title").text(selectedMedium); // Update Medium Name
                }
                if (selectedStandard) {
                    $(this).find(".course-standard").text(selectedStandard); // Update Standard Name
                }
            });
        });
    });

</script>

<script>
    // Course Filtering Script
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', () => {
            let filter = button.getAttribute('data-filter');
            document.querySelectorAll('.course-item').forEach(item => {
                if (filter === "all" || item.getAttribute('data-category') === filter) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    });

</script>
@endpush
