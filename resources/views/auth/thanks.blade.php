@extends('layouts.app')

<style>
    .thanks-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: auto;

        .thanks-title {
            color: #0A0F49;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }


        .continue-button {
            background-color: #0A0F49;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }
    }
</style>

@section('content')
<div class="thanks-container">
    <h1 class="thanks-title">{{ $status }}</h1>
    <a class="continue-button" href="{{ route('contacts.index') }}">Continue</a>
</div>
@endsection

