@extends('layouts.app')
@section('title', 'Records Manager')
@section('styles')
<style>

        .header {
            background: #007bff;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 24px;
        }
        .introduction {
            margin: 20px 0;
            text-align: center;
            font-size: 18px;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }
</style>
@endsection

@section('content')

 <div class="container">
        <div class="header">
            Timezone Aware Records App
        </div>
        <div class="introduction">
            <p>Welcome to the Timezone Management App! Our app helps you manage records across different timezones seamlessly, ensuring accuracy and efficiency whether you're scheduling meetings or managing global projects.</p>
        </div>
        <div class="footer">
            Contact us: <a href="mailto:ksn2011@gmail.com">ksn2011@gmai.com</a>
        </div>
    </div>
@endsection
