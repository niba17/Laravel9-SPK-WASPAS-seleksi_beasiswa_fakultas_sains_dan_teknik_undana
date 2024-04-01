 <!-- Sidebar -->
 <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
     <div class="container-fluid">
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
             aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <h1 class="navbar-brand navbar-brand-autodark">
             <a href="/home">
                 {{-- <img src="{{ asset('template') }}/static/logo-white.svg" width="110" height="32" alt="Tabler"
                     class="navbar-brand-image"> --}}
                 Admin
             </a>
         </h1>

         <div class="collapse navbar-collapse" id="sidebar-menu">
             <ul class="navbar-nav pt-lg-3">
                 <li class="nav-item @if (Request::route()->getName() == 'home') active bg-info @endif">
                     <a class="nav-link @if (Request::route()->getName() == 'home') text-dark @endif" href="/home">
                         <span class="nav-link-icon d-md-none d-lg-inline-block">
                             <i class="fa-solid fa-house  @if (Request::route()->getName() == 'home') text-dark @endif"></i>
                         </span>
                         <span class="nav-link-title">
                             Home
                         </span>
                     </a>
                 </li>
                 <li class="nav-item @if (Request::route()->getName() == 'akun' ||
                     Request::route()->getName() == 'akun-add' ||
                     Request::route()->getName() == 'akun-edit' ||
                     Request::route()->getName() == 'mahasiswa' ||
                     Request::route()->getName() == 'mahasiswa-add' ||
                     Request::route()->getName() == 'mahasiswa-edit' ||
                     Request::route()->getName() == 'kriteria' ||
                     Request::route()->getName() == 'kriteria-add' ||
                     Request::route()->getName() == 'kriteria-edit' ||
                     Request::route()->getName() == 'sub_kriteria' ||
                     Request::route()->getName() == 'sub_kriteria-add' ||
                     Request::route()->getName() == 'sub_kriteria-edit' ||
                     Request::route()->getName() == 'bobot_mahasiswa' ||
                     Request::route()->getName() == 'bobot_mahasiswa-add' ||
                     Request::route()->getName() == 'bobot_mahasiswa-edit' ||
                     Request::route()->getName() == 'jurusan' ||
                     Request::route()->getName() == 'jurusan-add' ||
                     Request::route()->getName() == 'jurusan-edit' ||
                     Request::route()->getName() == 'kecamatan' ||
                     Request::route()->getName() == 'kecamatan-add' ||
                     Request::route()->getName() == 'kecamatan-edit' ||
                     Request::route()->getName() == 'kelurahan' ||
                     Request::route()->getName() == 'kelurahan-add' ||
                     Request::route()->getName() == 'kelurahan-edit') active @endif dropdown">
                     <a class="nav-link dropdown-toggle  @if (Request::route()->getName() == 'akun' ||
                         Request::route()->getName() == 'akun-add' ||
                         Request::route()->getName() == 'akun-edit' ||
                         Request::route()->getName() == 'mahasiswa' ||
                         Request::route()->getName() == 'mahasiswa-add' ||
                         Request::route()->getName() == 'mahasiswa-edit' ||
                         Request::route()->getName() == 'kriteria' ||
                         Request::route()->getName() == 'kriteria-add' ||
                         Request::route()->getName() == 'kriteria-edit' ||
                         Request::route()->getName() == 'sub_kriteria' ||
                         Request::route()->getName() == 'sub_kriteria-add' ||
                         Request::route()->getName() == 'sub_kriteria-edit' ||
                         Request::route()->getName() == 'bobot_mahasiswa' ||
                         Request::route()->getName() == 'bobot_mahasiswa-add' ||
                         Request::route()->getName() == 'bobot_mahasiswa-edit' ||
                         Request::route()->getName() == 'jurusan' ||
                         Request::route()->getName() == 'jurusan-add' ||
                         Request::route()->getName() == 'jurusan-edit' ||
                         Request::route()->getName() == 'kecamatan' ||
                         Request::route()->getName() == 'kecamatan-add' ||
                         Request::route()->getName() == 'kecamatan-edit' ||
                         Request::route()->getName() == 'kelurahan' ||
                         Request::route()->getName() == 'kelurahan-add' ||
                         Request::route()->getName() == 'kelurahan-edit') show bg-info @endif"
                         href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                         aria-expanded="false">
                         <span class="nav-link-icon d-md-none d-lg-inline-block">
                             <i class="fa-solid fa-box-archive  @if (Request::route()->getName() == 'akun' ||
                                 Request::route()->getName() == 'akun-add' ||
                                 Request::route()->getName() == 'akun-edit' ||
                                 Request::route()->getName() == 'mahasiswa' ||
                                 Request::route()->getName() == 'mahasiswa-add' ||
                                 Request::route()->getName() == 'mahasiswa-edit' ||
                                 Request::route()->getName() == 'kriteria' ||
                                 Request::route()->getName() == 'kriteria-add' ||
                                 Request::route()->getName() == 'kriteria-edit' ||
                                 Request::route()->getName() == 'sub_kriteria' ||
                                 Request::route()->getName() == 'sub_kriteria-add' ||
                                 Request::route()->getName() == 'sub_kriteria-edit' ||
                                 Request::route()->getName() == 'bobot_mahasiswa' ||
                                 Request::route()->getName() == 'bobot_mahasiswa-add' ||
                                 Request::route()->getName() == 'bobot_mahasiswa-edit' ||
                                 Request::route()->getName() == 'jurusan' ||
                                 Request::route()->getName() == 'jurusan-add' ||
                                 Request::route()->getName() == 'jurusan-edit' ||
                                 Request::route()->getName() == 'kecamatan' ||
                                 Request::route()->getName() == 'kecamatan-add' ||
                                 Request::route()->getName() == 'kecamatan-edit' ||
                                 Request::route()->getName() == 'kelurahan' ||
                                 Request::route()->getName() == 'kelurahan-add' ||
                                 Request::route()->getName() == 'kelurahan-edit') text-dark @endif"></i>
                         </span>
                         <span class="nav-link-title @if (Request::route()->getName() == 'akun' ||
                             Request::route()->getName() == 'akun-add' ||
                             Request::route()->getName() == 'akun-edit' ||
                             Request::route()->getName() == 'mahasiswa' ||
                             Request::route()->getName() == 'mahasiswa-add' ||
                             Request::route()->getName() == 'mahasiswa-edit' ||
                             Request::route()->getName() == 'kriteria' ||
                             Request::route()->getName() == 'kriteria-add' ||
                             Request::route()->getName() == 'kriteria-edit' ||
                             Request::route()->getName() == 'sub_kriteria' ||
                             Request::route()->getName() == 'sub_kriteria-add' ||
                             Request::route()->getName() == 'sub_kriteria-edit' ||
                             Request::route()->getName() == 'bobot_mahasiswa' ||
                             Request::route()->getName() == 'bobot_mahasiswa-add' ||
                             Request::route()->getName() == 'bobot_mahasiswa-edit' ||
                             Request::route()->getName() == 'jurusan' ||
                             Request::route()->getName() == 'jurusan-add' ||
                             Request::route()->getName() == 'jurusan-edit' ||
                             Request::route()->getName() == 'kecamatan' ||
                             Request::route()->getName() == 'kecamatan-add' ||
                             Request::route()->getName() == 'kecamatan-edit' ||
                             Request::route()->getName() == 'kelurahan' ||
                             Request::route()->getName() == 'kelurahan-add' ||
                             Request::route()->getName() == 'kelurahan-edit') text-dark @endif">
                             Data
                         </span>
                     </a>
                     <div class="dropdown-menu  @if (Request::route()->getName() == 'akun' ||
                         Request::route()->getName() == 'akun-add' ||
                         Request::route()->getName() == 'akun-edit' ||
                         Request::route()->getName() == 'mahasiswa' ||
                         Request::route()->getName() == 'mahasiswa-add' ||
                         Request::route()->getName() == 'mahasiswa-edit' ||
                         Request::route()->getName() == 'kriteria' ||
                         Request::route()->getName() == 'kriteria-add' ||
                         Request::route()->getName() == 'kriteria-edit' ||
                         Request::route()->getName() == 'sub_kriteria' ||
                         Request::route()->getName() == 'sub_kriteria-add' ||
                         Request::route()->getName() == 'sub_kriteria-edit' ||
                         Request::route()->getName() == 'bobot_mahasiswa' ||
                         Request::route()->getName() == 'bobot_mahasiswa-add' ||
                         Request::route()->getName() == 'bobot_mahasiswa-edit' ||
                         Request::route()->getName() == 'jurusan' ||
                         Request::route()->getName() == 'jurusan-add' ||
                         Request::route()->getName() == 'jurusan-edit' ||
                         Request::route()->getName() == 'kecamatan' ||
                         Request::route()->getName() == 'kecamatan-add' ||
                         Request::route()->getName() == 'kecamatan-edit' ||
                         Request::route()->getName() == 'kelurahan' ||
                         Request::route()->getName() == 'kelurahan-add' ||
                         Request::route()->getName() == 'kelurahan-edit') show @endif">
                         <div class="dropdown-menu-columns">
                             <div class="dropdown-menu-column">
                                 <a class="dropdown-item  @if (Request::route()->getName() == 'akun' ||
                                     Request::route()->getName() == 'akun-add' ||
                                     Request::route()->getName() == 'akun-edit') active @endif"
                                     href="/akun">
                                     Akun
                                 </a>
                                 <a class="dropdown-item @if (Request::route()->getName() == 'mahasiswa' ||
                                     Request::route()->getName() == 'mahasiswa-add' ||
                                     Request::route()->getName() == 'mahasiswa-edit') active @endif"
                                     href="/mahasiswa">
                                     Mahasiswa
                                 </a>
                                 <a class="dropdown-item @if (Request::route()->getName() == 'kriteria' ||
                                     Request::route()->getName() == 'kriteria' ||
                                     Request::route()->getName() == 'kriteria-add' ||
                                     Request::route()->getName() == 'kriteria-edit' ||
                                     Request::route()->getName() == 'sub_kriteria' ||
                                     Request::route()->getName() == 'sub_kriteria-add' ||
                                     Request::route()->getName() == 'sub_kriteria-edit') active @endif"
                                     href="/kriteria">
                                     Kriteria
                                 </a>
                                 <a class="dropdown-item @if (Request::route()->getName() == 'bobot_mahasiswa' ||
                                     Request::route()->getName() == 'bobot_mahasiswa-add' ||
                                     Request::route()->getName() == 'bobot_mahasiswa-edit') active @endif"
                                     href="/bobot_mahasiswa">
                                     Bobot Mahasiswa
                                 </a>
                                 <a class="dropdown-item @if (Request::route()->getName() == 'jurusan' ||
                                     Request::route()->getName() == 'jurusan-add' ||
                                     Request::route()->getName() == 'jurusan-edit') active @endif"
                                     href="/jurusan">
                                     Jurusan
                                 </a>
                                 <a class="dropdown-item @if (Request::route()->getName() == 'kecamatan' ||
                                     Request::route()->getName() == 'kecamatan-add' ||
                                     Request::route()->getName() == 'kecamatan-edit' ||
                                     Request::route()->getName() == 'kelurahan' ||
                                     Request::route()->getName() == 'kelurahan-add' ||
                                     Request::route()->getName() == 'kelurahan-edit') active @endif"
                                     href="/kecamatan">
                                     Lokasi
                                 </a>
                             </div>
                         </div>
                     </div>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link" href="#" onclick="logout()">
                         <span class="nav-link-icon d-md-none d-lg-inline-block">
                             <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                             <i class="fa-solid fa-arrow-right-from-bracket"></i>
                         </span>
                         <span class="nav-link-title">
                             Logout
                         </span>
                     </a>
                 </li>
             </ul>
         </div>
     </div>
 </aside>
