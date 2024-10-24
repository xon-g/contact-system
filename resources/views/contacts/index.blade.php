@extends('layouts.app')

<style>
    .index-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;

        .index-title {
            color: #0A0F49;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        #search-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #contacts-table {
            margin-top: 20px;
        }
    }
</style>

@section('content')
<div class="index-container">
    <h1 class="index-title">My Contacts</h1>

    <input type="text" id="search-input" placeholder="Search...">
    
    <div id="contacts-table">
        @include('contacts.table')
    </div>
</div>
@endsection