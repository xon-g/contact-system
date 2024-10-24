@extends('layouts.app')

<style>
    .edit-contact-form-container {
        max-width: 500px;
        margin: 0 auto;


        .edit-contact-form-title {
            color: #0A0F49;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }


        .edit-contact-form-errors {
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
<div class="edit-contact-form-container">
    <h1 class="edit-contact-form-title">Edit Contact</h1>


    @if ($errors->any())
        <div class="edit-contact-form-errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label class="input-label">Name</label>
            <input type="text" name="name" id="name" class="input-field" value="{{ $contact->name }}" required>
        </div>
        <div>
            <label class="input-label">Company</label>
            <input type="text" name="company" id="company" class="input-field" value="{{ $contact->company }}" required>
        </div>
        <div>
            <label class="input-label">Phone</label>
            <input type="text" name="phone" id="phone" class="input-field" value="{{ $contact->phone }}" required>
        </div>
        <div>
            <label class="input-label">Email</label>
            <input type="email" name="email" id="email" class="input-field" value="{{ $contact->email }}" required>
        </div>
        <div style="text-align: center; margin-top: 20px">
            <button type="submit" class="submit-button">Update Contact</button>
        </div>
    </form>
</div>
@endsection