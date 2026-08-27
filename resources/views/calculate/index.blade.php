@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Calculate Values</h2>



    <form action="{{ route('calculate') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="a" class="form-table">Value A:</label>
            <input type="number" id="a" name="a" class="form-control" required Value="{{ $a }}">
        </div>


        <div class="mb-3">
            <label for="b" class="form-table">Value B:</label>
            <input type="number" id="b" name="b" class="form-control" required
             value="{{ $b }}">
        </div>

        <div class="mb-3">
            <label for="c" class="form-table">Value C:</label>
            <input type="number" id="c" name="c" class="form-control" required
            value="{{ $results['c'] }}">
        </div>

        <div class="mb-3">
            <label for="d" class="form-table">Value D:</label>
            <input type="number" id="d" name="d" class="form-control" required
            value="{{ $results['d'] }}">
        </div>
        <div class="mb-3">
            <label for="e" class="form-table">Value E:</label>
            <input type="number" id="e" name="e" class="form-control" required value="{{ $results['e'] }}">
        </div>
        <div class="mb-3">
            <label for="f" class="form-table">Value F:</label>
            <input type="number" id="f" name="f" class="form-control" required value="{{ $results['f'] }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Calculate</button>


    </form>
</div>
@endsection