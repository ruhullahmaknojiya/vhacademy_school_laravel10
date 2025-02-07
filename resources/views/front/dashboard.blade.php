@extends('front.layouts.app')



@section('frontend-content')

<style>
    .content {
        display: none;

    }

    .read-more-container {
        max-width: 600px;
        margin: auto;
        text-align: justify;
    }

    .read-more-btn {
        color: blue;
        cursor: pointer;
        border: none;
        background: none;
        font-size: 16px;
        text-decoration: underline;
    }


    .whatsapp-float {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #25D366;

        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        z-index: 1000;
    }

    .whatsapp-float:hover {
        transform: scale(1.1);
        box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.4);
    }

    .whatsapp-float i {
        font-size: 30px;
        color: black;
    }

</style>

<div class="hero-slide owl-carousel site-blocks-cover">
    <div class="intro-section" style="background-image: url('{{ asset('front/images/hero_1.jpg') }}');">

        <div class="container">
            <div class="row align-items-center">
                <div class="mx-auto text-center col-lg-12" data-aos="fade-up">
                    <h1>Vh-Academics University</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="intro-section" style="background-image: url('{{ asset('front/images/hero_1.jpg') }}');">

        <div class="container">
            <div class="row align-items-center">
                <div class="mx-auto text-center col-lg-12" data-aos="fade-up">
                    <h1>You Can Learn Anything</h1>
                </div>
            </div>
        </div>
    </div>

</div>


<div>

<div class="site-section">
    <div class="container">
        <div class="mb-5 text-center row justify-content-center">
            <div class="mb-5 col-lg-4">
                <h2 class="mb-5 section-title-underline">
                    <span>VHM Academy Works</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="mb-4 col-lg-4 col-md-6 mb-lg-0">

                <div class="border feature-1">
                    <div class="icon-wrapper bg-success">
                        <span class="text-white flaticon-mortarboard"></span>
                    </div>
                    <div class="feature-1-content">
                        <h2>Personalize Learning</h2>
                        <p>Personalized learning tailors educational experiences to each student’s strengths, needs, and interests. It allows learners to progress at their own pace, receive customized resources, and benefit from adaptive technologies that enhance understanding.</p>
                        <p><a href="#" class="px-4 btn btn-primary rounded-0">Learn More</a></p>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-lg-4 col-md-6 mb-lg-0">
                <div class="border feature-1">
                    <div class="icon-wrapper bg-info">
                        <span class="text-white flaticon-school-material"></span>
                    </div>
                    <div class="feature-1-content">
                        <h2>Trusted Courses</h2>
                        <p>Our courses are designed and curated by industry experts, ensuring high-quality content that meets educational standards. With a focus on practical knowledge, these courses help learners gain skills that are relevant in today’s competitive job market</p>
                        <p><a href="#" class="px-4 btn btn-primary rounded-0">Learn More</a></p>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-lg-4 col-md-6 mb-lg-0">
                <div class="border feature-1">
                    <div class="icon-wrapper bg-warning">
                        <span class="text-white flaticon-library"></span>
                    </div>
                    <div class="feature-1-content">
                        <h2>Tools for Students</h2>
                        <p>We provide students with cutting-edge tools that facilitate learning, collaboration, and organization. From interactive study materials to productivity apps, these tools enhance the overall educational experience and support academic success.</p>
                        <p><a href="#" class="px-4 btn btn-primary rounded-0">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="site-section">
    <div class="container">
        <div class="mb-5 text-center row justify-content-center">
            <div class="mb-5 col-lg-6">
                <h2 class="mb-3 section-title-underline">
                    <span>Popular Standards</span>
                </h2>
                <p>
                    <span id="short-text">
                        Popular standards in education refer to widely recognized academic benchmarks that guide curriculum development and learning outcomes.
                    </span>
                    <span id="full-content" class="content">
                        These standards ensure consistency in education by setting clear expectations for students at different grade levels. Popular standards help students develop critical thinking, problem-solving, and subject-specific skills. They provide a structured framework for teachers, ensuring a comprehensive and effective learning experience across various subjects. With advancements in digital learning, these standards are now integrated into online courses, smart learning platforms, and AI-driven education systems, making it easier for students to access quality content aligned with global educational requirements. Popular standards foster a strong foundation for students, preparing them for higher education and professional success by equipping them with essential knowledge and skills.
                    </span>
                    <button class="read-more-btn btn btn-primary" onclick="toggleText()">Read More...</button>

                </p>


            </div>
        </div>

        <!-- Assuming you have a variable $courses -->
        <div class="row">
            <div class="col-12">

                <div class="owl-slide-3 owl-carousel">
                    @foreach ($standards as $standard)
                    <div class="course-1-item">
                        <figure class="thumnail">
                            <a href="#"><img src="{{ asset('front/images/course_1.jpg') }}" alt="Image" class="img-fluid"></a>
                            <div class="category">
                                @if($standard->standard_name)
                                @php
                                $topicCount = optional($topicsCountPerStandard->firstWhere('standard_id', $standard->id))->topic_count ?? 0;
                                @endphp
                                <h5>{{ $standard->standard_name }}
                                    <span class="float-right">
                                        (Lectures: {{ $topicCount }})</h5>
                                </span>
                                @else
                                <h3>No Standard</h3>
                                @endif
                            </div>
                        </figure>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>




<div class="about-section" style="background-image: url('{{ asset('images/portfolio/1.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2 class="section-title-underline style-2">
                    <span>About Our Vhacademy</span>
                </h2>
            </div>
            <div class="col-lg-8">
                <p class="lead">At Vhacademy, we are committed to providing a transformative learning experience that empowers students to excel academically and professionally. Our institution blends modern teaching methodologies with innovative digital learning tools to create an engaging and effective educational environment.</p>
                <p>We offer diverse courses, tailored curriculums, and expert-led training that foster critical thinking, creativity, and leadership skills. Our faculty members are dedicated professionals who guide students with a hands-on approach, ensuring they gain practical knowledge and real-world experience.</p>
                <p>With a strong focus on personalized learning, we utilize cutting-edge technology, AI-driven assessments, and interactive modules to help students maximize their potential. Our commitment to excellence, inclusivity, and student success makes Vhacademy a leading educational institution</p>

            </div>
        </div>
    </div>
</div>

<!-- // 05 - Block -->
<div class="site-section">
    <div class="container">
        <div class="mb-5 row">
            <div class="col-lg-4">
                <h2 class="section-title-underline">
                    <span>Testimonials</span>
                </h2>
            </div>
        </div>


        <div class="owl-slide owl-carousel">

            <div class="ftco-testimonial-1">
                <div class="mb-4 ftco-testimonial-vcard d-flex align-items-center">
                    <img src="{{ asset('front/images/person_1.jpg') }}" alt="Image" class="mr-3 img-fluid">
                    <div>
                        <h3>Allison Holmes</h3>
                        <span>Designer</span>
                    </div>
                </div>
                <div>
                    <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
                </div>
            </div>

            <div class="ftco-testimonial-1">
                <div class="mb-4 ftco-testimonial-vcard d-flex align-items-center">
                    <img src="{{ asset('front/images/person_2.jpg')}}" alt="Image" class="mr-3 img-fluid">
                    <div>
                        <h3>Allison Holmes</h3>
                        <span>Designer</span>
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                </div>
            </div>

            <div class="ftco-testimonial-1">
                <div class="mb-4 ftco-testimonial-vcard d-flex align-items-center">
                    <img src="{{ asset('front/images/person_4.jpg')}}" alt="Image" class="mr-3 img-fluid">
                    <div>
                        <h3>Allison Holmes</h3>
                        <span>Designer</span>
                    </div>
                </div>
                <div>
                    <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
                </div>
            </div>

            <div class="ftco-testimonial-1">
                <div class="mb-4 ftco-testimonial-vcard d-flex align-items-center">
                    <img src="{{ asset('front/images/person_3.jpg')}}" alt="Image" class="mr-3 img-fluid">
                    <div>
                        <h3>Allison Holmes</h3>
                        <span>Designer</span>
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                </div>
            </div>

            <div class="ftco-testimonial-1">
                <div class="mb-4 ftco-testimonial-vcard d-flex align-items-center">
                    <img src="{{ asset('front/images/person_2.jpg')}}" alt="Image" class="mr-3 img-fluid">
                    <div>
                        <h3>Allison Holmes</h3>
                        <span>Designer</span>
                    </div>
                </div>
                <div>
                    <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
                </div>
            </div>

            <div class="ftco-testimonial-1">
                <div class="mb-4 ftco-testimonial-vcard d-flex align-items-center">
                    <img src="{{ asset('front/images/person_4.jpg')}}" alt="Image" class="mr-3 img-fluid">
                    <div>
                        <h3>Allison Holmes</h3>
                        <span>Designer</span>
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                </div>
            </div>

        </div>

    </div>
</div>


<div class="section-bg style-1" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
        <div class="row">
            <div class="mb-5 col-lg-4 col-md-6 mb-lg-0">
                <span class="icon flaticon-mortarboard"></span>
                <h3>Our Philosphy</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea? Dolore, amet reprehenderit.</p>
            </div>
            <div class="mb-5 col-lg-4 col-md-6 mb-lg-0">
                <span class="icon flaticon-school-material"></span>
                <h3>Academics Principle</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?
                    Dolore, amet reprehenderit.</p>
            </div>
            <div class="mb-5 col-lg-4 col-md-6 mb-lg-0">
                <span class="icon flaticon-library"></span>
                <h3>Key of Success</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?
                    Dolore, amet reprehenderit.</p>
            </div>
        </div>
    </div>
</div>

<div class="news-updates">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="section-heading">
                    <h2 class="text-black">News &amp; Updates</h2>
                    <a href="#">Read All News</a>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="post-entry-big">
                            <a href="news-single.html" class="img-link"><img src="{{ asset('front/images/blog_large_1.jpg') }}" alt="Image" class="img-fluid"></a>
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#">June 6, 2019</a>
                                    <span class="mx-1">/</span>
                                    <a href="#">Admission</a>, <a href="#">Updates</a>
                                </div>
                                <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning Session</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4 post-entry-big horizontal d-flex">
                            <a href="news-single.html" class="mr-4 img-link"><img src="{{ asset('front/images/blog_1.jpg')}}" alt="Image" class="img-fluid"></a>
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#">June 6, 2019</a>
                                    <span class="mx-1">/</span>
                                    <a href="#">Admission</a>, <a href="#">Updates</a>
                                </div>
                                <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning Session</a></h3>
                            </div>
                        </div>

                        <div class="mb-4 post-entry-big horizontal d-flex">
                            <a href="news-single.html" class="mr-4 img-link"><img src="{{ asset('front/images/blog_2.jpg')}}" alt="Image" class="img-fluid"></a>
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#">June 6, 2019</a>
                                    <span class="mx-1">/</span>
                                    <a href="#">Admission</a>, <a href="#">Updates</a>
                                </div>
                                <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning Session</a></h3>
                            </div>
                        </div>

                        <div class="mb-4 post-entry-big horizontal d-flex">
                            <a href="news-single.html" class="mr-4 img-link"><img src="{{ asset('front/images/blog_1.jpg')}}" alt="Image" class="img-fluid"></a>
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#">June 6, 2019</a>
                                    <span class="mx-1">/</span>
                                    <a href="#">Admission</a>, <a href="#">Updates</a>
                                </div>
                                <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning Session</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">


            </div>
        </div>
    </div>
</div>

<div class="site-section ftco-subscribe-1" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h2>Subscribe to us!</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,</p>
                <a href="javascript:void(0);" class="whatsapp-float" onclick="openWhatsApp()">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
            <div class="col-lg-5">
                <form action="" class="d-flex">
                    <input type="text" class="py-3 mr-2 rounded form-control" placeholder="Enter your email">
                    <button class="px-4 py-3 rounded btn btn-primary" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    function toggleText() {
        var fullText = document.getElementById("full-content");
        var btn = document.querySelector(".read-more-btn");

        if (fullText.style.display === "none" || fullText.style.display === "") {
            fullText.style.display = "inline";
            btn.innerText = "Read Less";
        } else {
            fullText.style.display = "none";
            btn.innerText = "Read More...";
        }
    }

</script>
<script>
    function openWhatsApp() {
        window.open("https://web.whatsapp.com", "_blank");
    }

</script>



@endpush
