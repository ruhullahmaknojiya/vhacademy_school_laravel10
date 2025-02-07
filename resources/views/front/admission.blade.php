@extends('front.layouts.app')

@section('frontend-content')

<style>
    .accordion-button {
        font-size: 18px;
        font-weight: bold;
        background-color: white;
        color: #333;
        border: 1px solid #ddd;
        transition: all 0.3s ease-in-out;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: #28a745;
    }

    .accordion-button:not(.collapsed) {
        background-color: #28a745;
        color: white;
    }

    .accordion-body {
        font-size: 16px;
        color: #555;
        padding: 15px;
        background-color: #f9f9f9;
        border-left: 3px solid #28a745;
    }

    .accordion-item {
        border-radius: 5px;
        overflow: hidden;
        border: 1px solid #ddd;
    }

    .accordion-item+.accordion-item {
        margin-top: 12px;
    }

    /* Styling for Plus and Minus Icons */
    .accordion-button .icon {
        font-size: 18px;
        color: #28a745;
        transition: all 0.3s ease;
    }

    .accordion-button:not(.collapsed) .icon {
        color: white;
    }

</style>

<!-- Hero Section -->
<section class="mt-3 hero bg-light">
    <div class="container mt-3 text-center">
        <h1 class="mt-3 fw-bold">Admissions at VHM Academy</h1>
        <p class="lead">We welcome new students to join our institution and excel in academics.</p>
        <a href="#apply-now" class="mt-3 btn btn-primary">Apply Now</a>
    </div>
</section>

<!-- Admission Process -->
<section class="py-5 admission-process">
    <div class="container">
        <h2 class="mb-4 text-center">Our Admission Process</h2>
        <div class="text-center row">
            <div class="col-md-4">
                <div class="p-4 border rounded shadow">
                    <span class="fa fa-file-text fa-3x text-primary"></span>
                    <h4 class="mt-3">Step 1: Submit Application</h4>
                    <p>Fill out the online application form and provide necessary documents.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded shadow">
                    <span class="fa fa-users fa-3x text-success"></span>
                    <h4 class="mt-3">Step 2: Interview & Assessment</h4>
                    <p>Attend a brief interview with our faculty and take a simple assessment.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded shadow">
                    <span class="fa fa-check-circle fa-3x text-warning"></span>
                    <h4 class="mt-3">Step 3: Admission Confirmation</h4>
                    <p>Once selected, complete the admission fee payment to secure your seat.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Admission Requirements -->
<section class="py-5 requirements bg-light">
    <div class="container">
        <h2 class="mb-4 text-center">Admission Requirements</h2>
        <ul class="list-group">
            <li class="list-group-item"><i class="fa fa-check text-success"></i> Completed Application Form</li>
            <li class="list-group-item"><i class="fa fa-check text-success"></i> Birth Certificate / ID Proof</li>
            <li class="list-group-item"><i class="fa fa-check text-success"></i> Previous Academic Records</li>
            <li class="list-group-item"><i class="fa fa-check text-success"></i> Passport-size Photographs</li>
            <li class="list-group-item"><i class="fa fa-check text-success"></i> Transfer Certificate (if applicable)</li>
        </ul>
    </div>
</section>

<!-- FAQ Section -->
{{-- <section class="py-5 faq bg-light">
    <div class="container">
        <h2 class="mb-4 text-center fw-bold">Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">

            <!-- Question 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        <span class="form-control">What are the admission deadlines?</span>
                        <i class="fa fa-plus icon"></i>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Admissions are open throughout the year, but we recommend applying early to secure your seat.
                    </div>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="mt-3 accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                        <span>Is financial aid available?</span>
                        <i class="fa fa-plus icon"></i>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, we offer scholarships and financial aid based on merit and need. Contact us for more details.
                    </div>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="mt-3 accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                        <span>Can I visit the campus before applying?</span>
                        <i class="fa fa-plus icon"></i>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes! We encourage prospective students to visit our campus. Schedule a visit through our contact page.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> --}}

<section class="py-5 faq bg-light">
    <div class="container">
        <h2 class="mb-4 text-center fw-bold">Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-container">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            <span class="form-control">What are the admission deadlines?</span>
                            <i class="fa fa-plus icon"></i>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Admissions are open throughout the year, but we recommend applying early to secure your seat.
                        </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="mt-3 accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                            <span>Is financial aid available?</span>
                            <i class="fa fa-plus icon"></i>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, we offer scholarships and financial aid based on merit and need. Contact us for more details.
                        </div>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="mt-3 accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                            <span>Can I visit the campus before applying?</span>
                            <i class="fa fa-plus icon"></i>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes! We encourage prospective students to visit our campus. Schedule a visit through our contact page.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>



<!-- Apply Now -->
<section id="apply-now" class="py-5 text-center text-white apply-now bg-primary">
    <div class="container">
        <h2 class="mb-3">Ready to Join Us?</h2>
        <p>Apply now and start your journey with VHM Academy.</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Contact Admissions</a>
    </div>
</section>

@endsection

@push('js')
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $(".accordion-button").click(function() {
            // Reset all icons to plus
            $(".accordion-button").find("i").removeClass("fa-minus").addClass("fa-plus");

            // If this accordion is open, change the icon to minus
            if (!$(this).hasClass("collapsed")) {
                $(this).find("i").removeClass("fa-plus").addClass("fa-minus");
            }
        });
    });

</script>
@endpush
