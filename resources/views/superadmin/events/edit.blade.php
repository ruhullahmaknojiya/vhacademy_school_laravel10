@extends('layouts.superadmin')
@section('title')
    EVENT-EDIT
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
    .custom-select {
        display: flex;
        align-items: center;
    }
</style>
@endpush
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
                            <form method="post" action="{{route('superadmin.events.update', $edit_event->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <h5 class="form-title"><b>Edit Event Information</b><a href="{{route('superadmin.events.index')}}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Event Title <span class="login-danger">*</span></label>
                                            <input type="text" name="event_title" class="form-control" value="{{$edit_event->event_title}}">
                                            @error('event_title')
                                            <span class="error text-danger">{{ $message }}</span>
                                            @enderror
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
                                            @error('end_date')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Color<span class="login-danger">*</span></label>
                                            <div class="custom-select-wrapper">
                                                <select name="color" class="form-control custom-select" required>
                                                    <option value="">Please Select Color</option>
                                                    <option value="#FF0000" {{ $edit_event->color == '#FF0000' ? 'selected' : '' }}>Hindu Calendar Day Special (Red)</option>
                                                    <option value="#008000" {{ $edit_event->color == '#008000' ? 'selected' : '' }}>Muslim Calendar Day Special (Green)</option>
                                                    <option value="#87CEEB" {{ $edit_event->color == '#87CEEB' ? 'selected' : '' }}>Parsi Calendar Day Special (Sky Blue)</option>
                                                    <option value="#00008B" {{ $edit_event->color == '#00008B' ? 'selected' : '' }}>Christian Calendar Day Special (Dark Blue)</option>
                                                    <option value="#000000" {{ $edit_event->color == '#000000' ? 'selected' : '' }}>Other Calendar Day Special (Black)</option>
                                                    <option value="#800080" {{ $edit_event->color == '#800080' ? 'selected' : '' }}>School Special (Purple)</option>
                                                </select>
                                            </div>
                                            @error('color')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Description<span class="login-danger">*</span></label>
                                            <input type="text" name="short_Description" class="form-control" value="{{$edit_event->short_Description}}">
                                            @error('short_Description')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
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
                                            <label>Event Pdf</label>
                                            <input type="file" name="event_pdf" class="form-control">
                                            @error('event_pdf')
                                            <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Event Link<span class="login-danger">*</span></label>
                                            <input type="url" name="event_video" class="form-control" value="{{$edit_event->event_video}}">
                                            @error('event_video')
                                            <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group local-forms mt-4">
                                            <input type="checkbox" name="repeated" id="repeated" {{ old('repeated', $edit_event->repeated) ? 'checked' : '' }}>
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

        function updateSelectStyle() {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const color = selectedOption.getAttribute('value');
            selectElement.style.backgroundColor = color;

            if (!color || color === '#FFFF00' || color === '#000000') {
                selectElement.style.color = '#000000'; // Set text color to black for no selection, yellow, or black
            } else {
                selectElement.style.color = '#FFFFFF'; // Set text color to white for other colors
            }
        }

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

        selectElement.addEventListener('change', updateSelectStyle);

        // Initial selection styling
        updateSelectStyle();
    });
</script>
@endpush
@endsection
