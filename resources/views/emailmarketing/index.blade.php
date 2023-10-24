@extends('layouts.master')

@section('title', 'Send Email')

@section('content')
<div class="container">
    <h1 class="h1">Email Marketing</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('emailmarketing.sendEmail') }}" method="post" enctype="multipart/form-data" class="form">
        @csrf

        <div class="form-group">
            <label for="csv_file">Upload CSV File:</label>
            <input type="file" name="csv_file" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="email_subject">Email Subject:</label>
            <input type="text" name="email_subject" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="email_content">Email Content:</label>
            <textarea name="email_content" id="summernote" class="form-control" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Send Emails</button>
    </form>
</div>
@endsection









