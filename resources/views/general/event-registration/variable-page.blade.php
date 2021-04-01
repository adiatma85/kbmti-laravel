@extends('layouts.app')

    @section('custom-style')
        {{-- SweetAlert2 CSS --}}
        @include('include.plugins.load-swal2-guest-css')
        {{-- This Page / Temporary --}}
        <link href="{{asset('css/news-page.css')}}" rel="stylesheet">
        <link href="{{asset('css/osi-cpw.css')}}" rel="stylesheet">
    @endsection

    @section('content')
        {{-- Validation Error --}}
    {{-- Need to be separated module --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- <section id="title"> --}}
        <div class="osi-cpw__title">{{$event->name}}</div>
    {{-- </section> --}}

    {{-- Temporary USE! --}}
    <h4 style="background-color: #FFECF5; padding-left: 200px; width: 60rem">Mata kuliah yang tersedia hanya Pemograman Lanjut</h4>
    <section id="form">
        <div class="flex-container">
            <div class="flex-15">
                <p></p>
            </div>
            <div class="flex-70">
                <form action="{{route('guest.event-registration.storeEventRegistration', ['eventName' => str_replace(" ", "-", strtolower($event->name))])}}" method="post">
                    {{-- For now, we will use static --}}
                    @csrf
                    <div class="form-group row">
                        <label for="inputNama">Nama</label>
                        <input type="text" name="name" id="inputNama" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="form-group row">
                        <label for="inputNim">NIM</label>
                        <input type="text" name="nim" id="inputNim" class="form-control" placeholder="NIM" required>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail">Email</label>
                        <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email"
                            required>
                    </div>
                    <div class="form-group row">
                        <label for="inputAngkatan">Angkatan</label>
                        <input type="text" name="angkatan" id="inputAngkatan" class="form-control"
                            placeholder="Angkatan" required>
                    </div>

                    {{-- Need to foreach the form --}}
                    @foreach ($event->eventFields as $field)
                        @if ($field->type == 'dropdown')
                            {{-- Dropdown type --}}
                            <div class="form-group row">
                                <label for="input{{$field->name}}">{{ucfirst($field->name)}}</label>
                                    <select name="{{strtolower($field->name)}}" id="input{{$field->name}}" class="form-control" required>
                                        <option value="" selected>Choose One</option>
                                        @foreach ($field->eventFieldChoice as $choice)
                                            <option value="{{$choice->choice}}">{{$choice->choice}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        @else
                            <div class="form-group row">
                                <label for="input{{$field->name}}">{{ucfirst($field->name)}}</label>
                                <input type="{{$field->type}}" name="{{strtolower($field->name)}}" id="input{{$field->name}}" class="form-control"
                                    placeholder="{{$field->name}}" required>
                            </div>
                        @endif
                    
                    @endforeach

                    <div class="button-place">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @endsection
    
    @section('custom-script')
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        {{-- SweetAlert2 JS --}}
        @include('include.plugins.load-swal2-guest-js')
    @endsection