@extends('layouts.app')


<style>
    .register-form-container {
        max-width: 500px;
        margin: 0 auto;


        .register-form-title {
            color: #0A0F49;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }


        .register-form-errors {
            color: red;
            margin-bottom: 20px;
        }


        .input-label {
            color: #0A0F49;
            font-size: 16px;
            margin-bottom: 5px;
        }


        .input-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }


        .submit-button {
            font-size: 16px;
            background-color: #0A0F49;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;


            transition: background-color 0.3s ease;
            &:hover {
                background-color: #2980b9;
            }
        }
    }
</style>


@section('content')
<div class="register-form-container">
    <h1 class="register-form-title">Register</h1>


    @if (session('status'))
        <div class="register-form-errors">{{ session('status') }}</div>
    @endif


    @if ($errors->any())
        <div class="register-form-errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <label class="input-label">Name</label>
            <input type="text" name="name" id="name" class="input-field" required>
        </div>
        <div>
            <label class="input-label">Email</label>
            <input type="email" name="email" id="email" class="input-field" required>
        </div>
        <div>
            <label class="input-label">Password</label>
            <input type="password" name="password" id="password" class="input-field" required>
        </div>
        <div>
            <label class="input-label">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="input-field" required>
        </div>
        <div style="text-align: center; margin-top: 20px">
            <button type="submit" class="submit-button">Register</button>
        </div>
    </form>
</div>
@endsection