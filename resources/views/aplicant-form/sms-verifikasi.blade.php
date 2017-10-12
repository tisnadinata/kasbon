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
          <li class="progress__item progress__item--active col-xs-3">
              <span class="progress__item__name hidden-xs">SMS VERIVIKASI</span>
              <span class="step"><span class="progress__item__num">3</span></span>
          </li>
          <li class="progress__item col-xs-3">
              <span class="progress__item__name hidden-xs">DAPATKAN PINJAMAN</span>
              <span class="step"><span class="progress__item__num">4</span></span>
          </li>
        </ol>
      </div>
    </div>
    <!-- End of Progress Tracker -->

<div class="container">
<div class="row">
  <div class="col-md-9">
    <div class="panelsmsverifikasi">
      <div class="panel-body">
        <h1>Token Verification Telah Dikirim</h1>
        <p>Silahkan cek pesan kami yang berisi token aktivasi pada nomor telepon seluler yang telah Anda daftarkan</p>
        <hr>
        {!! Form::open(['url' => 'peminjaman-form/get-pinjaman' , 'form-ajax'=>'true','method' => 'post', 'id' => 'aplicant-form']) !!}
         <input type="hidden" name="_token" value="{{ csrf_token() }}" >
          <div class="form-group">
            <div class="row">
              <div class="col-md-6 col-md-offset-2">
                <label>Masukan kode verifikasi</label>
              </div>
              <div class="col-md-6 col-md-offset-2">
                <input type="text" id="mobile_code" name="mobile_code" class="form-control" placeholder="Masukan angka kode verifikasi">
              </div>  
              <div class="col-md-4">
               <input type="hidden" name="ap_email_address" value="{{ $ap_email_address }}">
              <input type="hidden" name="principal_amount" value="{{ $principal_amount }}">
              <input type="hidden" name="biaya_layanan" value="{{ $biaya_layanan }}">
              <input type="hidden" name="totalPembayaran" value="{{ $totalPembayaran }}">
              <input type="hidden" name="jatuhTempo" value="{{ $jatuhTempo }}">
                <button type="submit" id="verifikasi" class="btn btn-primary btn-loading">Submit</button>
              </div>
            </div>
            <!--<div class="row">
              <div class="col-md-8 col-md-offset-2">
                <label>Belum dapat pesan? <a class="kirimulang" href="">Kirim Ulang</a></label>
              </div>
            </div>-->
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="row">
      <div class="col-sm-12">
        <div class="panelrincian">
          <h4>Rincian Pinjaman</h4>
          <label>Jumlah Pinjaman</label>
          <p>{{ $principal_amount }}</p>
          <label>Biaya Layanan</label>
          <p><span id="sidebar-fees">{{ $biaya_layanan }}</span><small id="sidebar-real-fees"></small> <img src="{{ asset('frontend/statics/v2/images/info.png')}}"></p>
          <label>Total Pembayaran</label>
          <p><span id="sidebar-payback">{{ $totalPembayaran }}</span></p>
          <label>Jatuh Tempo</label>
          <p>{{ $jatuhTempo }}</p>
        </div>
      </div>
      
    </div>
  </div>
</div>
  <!-- Nav tabs -->
</div>
    @stop
  