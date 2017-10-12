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
          <li class="progress__item progress__item--active col-xs-3">
              <span class="progress__item__name hidden-xs">DETAIL DATA ANDA</span>
              <span class="step"><span class="progress__item__num">2</span></span>
          </li>
          <li class="progress__item col-xs-3">
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

                
    <!-- Form Container -->
    <div class="container">
      <div class="row">
        
        <div class="col-md-9 col-md-9 small-no-padding">
          <div class="paneldata small-no-padding">
            <div class="panel-body">

              <div id="regTab">
                {!! Form::open(['url' => 'peminjaman-form/smsverifikasi' , 'form-ajax'=>'true','method' => 'post', 'id' => 'aplicant-form']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                  <ul class="nav nav-tabs nav-pills" role="tablist">

                    <li role="presentation" class="active">
                    <a data-sequence="1" data-toggle="tab" href="{{url('#pribadi')}}">Detail Pribadi</a></li>
                    <li role="presentation"><a data-sequence="2" href="{{url('#kontak')}}" role="tab" data-toggle="tab">Detail Kontak</a></li>
                    <li role="presentation"><a data-sequence="3" href="{{url('#bank')}}" role="tab" data-toggle="tab">Detail Bank</a></li>
                    <li role="presentation"><a data-sequence="4" href="{{url('#finansial')}}" role="tab" data-toggle="tab">Detail Lainnya</a></li>
                    <li role="presentation"><a data-sequence="5" href="{{url('#dokumen')}}" role="tab" data-toggle="tab">Dokumen Persetujuan</a></li>

                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                  <!-- Detail pribadi -->
                    <div role="tabpanel" class="tab-pane active" id="pribadi">
                      <div class="form-group">
                        
                        <div class="row">
                          <div class="col-sm-8">
                            <label>Nama Lengkap*</label>
                            <input type="text" class="form-control" required placeholder="Nama Sesuai KTP" name="ap_full_name" id="ap_full_name">
                          </div>
                          <div class="col-sm-4">
                            <label class="col-sm-12" style="padding-left:0px;">Jenis Kelamin <small>*</small></label>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" required value="M" name="ap_gender">
                                    Laki-laki
                                    <input id="principal_amount" name="principal_amount" type="hidden" value="Rp.1.800.000">
                                    <input id="due_date" name="due_date" type="hidden" value="20">
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" value="F" name="ap_gender">
                                    Perempuan
                                </label>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-7">
                            <label>Tempat Lahir*</label>
                            <input type="text" class="form-control" required name="ap_pob" id="ap_pob" placeholder="Isi sesuai KTP">
                          </div>                
                          <div class="col-sm-5">
                            <label>Tanggal Lahir*</label>
                            <input type="date" class="form-control adult" required name="ap_dob" id="ap_dob" placeholder="30/07/1998" value="">
                          </div>                
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <label>Agama*</label>
                            <select id="ap_religion" class="form-control" name="ap_religion" required><option value="" selected="selected">-- Agama --</option><option value="Islam">Islam</option><option value="Kristen Protestan">Kristen Protestan</option><option value="Kristen Katolik">Kristen Katolik</option><option value="Buddha">Buddha</option><option value="Hindu">Hindu</option><option value="Konghucu">Konghucu</option></select>                          </div>                
                          <div class="col-sm-4">
                            <label>Ras (Suku)*</label>
                            <select id="ap_race_id" class="form-control" required name="ap_race_id"><option value="" selected="selected">-- Ras (Suku) (Bahasa) --</option><option value="Banten">Banten</option><option value="6">Batak</option><option value="Betawi">Betawi</option><option value="Bugis">Bugis</option><option value="Cina">Cina</option><option value="Jawa">Jawa</option><option value="Madura">Madura</option><option value="Melayu">Melayu</option><option value="Minangkabau">Minangkabau</option><option value="Sunda">Sunda</option></select>                          </div>                
                          <div class="col-sm-4">
                            <label>Pendidikan*</label>
                            <select id="ap_education" class="form-control" required name="ap_education"><option value="" selected="selected">-- Pendidikan --</option><option value="SD">SD</option><option value="SLTP">SLTP</option><option value="SLTA">SLTA</option><option value="DIPLOMA I">DIPLOMA I</option><option value="5">DIPLOMA II</option><option value="DIPLOMA III">DIPLOMA III</option><option value="S1">S1</option><option value="S2">S2</option><option value="S3">S3</option></select>                          </div>                
                        </div>
                        <div class="row">
                          <div class="col-sm-7">
                            <label>Status Pernikahan*</label>
                            <select id="ap_marital_status" class="form-control" required name="ap_marital_status"><option value="" selected="selected">-- Status Pernikahan --</option><option value="married">Menikah</option><option value="single">Lajang</option><option value="divorced">Bercerai</option><option value="widowed">Janda</option><option value="widower">Duda</option></select></div>
                          <div class="col-sm-5">
                            <label>Jumlah Tanggungan*</label>
                            <input type="number" class="form-control" required placeholder="isi 0 jika tidak memiliki tanggungan" id="dependents" name="dependents" min="0">
                          </div>
                        </div>
                      </div>
                      
                      <!-- <div class="panelbuttonnext">
                        <div class="row">
                          <div class="col-sm-5 pull-right">
                            <a type="button" class="btn btn-primary" href="">Lanjut Isi Data Kontak &nbsp; ></a>
                          </div>
                        </div>
                      </div> -->

                    </div>
                    <!-- End Detail Pribadi -->

                    <!-- Detail Kontak -->
                    <div role="tabpanel" class="tab-pane" id="kontak">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-12">
                            <label>Nomor KTP*</label>
                            <input type="number" maxlength="16" class="form-control" required id="ap_personal_id_no" name="ap_personal_id_no" placeholder="Gunakan format KTP">
                          </div>
                        </div>
                        <div class="row">

                          <div class="col-sm-6">
                            <label>Nomor Selular*</label>

                            <div class="row">
                              <div class="col-sm-3" style="margin-bottom: 10px;">
                                <select id="ap_mobile_prefix" class="form-control" required name="ap_mobile_prefix"><option value="62">+62</option></select>                              </div>
                              <div class="col-sm-9">  
                                <input type="number" id="ap_mobile_no" name="ap_mobile_no" minlength="7" min="0" class="form-control" placeholder="Contoh: 8561231234">
                              </div>
                            </div>
                          </div>


                          <div class="col-sm-6">
                            <label>No Telepon Domisili*</label>

                            <div class="row">
                              <div class="col-sm-12">  
                                <input type="number" id="ap_telp_no" required name="ap_telp_no" minlength="6" min="0" class="form-control" placeholder="Contoh: 021 7522305">
                              </div>
                            </div>
                          </div>

                        </div>
                        <hr>
                        <span>Alamat Domisili</span>
                        <div class="row">
                          <div class="col-sm-12">
                            <label>Alamat Domisili</label>
                            <textarea class="form-control" required name="ap_dom_address" id="ap_dom_address" placeholder="Alamat domisili. Contoh: Jl. Mutiara II No. 10, RT 01 / RW 02"></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <label>Status Rumah</label>
                            <select id="ap_home_status2" required class="form-control" name="ap_home_status2"><option value="" selected="selected">-- Status Rumah --</option><option value="Own house">Rumah Sendiri</option><option value="With parents">Rumah Orang tua</option><option value="Housing Facility">Rumah dinas</option><option value="Rented house">Kontrak</option><option value="Boarding house">Kos</option><option value="Mess">Mess</option></select>                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                             <label>Provinsi Tempat Tinggal*</label>
                            <select id="ap_dom_province" class="form-control" name="ap_dom_province"><option value="" selected="selected">-- Provinsi --</option><option value="Bali">Bali</option><option value="Bangka Belitung">Bangka Belitung</option><option value="Banten">Banten</option><option value="Bengkulu">Bengkulu</option><option value="DI Yogyakarta">DI Yogyakarta</option><option value="DKI Jakarta">DKI Jakarta</option><option value="Gorontalo">Gorontalo</option><option value="Jambi">Jambi</option><option value="Jawa Barat">Jawa Barat</option><option value="Jawa Tengah">Jawa Tengah</option><option value="Jawa Timur">Jawa Timur</option><option value="Kalimantan Barat">Kalimantan Barat</option><option value="Kalimantan Selatan">Kalimantan Selatan</option><option value="Kalimantan Tengah">Kalimantan Tengah</option><option value="Kalimantan Timur">Kalimantan Timur</option><option value="Kalimantan Utara">Kalimantan Utara</option><option value="Kepulauan Riau">Kepulauan Riau</option><option value="Lampung">Lampung</option><option value="Maluku">Maluku</option><option value="Maluku Utara">Maluku Utara</option><option value="Nanggroe Aceh Darussalam (NAD)">Nanggroe Aceh Darussalam (NAD)</option><option value="Nusa Tenggara Barat (NTB)">Nusa Tenggara Barat (NTB)</option><option value="Nusa Tenggara Timur (NTT)">Nusa Tenggara Timur (NTT)</option><option value="Papua">Papua</option><option value="Papua Barat">Papua Barat</option><option value="Riau">Riau</option><option value="Sulawesi Barat">Sulawesi Barat</option><option value="Sulawesi Selatan">Sulawesi Selatan</option><option value="Sulawesi Tengah">Sulawesi Tengah</option><option value="Sulawesi Tenggara">Sulawesi Tenggara</option><option value="Sulawesi Utara">Sulawesi Utara</option><option value="Sumatera Barat">Sumatera Barat</option><option value="Sumatera Selatan">Sumatera Selatan</option><option value="Sumatera Utara">Sumatera Utara</option><option value="Tabalong">Tabalong</option></select>                          </div>
                          <div class="col-sm-4">
                            <label>Kota Tempat Tinggal</label>
                            <select id="ap_dom_kab_kot" class="form-control" name="ap_dom_kab_kot"><option value="" selected="selected">-- Kota Tempat Tinggal --</option></select>                          </div>
                          <div class="col-sm-4">
                            <label>Kecamatan*</label>
                            <select id="ap_dom_kecamatan" class="form-control" name="ap_dom_kecamatan"><option value="" selected="selected">-- Kecamatan --</option></select>                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <label>Kelurahan*</label>
                            <select id="ap_dom_kelurahan" class="form-control" name="ap_dom_kelurahan"><option value="" selected="selected">-- Kelurahan --</option></select>                          </div>
                          <div class="col-sm-8">
                            <label>Kode Pos Tempat Tinggal*</label>
                            <input type="text" id="ap_dom_postal_code" name="ap_dom_postal_code" class="form-control" readonly="" value="">
                          </div>
                        </div>
                        <hr>
                        <span>Data Keluarga Dekat</span> (satu kota dan tidak serumah)
                        <div class="row">
                          <div class="col-sm-6">
                            <label>Nama Keluarga*</label>
                            <input type="hidden"name="id_kota" value="">
                            <input type="text" id="ap_fam1_name" required name="ap_fam1_name" minlength="3" class="form-control" placeholder="Isi dengan Nama Keluarga">
                          </div>
                          <div class="col-sm-6">
                            <label>Nomor Telepon Keluarga*</label>
                            <input type="number" class="form-control" required id="ap_telp_fam1" name="ap_telp_fam1" minlength="6" placeholder="Contoh: 021 7522305">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <label>Alamat Keluarga*</label>
                            <textarea class="form-control" id="ap_fam1_address" required name="ap_fam1_address" minlength="5" rows="3" placeholder="Alamat domisili. Contoh: Jl. Mutiara II No. 10, RT 01 / RW 02"></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <label>Provinsi Keluarga Dekat*</label>
                            <select id="ap_fam1_province" class="form-control" required name="ap_fam1_province">
                            <option value="" selected="selected">-- Provinsi --</option><option value="Bali">Bali</option><option value="Bangka Belitung">Bangka Belitung</option><option value="Banten">Banten</option><option value="Bengkulu">Bengkulu</option><option value="DI Yogyakarta">DI Yogyakarta</option><option value="DKI Jakarta">DKI Jakarta</option><option value="Gorontalo">Gorontalo</option><option value="Jambi">Jambi</option><option value="Jawa Barat">Jawa Barat</option><option value="Jawa Tengah">Jawa Tengah</option><option value="Jawa Timur">Jawa Timur</option><option value="Kalimantan Barat">Kalimantan Barat</option><option value="Kalimantan Selatan">Kalimantan Selatan</option><option value="Kalimantan Tengah">Kalimantan Tengah</option><option value="Kalimantan Timur">Kalimantan Timur</option><option value="Kalimantan Utara">Kalimantan Utara</option><option value="Kepulauan Riau">Kepulauan Riau</option><option value="Lampung">Lampung</option><option value="Maluku">Maluku</option><option value="Maluku Utara">Maluku Utara</option><option value="Nanggroe Aceh Darussalam (NAD)">Nanggroe Aceh Darussalam (NAD)</option><option value="Nusa Tenggara Barat (NTB)">Nusa Tenggara Barat (NTB)</option><option value="Nusa Tenggara Timur (NTT)">Nusa Tenggara Timur (NTT)</option><option value="Papua">Papua</option><option value="Papua Barat">Papua Barat</option><option value="Riau">Riau</option><option value="Sulawesi Barat">Sulawesi Barat</option><option value="Sulawesi Selatan">Sulawesi Selatan</option><option value="Sulawesi Tengah">Sulawesi Tengah</option><option value="Sulawesi Tenggara">Sulawesi Tenggara</option><option value="Sulawesi Utara">Sulawesi Utara</option><option value="Sumatera Barat">Sumatera Barat</option><option value="Sumatera Selatan">Sumatera Selatan</option><option value="Sumatera Utara">Sumatera Utara</option><option value="Tabalong">Tabalong</option>
                            </select>
                          </div>
                          <div class="col-sm-4">
                            <label>Kota Keluarga Dekat</label>
                            <select id="ap_fam1_kab_kot" class="form-control" required name="ap_fam1_kab_kot"><option value="" selected="selected">-- Kota Tempat Tinggal --</option></select>                          </div>
                          <div class="col-sm-4">
                            <label>Kecamatan Keluarga Dekat*</label>
                             <select id="ap_fam1_kecamatan" class="form-control" required name="ap_fam1_kecamatan"><option value="" selected="selected">-- Kecamatan Keluarga Dekat --</option></select>                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <label>Kelurahan Keluarga Dekat</label>
                            <select id="ap_fam1_kelurahan" class="form-control" required name="ap_fam1_kelurahan"><option value="" selected="selected">-- Kelurahan Keluarga Dekat --</option></select>                          </div>
                          <div class="col-sm-8">
                            <label>Kode Pos Keluarga Dekat*</label>
                            <input type="text" id="ap_fam1_postal_code" name="ap_fam1_postal_code" class="form-control" readonly="" value="">
                          </div>
                        </div>
                      </div>
                      
                      <!-- <div class="panelbuttonnext">
                        <div class="row">
                          <div class="col-sm-7">
                            <a class="kembali" href="">Kembali</a>
                          </div>
                          <div class="col-sm-5">
                            <a type="button" class="btn btn-primary" href="">Lanjut Isi Data Bank &nbsp; ></a>
                          </div>
                        </div>
                      </div> -->

                    </div>
                    <!-- End of Detail Kontak -->

                    <!-- Detail Bank -->
                    <div role="tabpanel" class="tab-pane" id="bank">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-4">
                            <label>Nama Bank*</label>
                            <select id="ap_bank_name_id" class="form-control" required  name="ap_bank_name_id"><option value="" selected="selected">-- Nama Bank --</option><option value="138">BNI Syariah</option><option value="2">BCA</option><option value="1">Mandiri</option><option value="4">BRI</option><option value="6">Bank Danamon</option><option value="3">BNI</option><option value="7">Permata Bank</option><option value="8">BII</option><option value="9">Bank Panin</option><option value="11">Bank CIMB Niaga</option><option value="10">Bank Arta Niaga Kencana</option><option value="13">Bank Lippo</option><option value="50">Bank DKI</option><option value="12">Bank Buana Indonesia</option><option value="49">Bank Jabar</option><option value="52">Bank Jateng</option><option value="53">Bank Jatim</option><option value="54">BPD Jambi</option><option value="55">BPD Aceh</option><option value="51">BPD DIY</option><option value="14">Bank NISP</option><option value="15">American Express Bank Ltd</option><option value="5">Bank Ekspor Indonesia</option><option value="16">Citibank N.A.</option><option value="17">JP. Morgan Chase Bank, N.A. </option><option value="18">Bank of America, N.A</option><option value="19">Ing Indonesia Bank</option><option value="20">Bank Multicor Tbk</option><option value="21">Bank Artha Graha </option><option value="22">Bank Credit Agricole Indosuez</option><option value="23">The Bangkok Bank Comp. Ltd</option><option value="24">The Hongkong &amp; Shanghai B.C.</option><option value="25">The Bank of Tokyo Mitsubishi UFJ Ltd</option><option value="26">Bank Sumitomo Mitsui Indonesia</option><option value="27">Bank Dbs Indonesia</option><option value="28">Bank Resona Perdania</option><option value="29">Bank Mizuho Indonesia</option><option value="30">Standard Chartered Bank</option><option value="31">Bank ABN Amro</option><option value="32">Bank Keppel Tatlee Buana</option><option value="33">Bank Capital Indonesia, Tbk.</option><option value="34">Bank BNP Paribas Indonesia</option><option value="35">Bank UOB Indonesia</option><option value="36">Korea Exchange Bank Danamon</option><option value="37">Rabobank Internasional Indonesia</option><option value="38">ANZ Panin Bank</option><option value="39">Deutsche Bank Ag.</option><option value="40">Bank Woori Indonesia</option><option value="41">Bank of China Limited</option><option value="42">Bank Bumi Arta</option><option value="43">Bank Ekonomi</option><option value="44">Bank Antardaerah</option><option value="45">Bank Haga</option><option value="46">Bank IFI</option><option value="47">Bank Century, Tbk.</option><option value="48">Bank Mayapada</option><option value="56">Bank Sumut</option><option value="57">Bank Nagari</option><option value="58">Bank Riau</option><option value="59">Bank Sumsel</option><option value="60">Bank Lampung</option><option value="61">BPD Kalsel</option><option value="62">BPD Kalimantan Barat</option><option value="63">BPD Kaltim</option><option value="64">BPD Kalteng</option><option value="65">BPD Sulsel</option><option value="66">Bank Sulut</option><option value="67">BPD NTB</option><option value="68">BPD Bali</option><option value="69">Bank NTT</option><option value="70">Bank Maluku</option><option value="71">BPD Papua</option><option value="72">Bank Bengkulu</option><option value="73">BPD Sulawesi Tengah</option><option value="74">Bank Sultra</option><option value="75">Bank Nusantara Parahyangan</option><option value="76">Bank Swadesi</option><option value="77">Bank Muamalat</option><option value="78">Bank Mestika</option><option value="79">Bank Metro Express</option><option value="80">Bank Shinta Indonesia</option><option value="81">Bank Maspion</option><option value="82">Bank Hagakita </option><option value="83">Bank Ganesha</option><option value="84">Bank Windu Kentjana</option><option value="85">Halim Indonesia Bank</option><option value="86">Bank Harmoni International</option><option value="87">Bank Kesawan</option><option value="88">Bank Tabungan Negara (PERSERO)</option><option value="89">Bank Himpunan Saudara 1906, Tbk</option><option value="90">Bank Tabungan Pensiunan Nasional</option><option value="91">Bank Swaguna</option><option value="92">Bank Jasa Arta</option><option value="93">Bank Mega</option><option value="94">Bank Jasa Jakarta</option><option value="95">Bank Bukopin</option><option value="96">Bank Syariah Mandiri</option><option value="97">Bank Bisnis Internasional</option><option value="98">Bank Sri Partha</option><option value="100">Bank Bintang Manunggal</option><option value="101">Bank Bumiputera</option><option value="102">Bank Yudha Bhakti</option><option value="103">Bank Mitraniaga</option><option value="104">Bank Agro Niaga</option><option value="105">Bank Indomonex</option><option value="106">Bank Royal Indonesia</option><option value="107">Bank Alfindo</option><option value="108">Bank Syariah Mega</option><option value="109">Bank INA Perdana</option><option value="110">Bank Harfa</option><option value="111">Prima Master Bank</option><option value="112">Bank Persyarikatan Indonesia</option><option value="113">Bank Akita</option><option value="114">Liman International Bank</option><option value="115">Anglomas Internasional Bank</option><option value="116">Bank Dipo International</option><option value="117">Bank Kesejahteraan Ekonomi</option><option value="118">Bank UOB</option><option value="119">Bank Artos Ind</option><option value="120">Bank Purba Danarta</option><option value="121">Bank Multi Arta Sentosa</option><option value="122">Bank Mayora</option><option value="123">Bank Index Selindo</option><option value="124">Bank Victoria International</option><option value="125">Bank Eksekutif</option><option value="126">Centratama Nasional Bank</option><option value="127">Bank Fama Internasional</option><option value="128">Bank Sinar Harapan Bali</option><option value="129">Bank Harda</option><option value="130">Bank Finconesia</option><option value="131">Bank Merincorp</option><option value="132">Bank Maybank Indocorp</option><option value="133">Bank OCBC Indonesia</option><option value="134">Bank Commonweatlh</option><option value="135">Bank China Trust Indonesia</option><option value="136">Bank Sinarmas</option><option value="137">BRI Syariah</option><option value="139">Bank Jabar Syariah</option></select>                          </div>
                          <div class="col-sm-8">
                            <label>Nomor Akun Bank*</label>
                            <input type="number" class="form-control" required id="ap_bank_number" name="ap_bank_number" minlength="3" placeholder="Nomor rekening bank">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-8 pull-right">
                            <label>Nama Pemilik Akun*</label>
                            <input type="text" id="ap_bank_username" required name="ap_bank_username" minlength="3" class="form-control" placeholder="Rekening harus atas nama pemohon">
                          </div>
                        </div>
                      </div>
                      <!-- <div class="panelbuttonnext">
                        <div class="row">
                          <div class="col-sm-7">
                            <a class="kembali" href="">Kembali</a>
                          </div>
                          <div class="col-sm-5">
                            <a type="button" class="btn btn-primary" href="">Lanjut Isi Data Finansial &nbsp; ></a>
                          </div>
                        </div>
                      </div> -->
                    </div>
                    <!-- End of Detail Bank -->

                    <!-- Data Finansial -->
                    <div role="tabpanel" class="tab-pane" id="finansial">
                      <h2>Pekerjaan &amp; Penghasilan</h2>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <label>Nama Perusahaan*</label>
                            <input type="text" class="form-control" id="ap_employer_name" required name="ap_employer_name" minlength="3" placeholder="Isi dengan nama kantor">
                          </div>
                          <div class="col-sm-6">
                            <label>Nomor Telepon Perusahaan*</label>
                            <input type="number" id="ap_telp_work" name="ap_telp_work" required minlength="6" class="form-control" placeholder="Contoh: 021 7522305">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <label>Alamat Perusahaan</label>
                            <textarea class="form-control" name="ap_employer_address" required id="ap_employer_address" placeholder="Alamat domisili. Contoh: Jl. Mutiara II No. 10, RT 01 / RW 02"></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <label>Provinsi*</label>
                            <select id="ap_employer_province" class="form-control" required name="ap_employer_province"><option value="" selected="selected">-- Provinsi --</option><option value="Bali">Bali</option><option value="Bangka Belitung">Bangka Belitung</option><option value="Banten">Banten</option><option value="Bengkulu">Bengkulu</option><option value="DI Yogyakarta">DI Yogyakarta</option><option value="DKI Jakarta">DKI Jakarta</option><option value="Gorontalo">Gorontalo</option><option value="Jambi">Jambi</option><option value="Jawa Barat">Jawa Barat</option><option value="Jawa Tengah">Jawa Tengah</option><option value="Jawa Timur">Jawa Timur</option><option value="Kalimantan Barat">Kalimantan Barat</option><option value="Kalimantan Selatan">Kalimantan Selatan</option><option value="Kalimantan Tengah">Kalimantan Tengah</option><option value="Kalimantan Timur">Kalimantan Timur</option><option value="Kalimantan Utara">Kalimantan Utara</option><option value="Kepulauan Riau">Kepulauan Riau</option><option value="Lampung">Lampung</option><option value="Maluku">Maluku</option><option value="Maluku Utara">Maluku Utara</option><option value="Nanggroe Aceh Darussalam (NAD)">Nanggroe Aceh Darussalam (NAD)</option><option value="Nusa Tenggara Barat (NTB)">Nusa Tenggara Barat (NTB)</option><option value="Nusa Tenggara Timur (NTT)">Nusa Tenggara Timur (NTT)</option><option value="Papua">Papua</option><option value="Papua Barat">Papua Barat</option><option value="Riau">Riau</option><option value="Sulawesi Barat">Sulawesi Barat</option><option value="Sulawesi Selatan">Sulawesi Selatan</option><option value="Sulawesi Tengah">Sulawesi Tengah</option><option value="Sulawesi Tenggara">Sulawesi Tenggara</option><option value="Sulawesi Utara">Sulawesi Utara</option><option value="Sumatera Barat">Sumatera Barat</option><option value="Sumatera Selatan">Sumatera Selatan</option><option value="Sumatera Utara">Sumatera Utara</option><option value="Tabalong">Tabalong</option></select>                          </div>
                          <div class="col-sm-4">
                            <label>Kota</label>
                            <select id="ap_employer_kab_kot" class="form-control" required name="ap_employer_kab_kot"><option value="" selected="selected">-- Kota --</option></select>                          </div>
                          <div class="col-sm-4">
                            <label>Kecamatan*</label>
                            <select id="ap_employer_kecamatan" class="form-control" required name="ap_employer_kecamatan"><option value="" selected="selected">-- Kecamatan --</option></select>                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <label>Kelurahan*</label>
                            <select id="ap_employer_kelurahan" class="form-control" required name="ap_employer_kelurahan"><option value="" selected="selected">-- Kelurahan --</option></select>                          </div>
                          <div class="col-sm-8">
                            <label>Kode Pos*</label>
                            <input type="text" id="ap_employer_postal_code" required name="ap_employer_postal_code" class="form-control" readonly="" value="">
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-6">
                            <label>Jenis Perkerjaan*</label>
                            <select id="ap_mrtw_id" class="form-control" required name="ap_mrtw_id"><option value="" selected="selected">-- Tipe Pekerjaan --</option><option value="1">Anggota Parlemen (DPR, MPR, DPRD)</option><option value="5">Hakim, Pejabat di Pengadilan </option><option value="7">Insinyur Pengebor Minyak Lepas Pantai</option><option value="4">Konsultan Hukum, Pengacara</option><option value="6">Notaris</option><option value="11">Pegawai Negeri</option><option value="10">Pegawai Swasta</option><option value="2">Pejabat Militer/Polisi   </option><option value="8">Pelaut/Kapten Kapal</option><option value="3">Pemuka Agama / Pendeta</option><option value="9">Pengusaha</option><option value="12">Wiraswasta</option></select>                          </div>
                          <div class="col-sm-6">
                            <label>Posisi</label>
                            <input type="text" id="ap_employer_role" required name="ap_employer_role" minlength="3" class="form-control" placeholder="Isi dengan posisi / jabatan">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <label>Penghasilan Bulanan</label>
                            <input type="number" id="ap_monthly_income" required name="ap_monthly_income" minlength="5" class="form-control" placeholder="Contoh penulisan: 3000000 untuk 3 juta rupiah">
                          </div> 
                          <div class="col-sm-4">
                            <label>Lama Bekerja</label>
                            <select name="hll_years_work" id="hll_years_work" required class="form-control">
                                <option value="">-- Tahun --</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                    <option value="15">15</option>
                                                                    <option value="16">16</option>
                                                                    <option value="17">17</option>
                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option value="20">20</option>
                                                                    <option value="21">21</option>
                                                                    <option value="22">22</option>
                                                                    <option value="23">23</option>
                                                                    <option value="24">24</option>
                                                                    <option value="25">25</option>
                                                                    <option value="26">26</option>
                                                                    <option value="27">27</option>
                                                                    <option value="28">28</option>
                                                                    <option value="29">29</option>
                                                                    <option value="30">30</option>
                                                                    <option value="31">31</option>
                                                                    <option value="32">32</option>
                                                                    <option value="33">33</option>
                                                                    <option value="34">34</option>
                                                                    <option value="35">35</option>
                                                                    <option value="36">36</option>
                                                                    <option value="37">37</option>
                                                                    <option value="38">38</option>
                                                                    <option value="39">39</option>
                                                                    <option value="40">40</option>
                                                                    <option value="41">41</option>
                                                                    <option value="42">42</option>
                                                                    <option value="43">43</option>
                                                                    <option value="44">44</option>
                                                                    <option value="45">45</option>
                                                                    <option value="46">46</option>
                                                                    <option value="47">47</option>
                                                                    <option value="48">48</option>
                                                                    <option value="49">49</option>
                                                                    <option value="50">50</option>
                                                            </select>
                          </div> 
                          <div class="col-sm-4">
                            <label>&nbsp;</label>
                            <select name="hll_months_work" id="hll_months_work" required class="form-control">
                                <option value="">-- Bulan --</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                            </select>
                          </div> 
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <label>Pengeluaran Utama*</label>
                            <input type="number" id="mainexpenses" name="mainexpenses" required class="form-control" placeholder="Contoh penulisan: 2000000 untuk 2 juta rupiah">
                          </div>
                          <div class="col-sm-6">
                            <label>Angsuran KPR*</label>
                            <input type="number" id="houseloan" name="houseloan" required class="form-control" placeholder="Isi 0 jika tidak memiliki cicilan Kredit Kepemilikan Rumah (KPR)">
                          </div>
                        </div>

                       

                      </div>
                      
                      <!-- <div class="panelbuttonnext">
                        <div class="row">
                          <div class="col-sm-6">
                            <a class="kembali" href="">Kembali</a>
                          </div>
                          <div class="col-sm-6">
                            <a type="button" class="btn btn-primary" href="">Lanjut ke Dokumen Persetujuan &nbsp; ></a>
                          </div>
                        </div>
                      </div> -->

                    </div>
                    <!-- End of Detail Finansial -->

                    <!-- Dokumen Persetujuan -->
                    <div role="tabpanel" class="tab-pane" id="dokumen">
                      <div class="row" style="border-right: solid 1px #f0f0f0;border-top: solid 1px #f0f0f0;border-left: solid 1px #f0f0f0;">
                        <div class="col-sm-12">
                          <div class="panelpersetujuan" id="divAgreementDoc" style="width:100%; height:450px; overflow-y:scroll;border:none;">

                            <table style="width:100%">
                              <!-- start data debitur -->
                              <tbody><tr>
                                  <td>
                                      <table style="width:100%; border-bottom: 1px solid">
                                          <tbody><tr>
                                              <td>
                                                  <strong>DATA DEBITUR</strong>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  Email:
                                              </td>
                                              <td>
                                                  <span id="custEmail">aliffarhanarizkia@gmail.com</span>
                                              </td>
                                          </tr>
                                          
                                          <tr>
                                              <td colspan="4">
                                                  <!-- <strong>Alamat terdaftar adalah sebagaimana tercantum dalam KTP Debitur, yang mana salinannya telah diberikan kepada Kreditur, dan sebagai bagian yang merupakan satu kesatuan dan tidak terpisahkan dari Perjanjian Pinjaman Pribadi ini.</strong> -->
                                              </td>
                                          </tr>
                                      </tbody></table>
                                  </td>
                              </tr>
                              <!-- end data debitur -->
                              <!-- start dokumen -->
                              <tr>
                                  <td>
                                      <table style="width:100%; border-bottom: 1px solid;">
                                          <tbody><tr>
                                              <td>
                                                  <strong>DOKUMEN</strong>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  KTP
                                              </td>
                                              <td>
                                                  <span id="custKTP"></span>
                                              </td>
                                          </tr>
                                      </tbody></table>
                                  </td>
                              </tr>
                              <!-- end dokumen -->
                              <!-- start rincian -->
                              <tr>
                                  <td>
                                      <table style="width:100%; border-bottom:1px solid;">
                                          <tbody><tr>
                                              <td>
                                                  <strong>RINCIAN PEMBIAYAAN</strong>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  Jumlah Pinjaman:
                                              </td>
                                              <td>
                                                  <span id="custPrincipal">{{ $principal_amount }}</span>
                                              </td>
                                          </tr>x
                                          <tr>
                                              <td colspan="2">
                                                  *efektif di mulai setelah tanggal pencairan
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  Suku Bunga Pinjaman:
                                              </td>
                                              <td>
                                                  <span id="custFees">{{ $biaya_layanan }}</span>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  Jumlah Total Pinjaman yang harus dikembalikan:
                                              </td>
                                              <td>
                                                  <span id="custPayback">{{ $totalPembayaran }}</span>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  Tanggal Jatuh Tempo Pinjaman:
                                              </td>
                                              <td>
                                                  <span id="custDueDate">{{ $jatuhTempo }}</span>
                                              </td>
                                          </tr>
                                       </tbody></table>
                                  </td>
                              </tr>
                              <!-- end rincian -->
                              <!-- start pernyataan -->
                              <tr>
                                  <td>
                                      <table>
                                                                                    <tbody><tr>
                                              <td>
                                                  Perjanjian Pinjaman Pribadi ini (bersama dengan semua Lampiran, addendum dan setiap perubahan atasnya akan disebut sebagai “PERJANJIAN PINJAMAN PRIBADI” atau “PERJANJIAN”) dibuat dan ditandatangani oleh dan antara: Kreditur dan Debitur melalui perantara digital, sebagaimana didefinisikan pada Tabel Perincian Pinjaman Pribadi di atas.
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <strong>PERNYATAAN:</strong>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <strong>Debitur</strong> dengan ini menyatakan sebagai berikut:
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  1. Debitur setuju dan mengerti bahwa kreditur telah menunjuk PT Digital Alpha Indonesia sebagai sebuah perusahaan web portal yang akan menghubungkan Debitur dengan Kreditur, termasuk namun tidak terbatas untuk melakukan promosi FASILITAS, proses pendaftaran, proses penagihan atas PINJAMAN yang diberikan Kreditur kepada Debitur. Seluruh pembayaran atau biaya yang dibayarkan melalui PT DIGITAL ALPHA INDONESIA adalah untuk kepentingan dan keuntungan KREDITUR. Segala sengketa yang timbul terkait dengan penafsiran dan pelaksanaan PERJANJIAN ini, akan diselesaikan antara Debitur dan Kreditur.<br>
                                                  2. Debitur tertarik untuk mengajukan permohonan penyediaan jasa keuangan yang ditawarkan dan diberikan oleh Kreditur, termasuk, tetapi tidak terbatas pada, fasilitas pinjaman pribadi dalam bentuk pinjaman tunai (selanjutnya disebut sebagai “FASILITAS”) untuk keperluan dana pendidikan, dana darurat, penyembuhan, pembelian komoditas/barang tertentu (sebagaimana dijelaskan dalam Tabel Perincian Pinjaman Pribadi di atas) (selanjutnya disebut sebagai “PINJAMAN”), dari DIGITAL ALPHA GROUP Pte. Ltd (sebagaimana dijelaskan juga dalam Tabel Perincian Pinjaman Pribadi di atas) (selanjutnya disebut sebagai “Kreditur”).<br>
                                                  3. Debitur memahami bahwa persetujuan atas FASILITAS tersebut adalah semata-mata berdasarkan penilaian mutlak dari Kreditur dan berdasarkan penandatanganan Debitur atas dokumen-dokumen hukum yang diperlukan dan formalitas lain yang disyaratkan oleh Kreditur.<br>
                                                  4. Debitur memahami dan menyetujui bahwa Debitur diwajibkan untuk memberikan data dan informasi yang benar dan lengkap kepada Kreditur terkait setiap aspek dari informasi pribadi, kegiatan usaha/pekerjaan, kredit dan posisi keuangan Debitur termasuk, tetapi tidak terbatas pada foto dari Debitur (selanjutnya disebut sebagai “DATA PRIBADI”) sehingga memungkinkan Kreditur untuk menilai apakah Debitur memenuhi syarat untuk mendsapatkan FASILITAS dan jasa keuangan lainnya yang akan ditawarkan dan diberikan oleh Kreditur. Debitur juga menyetujui bahwa Debitur akan bertanggung jawab secara hukum untuk setiap pemalsuan dari, dan penggunaan secara tidak sah atas, DATA PRIBADI yang diberikan kepada Kreditur.<br>
                                                  5. Debitur memahami dan menyetujui bahwa DATA PRIBADI yang diberikan disini kepada Kreditur, akan digunakan, oleh Kreditur, untuk memproses permohonan FASILITAS dan/atau memenuhi peraturan perundang-undangan yang berlaku. Debitur dengan ini memberikan kuasa dan wewenang penuh kepada Kreditur dan perwakilannya yang sah untuk, pada setiap saat, tanpa pemberitahuan kepada Debitur, melaksanakan seluruh atau setiap tindakan dan fungsi-fungsi: (i) pengumpulan, penyimpanan, penggunaan, pemeliharaan, penganalisaan, perumusan, penyiaran dan penyebaran atas DATA PRIBADI; (ii) melakukan pemeriksaan kredit, referensi dan membuat pertanyaan-pertanyaan dan verifikasi berdasarkan data dan informasi yang diberikan kepada, atau dikumpulkan oleh, Kreditur apabila dan pada saat Kreditur mempertimbangkan perlunya hal tersebut semata-mata berdasarkan penilaian mutlaknya; dan (iii) membagi, mendapatkan dan/atau mengungkapkan DATA PRIBADI kepada/dari setiap biro informasi kredit, lembaga keuangan, setiap otoritas pemerintah lain yang berwenang atau setiap pihak ketiga yang terikat perjanjian dengan Kreditur untuk keperluan verifikasi dan penilaian yang sesuai atas informasi dan DATA PRIBADI.<br>
                                                  6. Debitur juga setuju bahwa Kreditur dapat menyediakan DATA PRIBADI kepada badan hukum dan orang-orang lainnya yang bekerjasama dengan Kreditur pada saat (a) melaksanakan PERJANJIAN ini;(b) memberlakukan pelaksanaan PERJANJIAN ini; (c) melaksanakan tujuan kegiatan usaha Kreditur; dan (d) melaksanakan kewajiban-kewajiban yang ditetapkan oleh peraturan perundang-undangan yang berlaku. Berdasarkan ini, Kreditur berhak untuk menyediakan DATA PRIBADI khususnya, tetapi tidak terbatas, kepada penasihat-penasihat hukum, keuangan dan perpajakan, perusahaan yang melaksanakan layanan pengemasan dan pos, bank dan badan hukum atau orang-orang lainnya yang memastikan, mengatur atau menyediakan sumber pembiayaan, badan-badan pengawas, pengadilan, juru sita dan  sebagainya.<br>
                                                  7. Debitur juga setuju bahwa DATA PRIBADI dapat dikumpulkan dan diproses dalam sistem informasi Kreditur untuk keperluan (a) pemrosesan dan pengiriman penawaran produk dan layanan Kreditur; (b) pengikutsertaan Debitur pada program kesetiaan pelanggan; (c) pemilihan pelanggan untuk membuat penawaran produk dan layanan dan untuk penilaiannya; (d) riset pemasaran oleh Kreditur; dan (e) pengiriman penawaran produk dan layanan. Kreditur tidak bertanggung jawab pada isi dari penawaran-penawaran tersebut.<br>
                                                  8. Debitur juga menyetujui, dan dengan ini memberikan kuasa dan wewenang penuh kepada Kreditur, karyawan, agen dan perusahaan terkaitnya, bahwa mereka dapat berbagi dan menggunakan DATA PRIBADI Debitur untuk berbagai macam skema tawaran pembiayaan lainnya atau skema promosi pembiayaan atau setiap skema promosi lainnya, yang dapat ditawarkan dan disediakan oleh Kreditur.<br>
                                                  9. Debitur juga setuju dan dengan ini memberi kuasa dan wewenang penuh kepada Kreditur untuk membuat dan menyimpan salinan/fotokopi dokumen identitas Debitur dan dokumen lainnya yang diserahkan oleh Debitur kepada Kreditur. Debitur juga setuju bahwa Kreditur dapat menggunakan salinan/fotokopi dokumen identitas Debitur tersebut untuk keperluan perlindungan hak dan kepentingan Debitur dan/atau Kreditur.<br>
                                                  10. Debitur mengakui dan menyetujui bahwa syarat-syarat dan ketentuan nomor 01/PT-DAI/SYARAT&amp;KETENTUAN/I/2015 (selanjutnya disebut sebagai “Syarat dan Ketentuan”) dan cara pelunasan pinjaman pribadi (selanjutnya disebut sebagai “Pelunasan Pinjaman”) dari PERJANJIAN ini merupakan suatu bagian integral dan tidak terpisahkan dari PERJANJIAN dan, oleh karenanya, Debitur dengan ini menyatakan bahwa dia telah mengetahui Syarat dan Ketentuan serta Pelunasan Pinjaman tersebut, memahaminya, termasuk kuasa yang diberikan berdasarkan Syarat dan Ketentuan tersebut dan berjanji untuk terikat pada Syarat dan Ketentuan serta Jadwal Angsuran tersebut.<br>
                                                  11. Tandatangan Debitur yang digunakan dalam PERJANJIAN ini menggunakan tanda tangan elektronik yang sama dengan tandatangan yang digunakan dalam dokumen-dokumen hukum lain miliknya termasuk, tetapi tidak terbatas pada, Kartu Tanda Penduduk (KTP) atau paspor dan, oleh karenanya, penggunaan tandatangan tersebut adalah sah.<br>
                                                  12. Debitur mengakui dan menyetujui bahwa PERJANJIAN beserta Syarat dan Ketentuan dan Pelunasan Pinjaman  yang ditandatangani menggunakan tanda tangan elektronik merupakan tanda tangan yang sah dari pihak Debitur.<br>
                                                  13. Debitur telah menerima salinan asli dari: (a) PERJANJIAN ini; (b) Syarat dan Ketentuan; dan (c) Cara Pelunasan Pinjaman Pribadi.
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  Kedua belah pihak, Kreditur dan Debitur, dengan ini menyatakan sebagai berikut:
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  1. Bahwa Kreditur adalah perusahaan yang  telah didirikan dengan sah dan memiliki kekuatan dan kewenangan untuk menandatangani dan melaksanakan kewajiban-kewajibannya menurut PERJANJIAN ini dan <br>
                                                  2. Debitur memiliki kekuatan dan kewenangan untuk menandatangani dan melaksanakan kewajiban-kewajibannya menurut PERJANJIAN ini. <br>
                                                  3. Bahwa Kreditur, Debitur dan FASILITAS tunduk kepada Syarat dan Ketentuan sebagaimana diatur dalam PERJANJIAN. DEMIKIANLAH, PERJANJIAN ini dibuat dan ditandatangani oleh Kreditur dan Debitur di Jakarta, pada<span id="custSignDate"></span>. <br>
                                              </td>
                                          </tr>
                                      </tbody></table>
                                  </td>
                              </tr>
                              <!-- end pernyataan -->
                              <!-- start tc -->
                              <tr>
                                  <td>
                                      <table style="width:100%">
                                          <tbody><tr>
                                              <td align="center">
                                                  <strong>SYARAT DAN KETENTUAN UMUM<br>Nomor 01/PT_DAI/SYARAT&amp;KETENTUAN/I/2015</strong>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <p>
                                                      1. SYARAT-SYARAT UMUM<br>
                                                      1.1. Debitur merupakan WNI berdomisili di Indonesia. Usia minimum 21 (dua puluh satu) tahun sesuai dengan batasan usia cakap hukum menurut KUH Perdata.<br>
                                                      1.2. DEBITUR telah mengajukan permohonan kepada KREDITUR untuk memberikan FASILITAS kepada DEBITUR dan KREDITUR dengan ini menyetujui permohonan untuk menyediakan FASILITAS pinjaman sesuai dengan Syarat dan Ketentuan PERJANJIAN ini dan, dengan demikian, DEBITUR dengan ini menyetujui untuk melakukan pelunasan setiap dan seluruh jumlah hutang atas pinjaman yang diberikan oleh KREDITUR.<br>
                                                      1.3. KREDITUR dan DEBITUR dengan ini menyetujui Syarat dan Ketentuan sebagaimana diatur di dalam Tabel Perincian Pinjaman Pribadi, setiap penambahan dan perubahan atas PERJANJIAN  dan/atau perjanjian lainnya yang merupakan satu kesatuan dan bagian yang tidak terpisahkan dari PERJANJIAN termasuk, tetapi tidak terbatas pada, jumlah hutang pokok, jangka waktu pembiayaan, pembayaran pinjaman dan denda untuk keterlambatan pembayaran pinjaman.<br>
                                                      1.4. Istilah yang didefinisikan dalam Syarat dan Ketentuan ini menggunakan definisi sebagaimana dinyatakan dalam Tabel Perincian Pinjaman Pribadi dan Jadwal Angsuran, kecuali apabila didefinisikan dengan cara lain dalam Syarat dan Ketentuan ini.<br>
                                                  </p>
                                                  <p>
                                                      2. FORM PERMOHONAN PINJAMAN<br>
                                                      PERJANJIAN ini dibuat dan ditandatangani sesuai dengan permohonan PINJAMAN yang diajukan oleh DEBITUR sebagaimana ditentukan dalam Tabel Perincian Pinjaman Pribadi yang akan berfungsi sebagai formulir permohonan FASILITAS pinjaman pribadi (selanjutnya akan disebut sebagai “FORMULIR APLIKASI” atau “FORMULIR”). DEBITUR bertanggung jawab atas ketepatan dan  kebenaran isi dari FORMULIR, yang merupakan satu kesatuan dan bagian yang tidak terpisahkan dari PERJANJIAN  ini.<br>
                                                      Terkait dengan penggunaan formulir elektronik dalam pengajuan fasilitas pinjaman serta penandatanganan perjanjian pinjaman secara digital, sesuai dengan Undang-undang Republik Indonesia No 11 Tahun 2008 mengenai Informasi dan Transaksi Elektronik, dijelaskan pada Bab III pasal 5 ayat 1 yang menyebutkan bahwa Informasi Elektronik dan/atau Dokumen Elektronik dan/atau hasil cetaknya merupakan ALAT BUKTI HUKUM yang SAH.
                                                  </p>
                                                  <p>
                                                      3. PENGAKUAN HUTANG<br>
                                                      3.1. Terkait dengan Pasal 1 dan 2 di atas, maka DEBITUR dengan ini (sekarang dan untuk dikemudian hari atau pada waktu yang berlaku), menerima FASILITAS pembiayaan dari KREDITUR dan oleh karena itu DEBITUR mengakui bahwa dirinya benar dan secara sah telah berhutang kepada KREDITUR untuk  sejumlah uang sebagaimana tercantum dalam Tabel Perincian Pinjaman Pribadi ditambah dengan bunga dan biaya-biaya lainnya yang wajib dibayar oleh DEBITUR kepada KREDITUR berdasarkan  PERJANJIAN  ini.<br>
                                                      3.2. Dalam PERJANJIAN ini, FASILITAS diberikan kepada DEBITUR setelah DEBITUR dinyatakan lolos verifikasi dan telah disetujui permohonan pinjamannya dan setelah KREDITUR dan DEBITUR menandatangani PERJANJIAN ini
                                                      3.3. KREDITUR dengan ini mengakui dengan sebagaimana mestinya dan menerima Pengakuan Hutang yang diberikan oleh DEBITUR sebagaimana diatur dalam Pasal 3.1 di atas.<br>
                                                      3.4. Pembukuan dan catatan-catatan keuangan dari KREDITUR merupakan satu-satunya bukti yang lengkap dari semua jumlah hutang DEBITUR terhadap KREDITUR berdasarkan PERJANJIAN ini, dan pembukuan dan catatan-catatan keuangan tersebut mengikat DEBITUR.
                                                  </p>
                                                  <p>
                                                      4. PELUNASAN LEBIH AWAL<br>
                                                      DEBITUR berhak Untuk melunasi seluruh jumlah yang terhutang sebelum berakhirnya jangka waktu pinjaman. Jika dan apabila DEBITUR bermaksud untuk melunasi, seluruh hutangnya sebelum berakhirnya jangka waktu pembiayaan, DEBITUR harus melunasi seluruh jumlah pinjaman dan total bunga yang diberikan sejak hari pencairan sampai dengan hari pelunasan dipercepat dengan perhitungan bunga harian. Posisi total jumlah terhutang harian sejak pencairan sampai dengan hari jatuh tempo diinformasikan dalam Jadwal Pembayaran Pinjaman dalam halaman akun pribadi peminjam yang akan diberikan kepada setiap DEBITUR.
                                                  </p>
                                                  <p>
                                                      5. BUNGA, DENDA DAN BIAYA<br>
                                                      5.1. KREDITUR membebankan/mengenakan bunga atas hutang dalam bentuk FASILITAS pinjaman DEBITUR yang besarnya sebagaimana tercantum dalam Tabel Perincian  Pinjaman Pibadi, yang wajib dibayar oleh DEBITUR kepada KREDITUR dengan  pembayaran secara penuh atau sebagaimana ditentukan menurut PERJANJIAN ini.<br>
                                                      5.2. Untuk permohonan perpanjangan jangka waktu pinjaman yang melebihi jangka waktu yang telah ditentukan oleh DEBITUR di awal pengajuan permohonan, Debitur akan dikenakan biaya-biaya sebagai berikut:<br>
                                                      (i) Biaya perpanjangan dikenakan Rp 180.000,- (seratus delapan puluh ribu rupiah) setelah DEBITUR mengajukan permohonan perpanjangan jangka waktu.<br>
                                                      (ii) Diluar perpanjangan diatas, bunga harian tetap diteruskan perhitungannya sebesar 1% (satu persen) per hari sejak tanggal jatuh tempo awal sampai dengan tanggal jatuh tempo terbaru.<br>
                                                      5.3. Untuk setiap keterlambatan pembayaran pinjaman yang terhutang dan telah jatuh tempo, DEBITUR dikenakan denda sebagai berikut:<br>
                                                      (i) Biaya keterlambatan dikenakan Rp 50.000,- (lima puluh ribu rupiah) setelah melewati tanggal jatuh tempo.<br>
                                                      (ii) Biaya denda keterlambatan harian Rp 10.000,- (sepuluh ribu rupiah) dikenakan per hari terhitung sejak hari pertama setelah tanggal jatuh tempo sampai dengan hari peluasan kewajiban.<br>
                                                     
                                                  </p>
                                                  <p>
                                                      6. CIDERA JANJI<br>
                                                      6.1. DEBITUR dianggap telah melakukan Cidera Janji, yang cukup dibuktikan hanya dengan lewatnya waktu, di mana peristiwa tersebut tidak perlu dibuktikan lagi namun cukup dengan terjadinya salah satu peristiwa-peristiwa sebagai berikut:<br>
                                                      a. DEBITUR telah gagal untuk memenuhi salah satu atau lebih kewajibannya sebagaimana ditentukan dalam PERJANJIAN ini; atau<br>
                                                      b. DEBITUR telah, atau tidak, atau gagal melakukan pembayaran pinjaman pada saat pembayaran pinjaman terkait jatuh tempo; atau<br>
                                                      c. DEBITUR telah dinyatakan pailit berdasarkan putusan pengadilan yang berwenang; atau<br>
                                                      d. Setiap data, informasi, dokumen, identitas pribadi, pernyataan atau keterangan yang diberikan DEBITUR ternyata tidak menggambarkan kondisi yang sesungguhnya/sebenarnya.<br>
                                                      6.2. Dalam hal DEBITUR melakukan Cidera Janji, maka KREDITUR berhak menuntut pelunasan kepada DEBITUR, sebagaimana disetujui oleh DEBITUR untuk melakukan pelunasan atas seluruh kewajiban DEBITUR, secara seketika dan  sekaligus lunas, termasuk, tetapi tidak terbatas pada, jumlah hutang pokok ditambah bunga, pinjaman dan denda keterlambatan pembayaran dan seluruh biaya-biaya lainnya<br>
                                                      6.3. KREDITUR berhak memberikan hak substitusi kepada pihak ketiga, dalam hal ini jasa penagihan, apabila DEBITUR telah melewati batas waktu keterlambatan lebih dari 30 (tiga puluh) hari. Adapun biaya-baya yang akan ditimbulkan dari proses ini sebesar 10% (sepuluh persen) dari total pembayaran pokok, total bunga serta total biaya dan denda harian atas keterlambatan pembayaran yang akan menjadi tanggung jawab pihak KREDITUR.<br>
                                                  </p>
                                                  <p>
                                                      7. LAIN-LAIN<br>
                                                      7.1. Syarat dan Ketentuan ini dapat diubah oleh KREDITUR hanya setelah kesepakatan bersama dengan DEBITUR. KREDITUR dapat mengusulkan perubahan-perubahan atas Syarat dan Ketentuan ini utamanya sehubungan dengan perubahan-perubahan persyaratan hukum, untuk dapat menyediakan layanan yang lebih baik kepada DEBITUR dan sehubungan dengan  tujuan-tujuan bisnis KREDITUR. KREDITUR harus menginformasikan kepada DEBITUR  mengenai usulan perubahan atas Syarat dan Ketentuan ini dalam bentuk tertulis (dan melalui  setiap cara yang patut), paling tidak 7 (tujuh) hari kerja di awal sebelum tanggal efektif perubahan-perubahan yang diusulkan tersebut. DEBITUR wajib untuk membaca dan memahami perubahan yang diusulkan atas Syarat dan Ketentuan baik di kantor KREDITUR atau pada laman situs http://uangteman.com. DEBITUR akan menyatakan persetujuannya atas setiap dan seluruh perubahan atas Syarat dan Ketentuan ini dengan melaksanakan setiap transaksi (utamanya dengan pembayaran jumlah angsuran, dengan setiap penggunaan FASILITAS pembiayaan, dan sebagainya) setiap saat setelah tanggal efektif perubahan atas Syarat dan Ketentuan tersebut. Dalam hal DEBITUR tidak setuju dengan perubahan atas Syarat dan Ketentuan tersebut, DEBITUR dapat dengan segera mengakhiri PERJANJIAN ini, namun hal ini harus dilaksanakan oleh DEBITUR hanya sebelum tanggal efektif perubahan Syarat dan Ketentuan tersebut.<br>
                                                      7.2. DEBITUR wajib memberitahukan secara tertulis kepada KREDITUR setiap terjadi perubahan data DEBITUR termasuk, tetapi tidak terbatas pada, setiap perubahan alamat tempat tinggal DEBITUR.<br>
                                                      7.3. DEBITUR dengan ini setuju bahwa, semata-mata berdasarkan kebijakan KREDITUR sendiri, dan tanpa pemberitahuan sebelumnya atau tanpa perlu diketahui oleh DEBITUR, KREDITUR berhak dan berwenang untuk mengalihkan baik seluruh maupun sebagian hak dan kewajibannya yang timbul berdasarkan PERJANJIAN ini kepada pihak ketiga mana pun. KREDITUR dapat, dalam hal itu, melanjutkan pelaksanaan administrasi hak dan kewajiban tersebut. DEBITUR dengan ini setuju bahwa, dalam hal tersebut, KREDITUR dapat menggunakan informasi mengenai hak dan kewajiban yang dialihkan tersebut untuk pemenuhan kewajiban-kewajiban KREDITUR lainnya yang timbul dari PERJANJIAN ini.<br>
                                                      7.4. Dalam hal terjadi setiap dan seluruh perselisihan yang timbul dari atau sehubungan dengan pelaksanaan PERJANJIAN ini, para pihak sepakat memilih domisili hukum yang tetap di Kantor Panitera Pengadilan Negeri Jakarta Selatan. Meskipun demikian, DEBITUR dengan ini mengakui dan menyetujui bahwa KREDITUR berhak untuk mengajukan gugatan terhadap DEBITUR di setiap Pengadilan Negeri lainnya yang memiliki yurisdiksi atau kewenangan atas DEBITUR dan aset DEBITUR <br>
                                                      7.5. Dengan menandatangani dan menyetujui formulir aplikasi ini, DEBITUR sebagai pemohon menyatakan bahwa data telekomunikasi yang DEBITUR berikan dalam formulir aplikasi pemanfaatan produk KREDITUR adalah yang sebenar-benarnya; dalam hal ini KREDITUR dapat melakukan kegiatan verifikasi data telekomunikasi DEBITUR yang dibagikan di dalam formulir aplikasi DEBITUR. <br>
                                                      7.6. DEBITUR setuju untuk memberikan hak kepada KREDITUR untuk membagikan dan menyebarkan data telekomunikasi DEBITUR kepada pihak lain di luar badan hukum KREDITUR untuk tujuan komersial, verifikasi data telekomunikasi dan penawaran produk atau layanan. <br>
                                                      7.7. DEBITUR memberikan persetujuan kepada KREDITUR untuk mendapatkan informasi data telekomunikasi DEBITUR dari sumber lainnya dimana informasi terkait tidak dapat ditarik kembali. <br>
                                                      7.8. DEBITUR telah memahami syarat dan ketentuan dari permohonan aplikasi ini serta tujuan dan konsekuensi dari pengolahan data telekomunikasi kepada pihak lain di luar badan hukum KREDITUR <br>

                                                  </p>
                                                  <p>8. Saya memahami bahwa UangTeman.com akan melaporkan semua aplikasi yang sifatnya penipuan kepada pihak berwenang. IP Anda akan dicatat untuk alasan keamanan.</p>
                                                  <p>9. Dengan ini berarti Anda menyetujui dan mengerti bahwa jika Anda tidak membayar kembali pinjaman ini, maka PT DIGITAL ALPHA INDONESIA akan membagikan informasi data Anda kepada Bank atau Institusi Keuangan lainnya di Indonesia dan mungkin Anda tidak akan bisa lagi mendapatkan pinjaman atau kredit dari kedua lembaga tersebut. Kami juga akan membagikan data Anda dengan pihak yang berwenang di Indonesia.</p>
                                              </td>
                                          </tr>
                                      </tbody></table>
                                  </td>
                              </tr>
                              <!-- end tc -->
                              <!-- start cara pelunasan -->
                              <tr>
                                  <td>
                                      <table style="width:100%">
                                          <tbody><tr>
                                              <td align="center">
                                                  <strong>CARA PELUNASAN PINJAMAN PRIBADI</strong>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  Catatan:<br>
                                                  1. Pembayaran bisa dilakukan dengan cara transfer dari semua ATM bank ke nomer rekening tujuan (virtual account) yang telah ditentukan.<br>
                                                  2. Informasi detail mengenai jumlah total yang harus dibayarkan dan cara pembayaran, dapat dilihat lengkap melalui halaman akun pribadi peminjam yang akan diberikan sesaat setelah pencairan pinjaman melalui konfirmasi via SMS maupun email.<br>
                                                  3. Hari pertama dihitung sejak hari pencairan pinjaman. Apabila hari jatuh tempo jatuh di hari Sabtu, Minggu atau Hari Libur, maka tetap dianggap sebagai Hari Jatuh Tempo Pelunasan.<br>&nbsp;<br>

                                                  Untuk mengetahui rekening tujuan transfer pembayaran, nasabah perlu menekan tombol request di halaman akun pribadi peminjam dengan langkah-langkah sebagai berikut :<br>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td align="center">
                                                  <span style="border:1px solid;">Login &gt; Riwayat Pinjaman &gt; Klik Tombol Bayar Pinjaman &gt; Nomor Virtual Account Berikut Langah-langkah Pembayaran</span>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  Sesaat setelah Anda mendapatkan nomor virtual account beserta nominal pembayaran melalui langkah-langkah tersebut diatas, tahap selanjutnya adalah Anda dapat mentransferkan dana melalui beberapa langkah sebagai berikut :<br> &nbsp; <br>

                            <strong>Pembayaran melalui ATM Mandiri/Bank Sejenis dalam Jaringan ATM Bersama atau ALTO</strong><br>
                                    1. Masukkan Kartu ATM anda ke dalam mesin ATM. <br> 
                                    2. Pilih “Bahasa”  <br> 
                                    3. Masukkan PIN.  <br>  
                                    4. Pilih “Transaksi Lainnya”  <br> 
                                    5. Pilih “Transfer”  <br> 
                                    6. Pilih “Pilih menu transfer ke Bank lain ”<br>
                                    7. Masukkan Kode Bank (<b> 987 </b>) + Masukkan nomor virtual account anda (sesuai yang ditampilkan di samping). kemudian tekan “Benar” <br>
                                    8. Masukkan jumlah pembayaran sesuai yang ditagihkan (harus sama). <strong><br>Penting: Jumlah nominal yang tidak sesuai dengan tagihan akan menyebabkan transaksi gagal. </strong><br>
                                    9. kemudian tekan "Benar". <br>
                                    10. Muncul layar konfirmasi transfer yang berisi: <br>
                                        <ul>
                                          <li>Bank Tujuan</li>
                                          <li>No Rek Tujuan</li>
                                          <li>Nama</li>
                                          <li>Jumlah Yang ditransfer</li>
                                          <li>No Referensi</li>
                                          </ul>
                                        Jika sudah benar, tekan "Benar”. <br>
                                    11. Transaksi sudah selesai. Anda akan menerima struk sebagai bukti transaksi

                            <br><br>

                            <strong>Pembayaran melalui ATM BCA/Bank sejenis dalam Jaringan PRIMA</strong><br>
                                    1. Masukkan Kartu ATM anda ke dalam mesin ATM. <br>
                                    2. Pilih “Bahasa” <br>
                                    3. Masukkan PIN.  <br>
                                    4. Pilih “Transaksi Lainnya” <br>
                                    5. Pilih “Transfer” <br>
                                    6. Pilih “Ke Rek Bank Lain” <br>
                                    7. Masukkan Kode Bank (<b> 987 </b>)  kemudian tekan “Benar” <br>
                                    8. Masukkan jumlah pembayaran sesuai yang ditagihkan (harus sama). <strong><br>Penting: Jumlah nominal yang tidak sesuai dengan tagihan akan menyebabkan transaksi gagal.</strong><br>
                                    9. Masukkan nomor virtual account anda (sesuai yang ditampilkan di samping) kemudian tekan "Benar". <br>
                                    10. Muncul layar konfirmasi transfer yang berisi: <br>
                                        <ul>
                                          <li>Bank Tujuan</li>
                                          <li>No Rek Tujuan</li>
                                          <li>Nama</li>
                                          <li>Jumlah Yang ditransfer</li>
                                          <li>No Referensi</li>
                                          </ul>
                                        Jika sudah benar, tekan "Benar”. <br>
                                    11. Transaksi sudah selesai. Anda akan menerima struk sebagai bukti transaksi
                            <br><br>
                            Mohon simpan struk ATM/slip setoran sebagai bukti pembayaran. Instruksi terperinci dan informasi pembayaran selalu diperbaharui secara berkala di situs/website perusahaan : uangteman.com, atau dapat menghubungi Pusat Layanan Pelanggan kami di nomor telepon : (021) 80623000
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <!-- end cara Pelunasan -->
                            </tbody></table>
                          </div>
                        </div>
                      </div>

                      <div class="row" style="border-right: solid 1px #f0f0f0;border-bottom: solid 1px #f0f0f0;border-left: solid 1px #f0f0f0;">
                        <div class="col-sm-4 col-sm-offset-8" id="divDebitur" style="text-align:right;">
                          Debitur
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4 col-sm-offset-8" id="divSign">
                          
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4 col-sm-offset-8" id="divName" style="text-align:right;">
                          
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="checkbox" id="div-agree">
                            <label>
                              <input type="checkbox" required value="Y" name="doc_agree" id="doc_agree" style="position:unset;"> Saya menyetujui seluruh persyaratan di atas
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" required name="apli_agree" value="Y" style="position:unset;">Saya telah membaca dan menerima pernyataan <a href="https://uangteman.com/privacy-policy" target="_blank">privasi</a> dan setuju dengan <a href="https://uangteman.com/fees" target="_blank">aturan dan biaya</a> jasa pinjaman kami.
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="apli_agree2" required value="Y" style="position:unset;">Saya menegaskan bahwa semua rincian yang diberikan adalah valid, akurat dan benar.
                            </label>
                          </div>
                        </div>
                      </div>
                      
                      <!-- <div class="panelbuttonnext">
                        <div class="row">
                          <div class="col-sm-7">
                            <a class="kembali" href="">Kembali</a>
                          </div>
                          <div class="col-sm-5">
                            <a type="button" class="btn btn-primary" href="smsverifikasi.php">Submit Form &nbsp; ></a>
                          </div>
                        </div>
                      </div> -->

                    </div>
                    <!-- End of Dokumen Persetujuan -->

                    <div class="panelbuttonnext">
                      <div class="row">
                      <input type="hidden" name="ap_email_address" value="{{ $ap_email_address }}">
                      <input type="hidden" name="principal_amount" value="{{ $principal_amount }}">
                      <input type="hidden" name="biaya_layanan" value="{{ $biaya_layanan }}">
                      <input type="hidden" name="totalPembayaran" value="{{ $totalPembayaran }}">
                      <input type="hidden" name="jatuhTempo" value="{{ $jatuhTempo }}">
                      <input type="hidden" name="duedate" value="{{ $due_date }}">
                      <input type="hidden" name="aff" value="{{ $aff }}">
                        <div class="col-sm-5 pull-right">
                          <button type="submit" id="apply" value="apply" class="btn btn-primary btn-loading">
                              <strong> Submit </strong>
                          </button>
                        </div>
                      </div>
                    </div>

                  </div>
                </form>
              </div>
              <!-- End of regTab -->
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
      <!-- include sidebar -->
        </div>
      </div>
      <!-- / row -->
    </div>

    
    @stop
  