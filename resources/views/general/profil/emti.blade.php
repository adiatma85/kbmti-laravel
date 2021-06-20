<section class="profile-top">
    <div class="profile-top__first">
        <div class="profile-top__first-title">
            <img class="profile-top__first-img" src="
            @yield('picture-title')
            "
            alt="">
        </div>
        <div class="profile-top__first-desc">
            <div class="row mt-5">
                <div class="col-md-6">
                    <p class="profile-top__first-desc-p">@yield('description')</p>
                </div>
                <div class="col-md-6 mt-5">
                    <img class="profile-top__first-desc-img" src="
                        @yield('picture-side')
                    " alt="">
                </div>
            </div>
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