@extends('aplicant-form.master')
@section('content')

      <div class="visible-xs">
          <div class="navbar__title">
              <h1>DETAIL DATA ANDA</h1>
          </div>
        </div>

      </div>

    </nav>
      

  <link href='https://fonts.googleapis.com/css?family=Homemade+Apple' rel='stylesheet' type='text/css'>
    <!-- Progress Tracker -->
    <div class="progress">
      <div class="container">
        <ol class="progress__box" data-steps="4">
          <li class="progress__item progress__item--active col-xs-3">
              <span class="progress__item__name hidden-xs">PENGAJUAN</span>
              <span class="step"><span class="progress__item__num">1</span></span>
          </li>
          <li class="progress__item col-xs-3">
              <span class="progress__item__name hidden-xs">DETAIL DATA ANDA</span>
              <span class="step"><span class="progress__item__num">2</span></span>
          </li>
          <li class="progress__item col-xs-3">
              <span class="progress__item__name hidden-xs">SMS VERIVIKASI</span>
              <span class="step"><span class="progress__item__num">3</span></span>
          </li>
          <li  class="progress__item col-xs-3">
              <span class="progress__item__name hidden-xs">DAPATKAN PINJAMAN</span>
              <span class="step"><span class="progress__item__num">4</span></span>
          </li>
        </ol>
      </div>
    </div>
    <!-- End of Progress Tracker -->

 <div class="container">
      <div class="row">
        <div class="col-md-9 small-no-padding">
          <div class="panel p-bottom-0">
            <div class="">
              <h1 class="panel__title">Alasan Pinjaman</h1>
              <div class="panel__body">
                <p>Pilih satu alasan pinjaman yang sesuai dengan kebutuhan anda. Alasan pinjaman bisa mempengaruhi jumlah pinjaman yang kami setujui.</p>
              </div>
              <hr>
               {!! Form::open(['url' => 'peminjaman-form/pengajuan' , 'method' => 'post', 'id' => 'purpose-form']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}" >


               <div class="p-left-15 p-right-15 col-md-7 form-group small-no-padding">
                  <label class="m-bottom-10 c-black">Kode Referral Anda</label>
                  <input type="text" name="ap_brw_reff" id="ap_brw_reff" placeholder="Masukan Kode Referral Anda" class="form-control" value="{{ $aff }}" />
                </div>

                <div class="clearfix m-bottom-30"></div>
                
                <div class="form-group">
                  <label for="" class="m-left-15 c-black">Alasan Pinjaman*</label>
                </div>
                <ul class="purpose__list clearfix m-bottom-30">
                        <li class="bullet-check purpose__list__item col-md-6">
                        <input type="radio" required name="apli_loan_purpose" id="Medical bills" value="Medical bills">
                        <label for="Medical bills">
                          Tagihan Medis
                        </label>
                    </li>
                                       
                    <li class="bullet-check purpose__list__item col-md-6">
                        <input type="radio" name="apli_loan_purpose" id="Education" value="Education">
                        <label for="Education">
                          Pendidikan
                        </label>
                    </li>
                                       
                    <li class="bullet-check purpose__list__item col-md-6">
                        <input type="radio" name="apli_loan_purpose" id="Consumer Purchase" value="Consumer Purchase">
                        <label for="Consumer Purchase">
                          Pembelian konsumen
                        </label>
                    </li>
                                       
                    <li class="bullet-check purpose__list__item col-md-6">
                        <input type="radio" name="apli_loan_purpose" id="Debt Repayment" value="Debt Repayment">
                        <label for="Debt Repayment">
                          Membayar Hutang
                        </label>
                    </li>
                                       
                    <li class="bullet-check purpose__list__item col-md-6">
                        <input type="radio" name="apli_loan_purpose" id="Motorcycle Purchase" value="Motorcycle Purchase">
                        <label for="Motorcycle Purchase">
                          Pembelian Motor
                        </label>
                    </li>
                                       
                    <li class="bullet-check purpose__list__item col-md-6">
                        <input type="radio" name="apli_loan_purpose" id="Working Capital" value="Working Capital">
                        <label for="Working Capital">
                          Modal Usaha
                        </label>
                    </li>
                                       
                    <li class="bullet-check purpose__list__item col-md-6">
                        <input type="radio" name="apli_loan_purpose" id="Vehicle Purchase" value="Vehicle Purchase">
                        <label for="Vehicle Purchase">
                          Pembelian Kendaraan
                        </label>
                    </li>
                                       
                    <li class="bullet-check purpose__list__item col-md-6">
                        <input type="radio" name="apli_loan_purpose" id="Holiday" value="Holiday">
                        <label for="Holiday">
                          Liburan
                        </label>
                    </li>
                                       
                    <li class="bullet-check purpose__list__item col-md-6">
                        <input type="radio" name="apli_loan_purpose" id="Others" value="Others">
                        <label for="Others">
                          Lain-lain
                        </label>
                    </li>
                 </ul>

                <div class="p-left-15 p-right-15 col-md-7 form-group small-no-padding">
                  <label class="m-bottom-10 c-black">Darimana Anda Tahu UangTeman?*</label>
                  <!-- <select required name="reference" id="" class="form-control">
                    <option value="">- Pilih Satu -</option>
                    <option value="Google">Google</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Twitter">Twitter</option>
                    <option value="Email">Email</option>
                    <option value="Radio">Radio</option>
                    <option value="Referensi">Referensi</option>
                    <option value="Billboard">Billboard</option>
                    <option value="Commuter Line">Commuter Line</option>
                    <option value="Busway">Busway</option>
                    <option value="Lain-lain">Lain-lain</option>
                  </select> -->
                  <select id="ap_know_ut" class="form-control" name="know_kasbon"><option requiredvalue="" selected="selected">-- Pilih Satu --</option><option value="1">Google</option><option value="2">Facebook</option><option value="3">Twitter</option><option value="4">Email</option><option value="5">Radio</option><option value="6">Referensi</option><option value="7">Billboard</option><option value="8">Commuter Line</option><option value="9">Busway</option><option value="10">Others</option><option value="12">Opera</option></select>                </div>
                <div class="clearfix"></div>  
                <div class="panelbuttonnext">
                  <div class="row">
                    <div class="col-sm-5 pull-right pager wizard">
                      <input type="hidden" name="ap_email_address" value="{{ $ap_email_address }}">
                      <input type="hidden" name="principal_amount" value="{{ $principal_amount }}">
                      <input type="hidden" name="biaya_layanan" value="{{ $biaya_layanan }}">
                      <input type="hidden" name="totalPembayaran" value="{{ $totalPembayaran }}">
                      <input type="hidden" name="jatuhTempo" value="{{ $jatuhTempo }}">
                      <input type="hidden" name="duedate" value="{{ $due_date }}">
                      <input type="hidden" name="tab" value="1">
                      <button type="submit" id="lanjut-isi-detail" class="btn btn-primary next">Lanjut Isi Detail Anda &nbsp; &gt;</button>
                    </div>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
        <!-- Rincian Pinjaman -->
<div class="hidden-xs">
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
  <!-- / Rincian Pinjaman -->
      </div>
    </div>
    @stop