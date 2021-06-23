<section class="profile-top">
    <div class="profile-top__first">
        <div class="profile-top__first-title">
            <img class="profile-top__first-img" src="
            @yield('picture-title')
            "
            alt="">
        </div>
        <div class="profile-top__first-desc">
            <p class="profile-top__first-desc-p">@yield('description')</p>
            <img class="profile-top__first-desc-img" src="
            @yield('picture-side')
            " alt="">
        </div>
    </div>

    <div class="profile-top__second">
        <h1 class="profile-top__second-title">@yield('title')</h1>
        <h2 class="profile-top__second-visi-title">Visi</h2>
        <p class="profile-top__second-visi-content">@yield('visi')</p>
        <h2 class="profile-top__second-misi-title">Misi</h2>
        <ul class="profile-top__second-misi-content">
        @yield('misi')
        </ul>
    </div>
</section>
