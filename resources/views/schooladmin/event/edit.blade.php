@extends('layouts.school_admin')
@section('title')
    EVENT-EDIT
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Event <i class="fa fa-edit"></i></h1>
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
                    <form method="post" action="{{route('schooladmin.events.update',$edit_event->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-4">
                                <h5 class="form-title"><b>Edit Event Information</b><a href="{{route('schooladmin.events.index')}}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Title <span class="login-danger">*</span></label>
                                    <input type="text" name="event_title" class="form-control" value="{{$edit_event->event_title}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Start<span class="login-danger">*</span></label>
                                    <input type="datetime-local" name="start_date" class="form-control" value="{{$edit_event->start_date}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event End<span class="login-danger">*</span></label>
                                    <input type="datetime-local" name="end_date" class="form-control" value="{{$edit_event->end_date}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Color<span class="login-danger">*</span></label>
                                    <select name="color" class="form-control" required>
                                        <option value="">Please Select Color</option>
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
                                    <input type="text" name="short_Description" class="form-control" value="{{$edit_event->short_Description}}">
                                </div>
                            </div>
                            {{-- <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Image<span class="login-danger">*</span></label>
                                    <input type="file" name="event_image" class="form-control">
                                    <img src="{{asset('public/storage/images/admin/event/'.$edit_event->event_image)}}" width="60" height="60">
                                </div>
                            </div> --}}
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Pdf<span class="login-danger">*</span></label>
                                    <input type="file" name="event_pdf" class="form-control" >
                                    @error('event_pdf')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Link<span class="login-danger">*</span></label>
                                    <input type="url" name="event_video" class="form-control" value="{{$edit_event->event_video}}" >
                                    @error('event_video')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group local-forms mt-4 ">


                                    <input type="checkbox" name="repeated" id="repeated" {{ old('repeated', $edit_event->repeated) ? 'checked' : '' }}>
                                    <label >&nbsp;Event Repeated</label>

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
