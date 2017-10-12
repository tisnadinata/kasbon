@extends('aplicant-form.master')
@section('content')
<div class="visible-xs">
          <div class="navbar__title">
              <h1>DETAIL DATA ANDA</h1>
          </div>
        </div>

      </div>

    </nav>
      
    <!-- Progress Tracker -->
    <div class="progress">
      <div class="container">
        <ol class="progress__box" data-steps="4">
          <li class="progress__item progress__item--done col-xs-3">
              <span class="progress__item__name hidden-xs">PENGAJUAN</span>
              <span class="step"><span class="progress__item__num">1</span></span>
          </li>
          <li class="progress__item progress__item--done col-xs-3">
              <span class="progress__item__name hidden-xs">DETAIL DATA ANDA</span>
              <span class="step"><span class="progress__item__num">2</span></span>
          </li>
          <li class="progress__item progress__item--done col-xs-3">
              <span class="progress__item__name hidden-xs">SMS VERIVIKASI</span>
              <span class="step"><span class="progress__item__num">3</span></span>
          </li>
          <li class="progress__item progress__item--active col-xs-3">
              <span class="progress__item__name hidden-xs">DAPATKAN PINJAMAN</span>
              <span class="step"><span class="progress__item__num">4</span></span>
          </li>
        </ol>
      </div>
    </div>
    <!-- End of Progress Tracker -->

<div class="container">
    <div class="col-md-9">
    <div class="panelpinjaman">
      <div class="panel-body">
        <h1>[KASBON : BERKAS PERMOHONAN PINJAMAN DITERIMA</h1>
        <hr>
        
<div class="well"><h4 class="txt-second nomargin">Silahkan periksa email Anda.<br> Kami telah mengirimkan email ({{$ap_email_address}}) berisi informasi status permohonan pinjaman Anda.</h4></div>
<p class="marbot_1">Dengan Hormat,</p>
<p class="marbot_1">Terima kasih telah melengkapi aplikasi permohonan pinjaman. Kami memerlukan waktu untuk memproses aplikasi pinjaman Anda. Konfirmasi hasil keputusan pengajuan pinjaman akan kami kirimkan paling lambat 2 hari kerja sejak diterimanya email pemberitahuan ini. Selama proses berlangsung hingga mendapatkan konfirmasi persetujuan, kami melakukan verifikasi terhadap data pribadi lengkap yang Anda isikan di formulir online.</p>
<p class="marbot_1">Adapun data yang perlu Anda siapkan apabila permohonan pinjaman Anda disetujui yaitu:</p>
  </p><p>Hormat Kami,<br>
  <strong> Kasbon.com </strong></p>

        <!--
        <p>ID Pinjaman</p>
        <label style="padding:7px; background-color:#133185; border:solid 1px black; width:100%; text-align:center;">82a8845688f-1601</label>
        <p>Kami telah mengirimkan email <a href="">azistea007@gmail.com</a> berisi informasi status permohonan pinjaman Anda.</p>
        <p>Apabila Anda tidak menerima konfirmasi apapun dalam dua hari kerja kedepan, silahkan menghubungi customer service kami di:</p>
        <label class="service">+6221 2128 2147 &nbsp; | &nbsp; +6221 2128 2148</label>
        -->
      </div>
    </div>
  </div>
</div>


    @stop
  