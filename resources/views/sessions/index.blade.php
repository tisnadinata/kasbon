  @extends('sessions.master')
  @section('content')
       
    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container">
            
              <div class="alert alert-success" role="alert">
                <i class="icon-link"> </i>Link anda : <b> <a href="{{url('dashboard/akun-profile/data-akun')}}">Profil dan Akun</a> </b></div>     
              <div class="alert alert-success" role="alert">
                <i class="icon-link"> </i>Link anda : <b> <a href="{{url('dashboard/history-peminjaman')}}">History Peminjaman</a>  </b>
              </div> 
              <div class="alert alert-success" role="alert">
                <i class="icon-link"> </i>Link anda : <b> <a href="{{url('dashboard/akun-profile/ajukan-peminjaman')}}">Ajukan Peminjaman Baru</a>  </b></div>     
                                        

                  </div> <!-- Container -->

                </div> <!-- col-sm-14 -->
        </section></div> <!-- content-wrap -->
        @stop