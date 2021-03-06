<body>
<nav class="navbar navbar-expand-md navbar-dark" id="toTop">
    <div class="container">
        <div class="navbar-brand"><a id="pramuimge-logo" href="{{route('guest.landing.page')}}"><img src="{{asset('images/misc/logo.svg')}}" alt=""/></a></div>
        <button class="navbar-toggler collapsed megadrown__nav-mobile-toggle" type="button" data-toggle="collapse" data-target="#main-nav-1" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="navbar-collapse collapse" id="main-nav-1">
            <ul class="navbar-nav mx-auto">

                <li class="nav-item"><a title="Blog" href="#" class="nav-link"style="color:#2A1B3C;font-size: 18px;"><b>Profile</b></a>
                </li>
                <li class="nav-item dropdown position-static"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="#" style="color:#2A1B3C;font-size: 18px;"><b>EMTI</b></a>
                    <div class="dropdown-menu w-100 megadrown__top-auto megadrown__dropdown-list" style="background-color:#2A1B3C;opacity: 0.9; top:0px">
                        <div class="container">
                            <div class="row w-100">
                                <div class="text-center col-sm-4">
                                    <!-- <h3 class="border border-top-0 border-right-0 border-left-0">For Individuals</h3> -->
                                    <a href="#" class="dropdown-item megadrown__dropdown-hamburger" style="color:white;padding-bottom: 20px;font-size: 20px;text-align: left;padding-top:20px;">Profile EMTI</a>
                                    <a href="{{route('guest.department.showDepartment', ['deptName' => 'entre'])}}" title="Windows Application"  class="dropdown-item megadrown__dropdown-hamburger"style="color:white;padding-bottom: 20px;font-size: 20px;text-align: left;">Entrepeneur</a>
                                    <a href="{{route('guest.department.showDepartment', ['deptName' => 'rnc'])}}" title="Android App"  class="dropdown-item megadrown__dropdown-hamburger"style="color:white;padding-bottom: 20px;font-size: 20px;text-align: left;"><span class="megadrown__desktop-emti">Relation and Creative</span><span class="megadrown__mobile-emti">RnC</span></a>
                                   <!--  <a href="http://kbmti.filkom.ub.ac.id/landing/bank_soal" title="FireFox Extension"  class="dropdown-item megadrown__dropdown-hamburger"style="color:white">HRD</a> -->
                                </div>
                                <div class="text-center col-sm-4">
                                    <!-- <h3 class="border border-top-0 border-right-0 border-left-0">For Website Owners</h3> -->
                                    <a title="WordPress Plugin" href="{{route('guest.department.showDepartment', ['deptName' => 'advo'])}}" class="dropdown-item megadrown__dropdown-hamburger"style="color:white;padding-bottom: 20px;font-size: 20px;text-align: left;padding-top:20px;">Advocacy</a>
                                    <a title="Drupal Module" href="{{route('guest.department.showDepartment', ['deptName' => 'rnd'])}}" class="dropdown-item megadrown__dropdown-hamburger"style="color:white;padding-bottom: 20px;font-size: 20px;text-align: left;"><span class="megadrown__desktop-emti">Research and Development</span><span class="megadrown__mobile-emti">RnD</span></a>
                                </div>
                                <div class="text-center col-sm-4">
                                    <!-- <h3 class="border border-top-0 border-right-0 border-left-0">For Developers</h3> -->
                                    <a href="{{route('guest.department.showDepartment', ['deptName' => 'hrd'])}}" title="JavaScript Library"  class="dropdown-item megadrown__dropdown-hamburger"style="color:white;padding-bottom: 20px;font-size: 20px;text-align: left;padding-top:20px;"><span class="megadrown__desktop-emti">Human Resource Development</span><span class="megadrown__mobile-emti">HRD</span></a>
                                    <a href="{{route('guest.department.showDepartment', ['deptName' => 'se'])}}" title="TinyMCE Plugin"  class="dropdown-item megadrown__dropdown-hamburger"style="color:white;padding-bottom: 20px;font-size: 20px;text-align: left;"><span class="megadrown__desktop-emti">Social Environment</span><span class="megadrown__mobile-emti">SE</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item"><a title="Blog" href="#" class="nav-link"style="color:#2A1B3C;font-size: 18px;"><b>BPMTI</b></a>
                </li>
                <li class="nav-item"><a title="Contact Us" href="#" class="nav-link"style="color:#2A1B3C;font-size: 18px;"><b>News</b></a>
                </li>
            </ul>

            <ul class="navbar-nav" >
            <li class="nav-item dropdown position-static"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="#"><img class="megadrown__dropdown-burger" src="{{asset('images/misc/burger-ico.svg')}}"> <span class="megadrown__dropdown-text">More</span></a>
                    <div class="dropdown-menu w-100 megadrown__top-auto megadrown__dropdown-list" style="background-color:#2A1B3C;opacity: 0.9;top:0px">
                        <div class="container">
                            <div class="row w-100">
                                <div class="text-center col-sm-4">
                                    <a href="#" class="dropdown-item megadrown__dropdown-hamburger"style="color:white;padding-bottom: 20px;font-size: 20px;padding-top:40px;text-align: left;">Bank Materi</a>
                                    <a href="#" title="Windows Application"  class="dropdown-item megadrown__dropdown-hamburger"style="color:white;padding-bottom: 20px;font-size: 20px;text-align: left;">Bank Soal</a>
                                </div>
                                <div class="text-center col-sm-4">
                                    <a title="WordPress Plugin" href="#" class="dropdown-item megadrown__dropdown-hamburger"style="color:white;padding-bottom: 20px;font-size: 20px;padding-top:40px;text-align: left;">Info Lomba</a>
                                    <a title="Drupal Module" href="#" class="dropdown-item megadrown__dropdown-hamburger"style="color:white;padding-bottom: 20px;font-size: 20px;text-align: left;">Info Event IT</a>
                                    <a title="Joomla Extension" href="#" class="dropdown-item megadrown__dropdown-hamburger"style="color:white;padding-bottom: 20px;font-size: 20px;text-align: left;">Info Beasiswa</a>
                                    <a title="Joomla Extension" href="#" class="dropdown-item megadrown__dropdown-hamburger"style="color:white;padding-bottom: 20px;font-size: 20px;text-align: left;">Info Karir</a>
                                </div>
                                <div class="text-center col-sm-4">
                                    <a href="#" title="JavaScript Library"  class="dropdown-item megadrown__dropdown-hamburger"style="color:white;padding-bottom: 20px;font-size: 20px;padding-top:40px;text-align: left;">TI Talks</a>
                                    <a href="#" title="TinyMCE Plugin" class="dropdown-item megadrown__dropdown-hamburger"style="color:white;padding-bottom: 20px;font-size: 20px;text-align: left;">Pengajuan Surat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<a href="#toTop" id="myBtn" title="Go to top" class="megadrown__top-button">
    <svg width="100" height="100" viewBox="0 0 131 131" fill="none" xmlns="http://www.w3.org/2000/svg">
<g filter="url(#filter0_ddd)">
<circle cx="65.5" cy="61.5" r="61.5" fill="#8265A7"/>
<circle cx="65.5" cy="61.5" r="58" stroke="#FFECF5" stroke-width="7"/>
</g>
<g filter="url(#filter1_ddd)">
<path d="M69.4832 24.4129C67.502 22.4892 64.3366 22.5357 62.4129 24.5168L31.0644 56.8011C29.1407 58.7822 29.1872 61.9477 31.1684 63.8714C33.1495 65.7951 36.315 65.7485 38.2387 63.7674L66.104 35.0703L94.8011 62.9356C96.7822 64.8593 99.9477 64.8128 101.871 62.8316C103.795 60.8505 103.749 57.685 101.767 55.7613L69.4832 24.4129ZM71.9995 95.9265L70.9995 27.9265L61.0005 28.0735L62.0005 96.0735L71.9995 95.9265Z" fill="#F1E4FF"/>
</g>
<defs>
<filter id="filter0_ddd" x="0" y="0" width="131" height="131" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
<feFlood flood-opacity="0" result="BackgroundImageFix"/>
<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
<feOffset dy="4"/>
<feGaussianBlur stdDeviation="2"/>
<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
<feOffset dy="4"/>
<feGaussianBlur stdDeviation="2"/>
<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
<feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow"/>
<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
<feOffset dy="4"/>
<feGaussianBlur stdDeviation="2"/>
<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
<feBlend mode="normal" in2="effect2_dropShadow" result="effect3_dropShadow"/>
<feBlend mode="normal" in="SourceGraphic" in2="effect3_dropShadow" result="shape"/>
</filter>
<filter id="filter1_ddd" x="25.1108" y="22.4592" width="82.7052" height="82.0823" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
<feFlood flood-opacity="0" result="BackgroundImageFix"/>
<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
<feOffset dy="4"/>
<feGaussianBlur stdDeviation="2"/>
<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
<feOffset dy="4"/>
<feGaussianBlur stdDeviation="2"/>
<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
<feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow"/>
<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
<feOffset dy="4"/>
<feGaussianBlur stdDeviation="2"/>
<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
<feBlend mode="normal" in2="effect2_dropShadow" result="effect3_dropShadow"/>
<feBlend mode="normal" in="SourceGraphic" in2="effect3_dropShadow" result="shape"/>
</filter>
</defs>
</svg>

</a>

   <script>

  $('.dropdown').on('show.bs.dropdown', function() {
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    $('body').toggleClass('megadrown__modal-active');
  });

  $('.dropdown').on('hide.bs.dropdown', function() {
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    $('body').toggleClass('megadrown__modal-active');
  });
</script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
</body>
</html>
