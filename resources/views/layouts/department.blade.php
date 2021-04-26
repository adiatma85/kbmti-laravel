@extends('layouts.app')

@section('content')
<article class="container">
    <section class="department__heading">
        <h1 class="department__heading-title">@yield('title')</h1>
        <div class="department__heading-sub">
            <img class="department__heading-sub-img" src="@yield('picture-title')" alt="">
            <p class="department__heading-sub-description">@yield('description')</p>
        </div>
    </section>

    <section class="department__content">
        <h1 class="department__content-title">Proker</h1>
        <div class="department__content-group">
            <img src="
            @if(View::hasSection('picture-1'))
                @yield('picture-1')
            @else
                {{asset('images/misc/department/empty.png')}}
                " style="display: none
            @endif
            " alt="" class="department__content-group-img">
            <img src="
            @if(View::hasSection('picture-2'))
                @yield('picture-2')
            @else
                {{asset('images/misc/department/empty.png')}}
                " style="display: none
            @endif
            " alt="" class="department__content-group-img">
            <img src="
            @if(View::hasSection('picture-3'))
                @yield('picture-3')
            @else
                {{asset('images/misc/department/empty.png')}}
                " style="display: none
            @endif
            " alt="" class="department__content-group-img">
            <img src="
            @if(View::hasSection('picture-4'))
                @yield('picture-4')
            @else
                {{asset('images/misc/department/empty.png')}}
                " style="display: none
            @endif
            " alt="" class="department__content-group-img">
            <img src="
            @if(View::hasSection('picture-5'))
                @yield('picture-5')
            @else
                {{asset('images/misc/department/empty.png')}}
                " style="display: none
            @endif
            " alt="" class="department__content-group-img">
            <img src="
            @if(View::hasSection('picture-6'))
                @yield('picture-6')
            @else
                {{asset('images/misc/department/empty.png')}}
                " style="display: none
            @endif
            " alt="" class="department__content-group-img">
        </div>
    </section>
</article>
@endsection

@section('custom-script')
@endsection
