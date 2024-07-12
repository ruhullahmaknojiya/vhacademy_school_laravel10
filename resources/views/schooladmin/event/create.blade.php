@extends('layouts.school_admin')
@section('title')
    EVENT-CREATE
@endsection
@push('css')
<style>
    .color-option {
        display: flex;
        align-items: center;
    }
    .color-box {
        width: 20px;
        height: 20px;
        margin-right: 10px;
    }
    .note {
        margin-top: 10px;
        font-size: 14px;
    }
</style>
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1>Add Events</h1> --}}
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{route('schoolAdmin.events.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <h5 class="form-title"><b>Create Event Information</b><a class="float-right" href="{{route('schoolAdmin.events.index')}}"><i class="fa fa-arrow-left " style="color:blue;"></i></a></h5>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Event Title <span class="login-danger">*</span></label>
                                            <input type="text" name="event_title" class="form-control" placeholder="Enter Event Title">
                                            @error('event_title')
                                            <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Event Start<span class="login-danger">*</span></label>
                                            <input type="datetime-local" name="start_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Event End<span class="login-danger">*</span></label>
                                            <input type="datetime-local" name="end_date" class="form-control" required>
                                            @error('end_date')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Color<span class="login-danger">*</span></label>
                                            <select name="color" class="form-control" required>
                                                <option value="">Please Select Color</option>
                                                <option value="#FF0000" data-color="#FF0000">Hindu Calendar Day Special (Red)</option>
                                                <option value="#008000" data-color="#008000">Muslim Calendar Day Special (Green)</option>
                                                <option value="#87CEEB" data-color="#87CEEB">Parsi Calendar Day Special (Sky Blue)</option>
                                                <option value="#00008B" data-color="#00008B">Christian Calendar Day Special (Dark Blue)</option>
                                                <option value="#000000" data-color="#000000">Other Calendar Day Special (Black)</option>
                                                <option value="#800080" data-color="#800080">School Special (Purple)</option>
                                            </select>
                                            @error('color')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Description<span class="login-danger">*</span></label>
                                            <input type="text" name="short_Description" class="form-control" placeholder="Enter Short Description">
                                            @error('short_Description')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Event Image<span class="login-danger">*</span></label>
                                            <input type="file" name="event_image" class="form-control">
                                            @error('event_image')
                                            <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Event Pdf</label>
                                            <input type="file" name="event_pdf" class="form-control">
                                            @error('event_pdf')
                                            <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Event Link</label>
                                            <input type="url" name="event_video" class="form-control" placeholder="Enter Event Link">
                                            @error('event_video')
                                            <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group local-forms mt-4">
                                            <input type="checkbox" name="repeated" id="repeated">
                                            <label>&nbsp;Event Repeated</label>
                                            @error('repeated')
                                            <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="note">
                                <p><strong>Note:</strong></p>
                                <ul>
                                    <li>Hindu Calendar Day Special - Red</li>
                                    <li>Muslim Calendar Day Special - Green</li>
                                    <li>Parsi Calendar Day Special - Sky Blue</li>
                                    <li>Christian Calendar Day Special - Dark Blue</li>
                                    <li>Other Calendar Day Special - Black</li>
                                    <li>School Special - Purple</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.querySelector('select[name="color"]');
        const options = selectElement.querySelectorAll('option');

        options.forEach(option => {
            if (option.value) {
                const colorBox = document.createElement('div');
                colorBox.classList.add('color-box');
                colorBox.style.backgroundColor = option.value;

                const optionText = document.createTextNode(' ' + option.textContent);

                const span = document.createElement('span');
                span.classList.add('color-option');
                span.appendChild(colorBox);
                span.appendChild(optionText);

                option.innerHTML = '';
                option.appendChild(span);
            }
        });

        selectElement.addEventListener('change', function() {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const color = selectedOption.getAttribute('data-color');
            selectElement.style.backgroundColor = color;

            if (!color || color === '#FFFF00' || color === '#000000') {
                selectElement.style.color = '#000000'; // Set text color to black for no selection, yellow, or black
            } else {
                selectElement.style.color = '#FFFFFF'; // Set text color to white for other colors
            }
        });

        // Initial selection styling
        const initialSelectedOption = selectElement.options[selectElement.selectedIndex];
        if (initialSelectedOption) {
            const initialColor = initialSelectedOption.getAttribute('data-color');
            selectElement.style.backgroundColor = initialColor;

            if (!initialColor || initialColor === '#FFFF00' || initialColor === '#000000') {
                selectElement.style.color = '#000000'; // Set initial text color to black for no selection, yellow, or black
            } else {
                selectElement.style.color = '#FFFFFF'; // Set initial text color to white for other colors
            }
        }
    });
</script>
@endpush
@endsection
