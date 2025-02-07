@extends('layouts.superadmin')

@section('title')
Topics
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">

            <div class="col-sm-6">
                <h1 class="m-0">ContactUs</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <button class="btn btn-danger removeAll">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-3 card">
                    <div class="card-header">
                        <div class="card-title d-flex w-100 justify-content-between">
                            <h4>ContactUs List</h4>
                            <form action="{{ route('contact-us.index') }}" method="get" style="display: flex;">
                                <input type="search" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}">&nbsp;&nbsp;
                                <button type="submit" class="mx-1 btn btn-primary">Search...</button>
                                <a href="{{ route('contact-us.index') }}" class="mx-1 btn btn-danger">Reset</a>
                            </form>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <form id="delete-form" action="{{ route('contact-us-deleteMultiple') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkboxesMain"></th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>MobileNumber</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($contacts->isNotEmpty())
                                    @foreach ($contacts as $contact)
                                    <tr>
                                        <td><input type="checkbox" name="selected_ids[]" value="{{ $contact->id }}" class="checkbox" data-id="{{ $contact->id }}"></td>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->mobile_number }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td>
                                            {{-- <a href="#"><i class="fas fa-edit"></i></a> --}}
                                            <a href="{{ route('contact-us-delete', $contact->id) }}" onclick="contactDelete()"><i class="fas fa-trash-alt"></i></a>
                                            <form id="delete-form-{{ $contact->id }}" action="{{ route('contact-us-deleteMultiple', $contact->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" style="text-align: center;">
                                            Contact  Records Not Found
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="mt-3 float-end">
                                {{ $contacts->links() }}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#checkboxesMain').on('click', function() {
            $('.checkbox').prop('checked', $(this).prop('checked'));
        });

        $('.checkbox').on('click', function() {
            $('#checkboxesMain').prop('checked', $('.checkbox:checked').length === $('.checkbox')
                .length);
        });

        $('.removeAll').on('click', function() {
            var ids = [];
            $('input[name="selected_ids[]"]:checked').each(function() {
                ids.push($(this).val());
            });

            if (ids.length > 0) {
                if (confirm("Are you sure you want to delete the selected records?")) {
                    $('<input>').attr({
                        type: 'hidden'
                        , name: 'ids'
                        , value: ids.join(',')
                    }).appendTo('#delete-form');
                    $('#delete-form').submit();
                }
            } else {
                alert("Choose at least one record to delete.");
            }
        });
    });

</script>

<script>
    function contactDelete() {
        return confirm('Are You Sure Want To Delete this Records');
    }

</script>

@endpush
