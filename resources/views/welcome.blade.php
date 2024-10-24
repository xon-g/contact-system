@extends('layouts.app')

<style>
    .welcome-container {

        .welcome-title {
            color: #0A0F49;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }


        .welcome-description {
            color: #0A0F49;
            font-size: 16px;
            margin-bottom: 20px;
            text-align: center;
        }
    }
</style>

@section('content')
<div class="welcome-container">
    <h1 class="welcome-title">Greetings!</h1>
    <p class="welcome-description">Welcome to the Contact System! <br> Please <a style="color: #0015ff;" href="{{ route('login') }}">login</a> or <a style="color: #0015ff;" href="{{ route('register') }}">register</a> to get started.</p>
</div>
@endsection