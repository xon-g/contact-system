@extends('layouts.app')

<style>
    .add-contact-form-container {
        max-width: 500px;
        margin: 0 auto;

        .add-contact-form-title {
            color: #0A0F49;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .add-contact-form-errors {
            color: red;
            padding: 12px;
            background-color: #f8d7da;
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
<div class="add-contact-form-container">
    <h1 class="add-contact-form-title">Add Contact</h1>

    @if ($errors->any())
        <div clasS="add-contact-form-errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div>
            <label class="input-label">Name</label>
            <input type="text" name="name" id="name" class="input-field">
        </div>
        <div>
            <label class="input-label">Company</label>
            <input type="text" name="company" id="company" class="input-field">
        </div>
        <div>
            <label class="input-label">Phone</label>
            <input type="text" name="phone" id="phone" class="input-field">
        </div>
        <div>
            <label class="input-label">Email</label>
            <input type="email" name="email" id="email" class="input-field">
        </div>
        <div style="text-align: center; margin-top: 20px">
            <button type="submit" class="submit-button">Add Contact</button>
        </div>
    </form>
</div>
@endsection