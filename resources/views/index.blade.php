  @extends('master')
  @section('content')
    <style type="text/css">
    .formcontainer{margin:60px auto 0;width:80%}.formtext{text-align:left;font-size:25px;color:#fff;line-height:40px}.maincontainer{padding-top:0;text-align:center}.divleft,.divright{width:50%;height:90px}.divright{float:right;background-color:#003288}.divleft{float:left;background-color:#002461}#cboxOverlay{background:rgba(0,0,0,.37);opacity:.9;filter:alpha(opacity=90)}#cboxContent{background:0 0;overflow:hidden;padding:20px}#cboxClose,#cboxClose:hover{border:0;padding:0;margin:0;overflow:visible;text-indent:-9999px;width:50px;height:50px;position:absolute;background-image:url(frontend/statics/v2/images/closebtn.png);background-color:transparent;background-size:cover!important;background-position:center center;z-index:1110000;right:0;top:0}#inline_content{background:0 0;min-height:539px}.nothanks{font-size:13px;position:absolute;bottom:40px;float:right;right:40px}.topcontainer{background-color:#fdb815;color:#fff;padding:20px}.circlecontainer{position:absolute;bottom:50px;left:0;right:0;color:#FFF;text-decoration:none;margin:auto}.circlecontainer img{width:30%}.circleright{left:50%}.circleleft{right:50%}#cboxLoadedContent{background:0 0;padding:1px}.middlecontainer-blue{background-color:#4c6590;padding:50px 20px}.bottomcontainer{background-color:#002461;padding:20px}.bottomcontainer .formtext{color:#fdb815;font-size:20px;text-align:center!important}.middlecontainer-blue .formtext{color:#fff;text-align:center!important}.middlecontainer-blue-text-container{padding:25px 0 40px}@media  only screen and (min-device-width:768px) and (max-device-width:1024px){.formcontainer{margin-top:15px;padding-bottom:10px}.nothanks{font-size:13px;position:absolute;bottom:28px;float:right;right:5px}.divleft,.divright{width:50%;height:55px}.formtext{font-size:12pt;line-height:1}.circlecontainer{position:relative;bottom:50px;left:0;right:0;color:#FFF;text-decoration:none;margin:auto}.circlecontainer img{width:25%}}@media  only screen and (min-device-width:414px) and (max-device-width:736px){.formcontainer{margin-top:15px;padding-bottom:10px}.nothanks{font-size:13px;position:absolute;bottom:28px;float:right;right:5px}.divleft,.divright{width:50%;height:40px}.formtext{font-size:12pt;line-height:1}.circlecontainer{position:relative;bottom:25px;left:0;right:0;color:#FFF;text-decoration:none;margin:auto}.circlecontainer img{width:40%}}@media  only screen and (min-device-width:375px) and (max-device-width:667px){.formcontainer{margin-top:15px;padding-bottom:10px}.nothanks{font-size:13px;position:absolute;bottom:28px;float:right;right:5px}.divleft,.divright{width:50%;height:40px}.formtext{font-size:12pt;line-height:1}.circlecontainer{position:relative;bottom:25px;left:0;right:0;color:#FFF;text-decoration:none;margin:auto}.circlecontainer img{width:40%}}@media  only screen and (device-width:320px) and (device-height:640px){.formcontainer{margin-top:15px;padding-bottom:10px}.nothanks{font-size:13px;position:absolute;bottom:28px;float:right;right:5px}.divleft,.divright{width:50%;height:40px}.formtext{font-size:12pt;line-height:1}.circlecontainer{position:relative;bottom:25px;left:0;right:0;color:#FFF;text-decoration:none;margin:auto}.circlecontainer img{width:40%}}@media  only screen and (min-device-width:320px) and (max-device-width:480px){.formcontainer{margin-top:15px;padding-bottom:10px}.nothanks{font-size:13px;position:absolute;bottom:28px;float:right;right:5px}.divleft,.divright{width:50%;height:40px}.formtext{font-size:12pt;line-height:1}.circlecontainer{position:relative;bottom:25px;left:0;right:0;color:#FFF;text-decoration:none;margin:auto}.circlecontainer img{width:35%}}
    </style>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../{{ asset('js/ie8-responsive-file-warning.js')}}"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->        <style>
          /* Conditional Style for jumbotron */
          .jumbotron{
            height: 443px;
          }

          .jumbotron .navbar-collapse .container {
            padding-bottom: 10px;
            border-bottom: 1px solid #DDDDDD;
          }
        </style>
        
        <div class="loan-wrapper">
          <header class="container preface">
            <div class="row">
              <div class="text-center visible-xs text-center">
                <p>Apakah Kasbon solusi keuanganmu?</p>
              </div>
              <div class="col-md-6 hidden-xs">
                <h1>Butuh Uang Cepat?</h1>
                <p>Dapatkan pinjaman hingga 2 juta rupiah dengan proses cepat disini!</p>
              </div>
              <div class="col-md-6 visible-lg">
                <h2>3 Langkah Mudah Meminjam Uang</h2>
                <ul class="langkah-mudah clearfix">
                  <li class="langkah-mudah__item col-md-4">
                    <img src="{{ asset('frontend/statics/v2/assets/langkah-mudah-1.png')}}">
                    <span>Isi Form Online</span>
                    <i class="fa fa-angle-right"></i>
                  </li>
                  <li class="langkah-mudah__item col-md-3">
                    <img src="{{ asset('frontend/statics/v2/assets/langkah-mudah-2.png')}}">
                    <span>Verifikasi</span>
                    <i class="fa fa-angle-right"></i>
                  </li>
                  <li class="langkah-mudah__item col-md-4">
                    <img src="{{ asset('frontend/statics/v2/assets/langkah-mudah-3.png')}}">
                    <span>Pencairan cepat</span>
                  </li>
                </ul>
              </div>
            </div>
          </header>

          <div class="container">
          {!! Form::open(['url' => 'peminjaman-form/pinjam' , 'method' => 'post']) !!}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row loan-field">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-7">
                        <label for="principal_amount_i" class="c-blue">Jumlah  Pinjaman (Rp)</label>
                      </div>
                      <div class="col-md-5">
                        <ul class="panel-estimation-slider">
                          <li>
                            <div class="info autowidth-trigger">Rp.</div><span class="transparent-form input-currency autowidth p-left-10 c-blue" id="jumlahpinjaman" ></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <input id="principal_amount" name="principal_amount" type="slider" style="width:100%">
                    <div class="row">
                      <div class="col-md-7">
                        <label for="due_date_i" class="c-blue">Lama Pinjaman (Hari)</label>
                      </div>
                      <div class="col-md-5">
                        <ul class="panel-estimation-slider">
                          <li>
                            <div class="info2">Hari</div><span id="lamahari"  type="number" class="transparent-form autowidth c-blue"></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                     <input id="due_date" type="slider" style="width:100%" name="due_date">
                  </div>
                </div>
                <div class="col-md-6">
                  <ul class="panel-estimation">
                    <li class="divider visible-xs"></li>
                    <li>
                      <div class="info c-black">Jumlah Pinjaman</div>
                      <span class="value c-blue"><span id="vPrincipal">1.800.000</span></span>
                    </li>
                    <li>

                      <span class="info c-black">Biaya Layanan</span>
                      <span class="value c-blue" id="vFee"></span>
                       
                      
                      <!-- <span class="value"><a href=""><img src="static/img/info.png"></a><small>Rp150.000</small>Rp0</span> -->

                    <textarea name="biaya_layanan" visible="false" style="display:none;" id="vFeee"></textarea>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <span class="info c-black">Total Pembayaran</span>
                      <span class="value total c-blue"><span id="vPrincipalDueDate">1.800.000</span></span>
                      <textarea name="totalPembayaran" visible="false" style="display:none;" id="vPrincipalDueDate2"></textarea>
                    </li>
                    <li>
                      <div class="info c-black">Jatuh Tempo</div>
                      <span class="value c-blue" id="vDueDate"></span>
                      <textarea name="jatuhTempo" visible="false" style="display:none;" id="vDueDate2"></textarea>
                    </li>
                    <li>
                      <br/>
                      <small>* Hanya sebagai ilustrasi</small>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="row submission">
                <div class="col-md-6">
                  <p>
                    Pastikan Anda telah membaca dan mengerti tentang <a  href="terms-conditions.html">Syarat &amp; Ketentuan</a> yang berlaku
                  </p>
                </div>
                <div class="col-md-6">
                  <div class="form-group p-top-15">
                    <div class="row">
                      <div class="col-xs-7 p-right-0">
                        <input type="email" required="yes" class="form-control" name="ap_email_address" id="ap_email_address" placeholder="email@domain.com">
                      </div>
                      <div class="col-xs-5">
                      <input type="hidden" name="aff" value="{{ $aff }}">
                        <button type="submit" class="btn btn-primary" style="width:100%;">Ajukan<span class="hidden-xs"> Pinjaman</button>
                    @if (Session::has('messages'))
                      @foreach (Session::get('messages') as $message)
                      @if ($message[0] == 'error')
                      <div class="modal-content"><div class="modal-header"><button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title">Notifikasi</h4></div><div class="modal-body"><div class="bootbox-body">{{$message}}</div></div><div class="modal-footer"><button data-bb-handler="success" type="button" class="button button-3d button-rounded btn-second">OK</button></div></div>
                      <div class="alert alert-danger">{{$message}}</div>
                      @elseif ($message[0] == 'success')
                          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h3 class="modal-title">Syarat &amp; Aturan Peminjaman</h3>
                                </div>
                                <div class="modal-body">
                                  <div class="panelrole panel-default" style="overflow-y:scroll;">
                                    <div class="panel-body" >
                                      <ol class="leftmargin-sm rightmargin-sm">
          <li>Persyaratan ini (dan seluruh dokumen yang terkait dengan hal tersebut) menerangkan kepada Anda, sebagai klien (yang selanjutnya hanya akan disebut "Anda" saja) tentang persyaratan penggunaan situs www.Kasbon.com (Situs Web), baik sebagai pengunjung atau sebagai anggota terdaftar. Situs Web ini dioperasikan oleh PT. Digital Alpha Indonesia (yang selanjutnya disebut dengan "kami").</li>
          <li>Bacalah persyaratan penggunaan ini dengan baik sebelum Anda menggunakan Situs Web kami. Dengan menggunakan Situs Web kami, berarti Anda telah menyetujui seluruh penafian, persyaratan dan ketentuan penggunaan (selanjutnya disebut dengan "Persyaratan" saja) situs ini. Jika Anda tidak menyetujuinya, maka sebaiknya sesegera mungkin keluar dari Situs Web ini dan menahan diri untuk tidak menggunakan Situs Web ini kembali.</li>
        </ol>

        <h4>Informasi Tentang Kami</h4>

        <ol class="leftmargin-sm rightmargin-sm">
          <li>Kami terdaftar dengan nama PT <span style="font-size: 13px; line-height: 20.7999992370605px;">Digital Alpha Indonesia</span>&nbsp;di Negara Republik Indonesia dan telah mendaftarkan kantor kami yang berada di&nbsp;<span style="font-size: 13px; line-height: 20.7999992370605px;">One Pasific Place Building Level 11,&nbsp;</span><span style="font-size: 13px; line-height: 20.7999992370605px;">Sudirman Central Business District,&nbsp;</span><span style="font-size: 13px; line-height: 20.7999992370605px;">Jl. Jend. Sudirman Kav. 52-53, Jakarta,&nbsp;</span><span style="font-size: 13px; line-height: 20.7999992370605px;">Indonesia 12190.</span></li>
          <li>Kami adalah sebuah perusahaan yang didirikan secara sah dan diatur menurut hukum Indonesia. Kami sepenuhnya mematuhi semua hukum yang berlaku (jika ada).</li>
        </ol>

        <h4>Pengguna Situs Web ini</h4>

        <ol class="leftmargin-sm rightmargin-sm">
          <li>Anda bertanggung jawab sepenuhnya atas penggunaan Situs Web ini baik bila Anda mengakses situs kami melalui perangkat komputer ("perangkat komputer" yang dimaksud termasuk akses dari telepon genggam). Dengan mengakses Situs Web ini, siapa saja yang menggunakan perangkat komputer Anda setuju untuk terikat dengan persyaratan kami. Anda bertanggung jawab untuk memastikan semua orang yang mengakses Situs Web kami melalui koneksi internet dan menggunakan perangkat komputer Anda, mengetahui dan mematuhi persyaratan kami.</li>
          <li>Situs Web ini ditujukan untuk digunakan bagi Anda yang berusia 18 tahun atau lebih dan mengaksesnya dari Negara Republik Indonesia. Kami tidak dapat menjamin bahwa informasi yang berada pada Situs Web ini memenuhi atau sesuai dengan peraturan di luar Republik Indonesia.</li>
          <li>Untuk tedaftar pada kami, atau mengajukan pinjaman kepada kami, Anda harus berusia 18 tahun atau lebih. Anda harus memastikan bahwa detil informasi yang Anda berikan, baik pada saat registrasi/ pendaftaran atau kapan saja saat Anda mengakses Situs Web kami, haruslah akurat dan lengkap. Anda harus segera menginformasikan kepada kami jika ada perubahan dengan cara memperbaharui detil data pribadi Anda.</li>
          <li>Anda menyetujui bahwa Anda tidak akan secara tak sengaja mengirimkan virus atau apapun yang akan merusak Situs Web kami. Anda tidak diperkenankan untuk menggunakan program, perangkat atau software otomatis untuk mengganggu atau berusaha mengganggu sistem yang berkerja pada Situs Web ini. Anda juga tidak diizinkan untuk menguraikan, mendekompilasi, membongkar, atau merekayasa balik setiap bagian dari perangkat lunak yang menyusun atau bagaimanapun membentuk Situs Web ini</li>
        </ol>

        <h4>Pengaksesan Situs Web</h4>

        <ol class="leftmargin-sm rightmargin-sm">
          <li>Akses pada Situs Web ini dizinkan dengan persyaratan sementara, dan kami berhak untuk menarik atau mengubah layanan yang kami sediakan di Situs Web ini tanpa pemberitahuan (lihat di bawah). Kami tidak memberikan jaminan jika karena alasan apapun Situs Web tidak tersedia setiap saat atau selama beberapa waktu.</li>
          <li>Adakalanya kami melarang akses pada sebagian, atau keseluruhan Situs Web bagi beberapa pengguna yang telah terdaftar.</li>
          <li>Jika Anda memilih, atau telah disediakan, password atau informasi apapun sebagai bagian dari prosedur keamanan, maka Anda harus menyimpan informasi rahasia tersebut, dan tidak boleh membocorkannya kepada pihak ketiga. Kami memiliki hak untuk menonaktifkan password pengguna, meskipun Anda telah menunjuk atau ditunjuk oleh kami, setiap saat, jika menurut kami Anda telah gagal untuk mematuhi mana saja ketetapan dari persyaratan ini.</li>
        </ol>

        <h4>Situs Web Pihak Ketiga</h4>

        <ol class="leftmargin-sm rightmargin-sm">
          <li>Situs Web ini adakalanya terkait dengan Situs Web lain. Keterkaitan tersebut diluar kendali dan tanggung jawab kami. Kami tidak menerima jaminan atas isi atau ketersediaan situs terkait yang tidak dioperasikan oleh kami. Kaitan pada Situs Web&nbsp;kami, sediakan hanya untuk kenyamanan Anda dan kami tidak mengindikasikan kepercayaan atau persetujuan atas situs terkait. Untuk itu, Anda sebaiknya, selalu merujuk kepada syarat dan ketentuan yang ada pada situs terkait sebelum Anda menggunakan situs tersebut dan ajukanlah pertanyaan atau komentar Anda langsung kepada penyedia Situs web tersebut.</li>
          <li>Anda tidak diizinkan (dan juga Anda tidak diizinkan membantu orang lain) untuk membuat link dari Situs Web Anda ke Situs Web kami (dengan cara apapun) tanpa persetujuan tertulis, yang kami bisa berikan atau tolak sesuai dengan kebijakan kami. Anda tidak diizinkan untuk membuat tautan langsung ("<em>Hot Link</em>") terhadap konten atau gambar tanpa izin tertulis dari kami terlebih dulu.</li>
        </ol>

        <h4>Surat elektronik Internet</h4>

        <ol class="leftmargin-sm rightmargin-sm">
          <li>Pesan yang disampaikan melalui koneksi internet tidak dapat dijamin sepenuhnya keamanannya, dan bisa saja tertahan, hilang atau mengalami perubahan. Kami tidak bertanggung jawab atas pesan yang hilang, diubah oleh pihak ketiga, atau tertahan dan kami tidak bertanggung jawab secara material kepada Anda atau siapa saja atas kerusakan atau hal lainnya sehubungan dengan pesan yang dikirim oleh Anda kepada kami atau kami kepada Anda melalui koneksi internet.</li>
          <li>Situs Web ini menggunakan <em>cookie</em>, yang harus Anda setujui penggunaannya untuk menikmati fungsionalitas penuh dari Situs Web ini. <em>Cookie</em> adalah file yang digunakan oleh peladen kami untuk mengidentifikasi komputer Anda. <em>Cookie</em> yang kami gunakan akan merekam bagian mana dari Situs Web ini yang Anda kunjungi dan berapa lama. Anda berhak untuk menolak penggunaan <em>cookie</em> dengan cara mengkonfigurasi web jelajah Anda. Mohon untuk diingat, bahwa konfigurasi tersebut bisa saja mengganggu beberapa fungsi dari Situs Web ini. Untuk informasi lebih lanjut terkait penggunaan <em>cookie</em> ini, silahkan melihat bagian Kebijaksanaan Privasi kami.</li>
        </ol>

        <h4>Hak Kekayaan Intelektual</h4>

        <ol class="leftmargin-sm rightmargin-sm">
          <li>Situs Web ini dimiliki oleh PT Digital Alpha Indonesia. Apapun dan seluruh hak kekayaan intelektual dalam situs web ini termasuk, namun tidak terbatas, pada hak cipta, dan hak basis, &nbsp;data serta seluruh logo atau merek dagang (apakah terdaftar ataupun tidak) menjadi milik dan properti tetap dari PT Digital Alpha Indonesia (atau lisensi pihak ketiga yang dipakai) sampai kapan pun juga.</li>
          <li>Anda diperbolehkan untuk melihat dan menyalin-cetak diatas kertas isi yang disediakan Situs Web, namun:
          <ol class="leftmargin-sm" style="list-style:lower-alpha">
            <li>Seluruh dan salinan tersebut merupakan hak kekayaan intelektual dari PT Digital Alpha Indonesia dan pihak ketiga yang kami berikan lisensi;</li>
            <li>Anda tidak mengubah dengan cara apapun salinan kertas dari bahan-bahan yang telah dicetak, termasuk penghapusan segala hak cipta atau kepemilikan lainnya yang terkandung di situs; dan</li>
          </ol>
          </li>
          <li>Anda setuju tidak akan menggunakan bagian manapun dari Situs web&nbsp;ini untuk:
          <ol class="leftmargin-sm" style="list-style:lower-alpha">
            <li>Menyelipkan atau dengan sengaja atau tidak sengaja menularkan atau menyebarkan virus, <em>worm</em>, <em>trojan horse</em>, <em>time bomb</em>, <em>trap door</em> atau kode komputer, berkas, atau program atau membuat permintaan berulang yang dirancang untuk mengganggu, merusak atau membatasi fungsi dari perangkat lunak,&nbsp;&nbsp;atau perangkat keras komputer, atau peralatan telekomunikasi, atau untuk mengurangi kualitas, mengganggu tampilan dari, atau merusak fungsi Situs web ini;</li>
            <li>Mengunggah, memasang, mengirimkan surel atau sebaliknya menerima,&nbsp;atau menempelkan tautan pada konten apapun yang menfasilitasi peretasan data;</li>
            <li>Meretas apapun yang menjadi bagian dari Situs web ini;</li>
            <li>Mengunggah, mengirimkan surel, atau mengirimkan tautan kepada konten mana saja yang melanggar hak kekayaan intelektual dari pihak ketiga;</li>
            <li>Mengelakkan atau mencoba mengelakkan, cara pengamanan apapun dari Situs Web; atau</li>
            <li>Menginjinkan pihak ketiga mana pun untuk melakukan semua hal diatas.</li>
            <li>Jika Anda menggunakan konten dari Situs Web ini namun gagal memenuhi persyaratan-persyaratan ini, maka hak Anda untuk menggunaka situs web ini akan langsung hilang.</li>
            <li>Tidak ada tautan dari situs lain pada Situs Web ini yang mungkin masuk tanpa izin tertulis dari kami terlebih dahulu. Anda tidak berhak memberi nama memodifikasi, atau membagikan kembali konten dari situs ini.</li>
          </ol>
          </li>
        </ol>

        <h4>Perlindungan dan Kerahasiaan data</h4>

        <ol class="leftmargin-sm rightmargin-sm">
          <li>Keberadaan kami bisa merupakan hasil dari interaksi Anda dengan Situs Web ini, dan mengadakan, serta memproses informasi yang diperoleh tentang Anda ketika Anda meng-akses SitusWeb ini, dan menggunakannya untuk membuat keputusan pinjaman, dan hubungan pelayanan kami dengan Anda, demi fungsi pencegahan penipuan dan pengumpulan hutang, untuk mengetahui kebutuhan keuangan Anda, terkait dengan usaha kami dan untuk memberikan layanan pelanggan yang lebih baik dan produk yang tepat dari pihak ketiga, untuk mengevaluasi keefektifan dari pemasaran Situs Web kami, dan untuk analisa statistik. Kami mungkin meneruskan infomasi kepada agen-agen kami, sesuai dengan ketentuan hukum, dan mereka juga dapat meneruskan informasi yang mereka miliki tentang Anda kepada kami, dan kami juga dapat melakukan hal yang sama. Kami tidak akan membuka informasi apapun diluar PT Digital Alpha Indonesia kecuali untuk kepentingan pencegahan penipuan dan/ atau bila diminta/ dan diwajibkan oleh hukum dan pemerintah, atau badan hukum, atau agen, atau lembaga berwenang dibawah aturan yang ada, atau dibawah kode rahasia untuk meng-sub kontrakkan, atau orang yang bertindak sebagai agen kami atau apa saja yang kami beri wewenang.</li>
          <li>Dengan mendaftarkan semua informasi melalui situs web ini, Anda setuju bahwa PT Digital Alpha Indonesia dapat menghubungi Anda kapan saja melalui surat, faksimili, surel ataupun telepon.</li>
          <li>Semua informasi yang dimasukan dalam form pada situs ini disimpan dengan aman dan rahasia oleh PT Digital Alpha Indonesia sesuai dengan ketentuan perlindungan data lokal di Indonesia. Kami mensyaratkan semua pihak yang kami sampaikan informasi Anda untuk menyimpannya dengan tingkat kerahasiaan yang sama. Kami juga telah mengambil semua langkah yang wajar secara komersial untuk memastikan bahwa setiap informasi yang dikirimkan pada website dilindungi dan dienkripsi termasuk namun tidak terbatas pada penggunaan teknologi SSL / TLS yang tersedia untuk penggunaan komersial.</li>
          <li>Kami menjaga privasi data yang sangat serius. Anda dapat meninjau kebijakan privasi kami rinci di https://Kasbon.com/en/privacy-policy atau Anda dapat menghubungi kami di contact@Kasbon.com untuk informasi lebih lanjut tentang bagaimana kami menangani atau memproses informasi pribadi Anda.</li>
        </ol>

        <h4>Penafian dan Pembatasan (liability)</h4>

        <ol class="leftmargin-sm rightmargin-sm">
          <li>Kami telah mengambil langkah yang bertanggung jawab untuk memastikan keakuratan, ketepatan, kebenaran dan kelengkapan informasi dari Situs Web ini. Namun, bagaimanapun juga, informasi yang ada pada situs ini, dan disebut dengan “sebagaimana yang ada” atau “sebagaimana arti” hanya merupakan dasar, dan kami tidak memberikan jaminan atau mewakili apapun, meskipun hal tersebut terlihat jelas atau tersirat.</li>
          <li>Penggunaan dari Situs Web ini dan informasi yang terkandung didalamnya adalah tanggung jawab resiko Anda sendiri. Kami tidak menjamin kehilangan atau kerusakan, apakah langsung atau tidak langsung, sebagai akibat atau sebaliknya, yang mungkin membuat Anda kesulitan untuk menggunakan Situs Web ini; termasuk, namun tidak terbatas pada layanan komputer, atau kegagalan sistem, akses yang tertunda, atau terganggu, data yang tidak terkirim atau salah pengiriman virus komputer, atau komponen lain yang merusak, melanggar keamanan, atau sistem tak bertanggung jawab yang berasal dari datangnya "peretas" atau sebaliknya, atau kepercayaan Anda pada informasi yang ada pada Situs Web ini.</li>
          <li>Kami tidak mewakili atau menjamin Situs Web ini selalu tersedia dan memenuhi kebutuhan Anda, seperti terganggunya akses, tidak akan adanya penundaan, kegagalan, eror atau penghilangan atau kehilangan dari informasi yang dikirimkan; tidak akan ada virus atau kontaminasi atau hal-hal yang merusak, tidak akan terkirim atau tidak akan ada kerusakan pada sistem komputer Anda. Anda bertanggung jawab sendiri untuk perlindungan yang sesuai atas data dan atau peralatan, dan untuk mengambil tindakan yang bertanggung jawab dan sesuai sebagai pencegahan dan memindai virus komputer atau hal-hal perusak lainnya.</li>
          <li>Kami tidak membuat perwakilan atau garansi terkait dengan keakuratan, fungsi, tampilan perangka lunak dari pihak ketiga manapun yang mungkin digunakan untuk koneksi pada Situs Web ini.</li>
        </ol>

        <h4>Peraturan pemerintah</h4>

        <ol class="leftmargin-sm rightmargin-sm">
          <li>Persyaratan ini ditentukan dan diterjemahkan sesuai dengan peraturan pemerintah Republik Indonesia. Pihak-pihak yang dengan ini, tunduk kepada yurisdiksi non-eksklusif dari Pengadilan Negeri Jakarta Selatan. Meskipun begitu perjanjian ini bisa saja berlaku di pengadilan manapun di setiap yurisdiksi yang kompeten seperti yang kami dapat tentukan sewaktu-waktu.</li>
        </ol>

        <h4>Pelepasan</h4>

        <ol class="leftmargin-sm rightmargin-sm">
          <li>Kegagalan kami untuk menggunakan atau menunda dalam melaksanakan hak, kekuasaan atau hak istimewa berdasarkan Perjanjian ini bukanlah sebuah pengabaian; begitu juga terhalanganya salah satu atau sebagian dari hak, kekuasaan atau hak istimewa manapun atau penggunaannya.</li>
        </ol>
                                    </div>
                                  </div>
                                  <div class="p-left-15 p-right-15 m-top-10">
                                    <input type="checkbox" id="agree"><label for="agree" class="c-black">Saya telah membaca dan setuju dengan seluruh <a href="fees.html" target="">aturan dan biaya</a> jasa peminjaman Kasbon</label>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <!-- <a type="button" class="btn btn-primary" href="pengajuan.php" style="width:auto;">Lanjutkan Proses</a> -->

                                  <button type="submit" id="ajukan-pinjaman-final" disabled="disabled" class="btn btn-primary btn-loading" >Lanjutkan Proses</button>
                                </div>
                              </div>
                            </div>
                          </div>
                      @endif
                      @endforeach
                      @endif
                        <a class="trigger-modal hide" data-toggle="modal" data-target=".bs-example-modal-lg"></a>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
               <meta name="_token" content="{!! csrf_token() !!}" />
            {!! Form::close() !!}
          </div>    
        </div><!--  .loan-wrapper -->

        <section id="alasan">
          <div class="container">
            <header class="common__header text-center">
              <h2>Mengapa harus memilih Kasbon?</h2>
              <p>
                Kasbon merupakan penyedia layanan pinjaman jangka pendek online pertama di Indonesia dengan proses cepat dan terpercaya. Kasbon hadir untuk menjawab kebutuhan akan dana talangan, bagi masyarakat saat ini.
              </p>
            </header>
            <div class="row">
              <div class="col-md-4 text-center">
                <img src="{{ asset('frontend/statics/v2/assets/why-fleksibel.png')}}">
                <h3>Pengajuan Pinjaman Mudah</h3>
                <p class="text-left">
                  Dilakukan secara online; Anda dapat mengajukan pinjaman dimanapun dan kapanpun, baik dari rumah, dari kantor, pada waktu pagi hari atau malam hari. Simpan waktu Anda untuk aktivitas yang berharga.
                </p>
              </div>
              <div class="col-md-4 text-center">
                <img src="{{ asset('frontend/statics/v2/assets/why-cepat.png')}}">
                <h3>Proses Cepat</h3>
                <p class="text-left">
                  Apabila permohonan pinjaman Anda disetujui, kami transfer langsung ke rekening Anda dalam hari yang sama.
                </p>
              </div>
              <div class="col-md-4 text-center">
                <img src="{{ asset('frontend/statics/v2/assets/why-transparan.png')}}">
                <h3>Transparan &amp; Fleksibel</h3>
                <p class="text-left">
                  Anda dapat mengetahui semua biaya yang dibebankan dari awal Anda mengajukan pinjaman, serta Anda memiliki keleluasaan mengatur periode dan bunga menyesuaikan dengan periode pinjaman. Semakin cepat, semakin kecil bunga yang dibayarkan.
                </p>
              </div>
            </div>
          </div>
        </section>

        <section id="pertanyaan">
          <div class="container">
            <header class="common__header text-center">
              <h2>Pertanyaan yang sering ditanyakan</h2>
            </header>
            <div class="row">
              <div class="col-md-6">
                <div class="pertanyaan-highlight">
                  <h3>Apa saja syarat untuk mengajukan pinjaman di Kasbon? </h3>
                  <ul>
                    <li>Warga Negara Indonesia.</li>
                    <li>Berdomisili di Jabodetabek, Yogyakarta, Solo, Magelang dan Klaten.</li>
                    <li>Berusia 21 s/d 65 tahun.</li>
                    <li>Memiliki penghasilan minimum Rp. 2.300.000,- untuk Jabodetabek &amp; Rp. 2.000.000,- untuk Yogyakarta, Solo, Magelang &amp; Klaten.</li>
                    <li>Menyampaikan dokumen KTP, slip gaji/bukti penghasilan dan foto pribadi.</li>
                    <li>Memiliki rekening tabungan atas nama nasabah.</li>
                    <li>Pastikan Anda telah memiliki email, sebelum mendaftar.</li>
                  </ul>
                </div>
                <div class="pertanyaan-highlight">
                  <h3>Berapa jumlah pinjaman yang dapat diajukan?</h3>
                  <p>
                  Pinjaman yang dapat diajukan adalah minimal Rp. 1.000.000 sampai dengan maksimal Rp. 2.000.000,-</p>
<p>Jika Anda adalah nasabah yang baik, untuk pinjaman ke-3 dan seterusnya, Anda dapat mengajukan pinjaman sampai dengan Rp. 3.000.000,-</p>
                  </p>
                </div>
              </div>

              <div class="col-md-6">

                <div class="pertanyaan-highlight">

                  <h3>Bagaimana cara mengajukan pinjaman?</h3>
                  <ul>
                    <li>Isi data lengkap Anda pada form online sesuai dengan petunjuk.</li>
                    <li>Anda akan menerima sms dan email notifikasi atas status pengajuan pinjaman Anda.</li>
                    <li>Jika pengajuan pinjaman Anda disetujui, pihak Kasbon akan melakukan verifikasi melalui telfon dan survey terhadap data-data yang diberikan.</li>
                    <li>Jika pengajuan pinjaman Anda disetujui oleh pihak verifikasi, dana pinjaman Anda akan kami transfer pada hari yang sama.</li>

                  </ul>
                </div>

                <div class="pertanyaan-highlight">
                  <h3>Bagaimana sistem pengembalian pinjaman?</h3>
                  <p>
                    Sistem pengembalian pinjaman yang diberlakukan oleh Kasbon adalah sistem pembayaran 1 (satu) kali, pada hari tanggal jatuh tempo harus melunasi pokok pinjaman dan kewajiban bunga.</p>
     <p>Total tagihan sesuai dengan simulasi perhitungan kredit awal yang diinformasikan kepada nasabah saat pengajuan.</p>
     <p>Jumlah total tagihan yang perlu dilunasi dapat dilihat pada halaman dashboard nasabah.</p>
                  </p>
                </div>


                
              </div>
            </div>
            <div class="common__footer text-center">
              <a href="faq.html" class="btn btn-default btn-lg">Lihat Pertanyaan Lainnya</a>
            </div>
          </div>
        </section>
 <script type="text/javascript">
      var lgAmount = 'Jumlah';
      var jvalidation ;
      var loanConf = {"promo_code":null,"view_calculate":"(principal * (pow((1+interest_rate), (dueDate)))) + transmission - principal","js_calculate":"(principal * (Math.pow((1+interest_rate),(dueDate)))) + transmission - principal","interest_rate":{{ $settings->value_pengaturan }}/100,"max_amount":2000000,"min_amount":50000,"step_amount":100000,"max_tenor":30,"min_tenor":10,"step_tenor":1,"format_tenor":"MMMM d, yyyy","amount":1800000,"tenor":20,"borrower_number":1,"grace_period":3,"scheme_name":"Pinjaman Pertama","scheme_desc":"Loan scheme terbaru untuk peminjam pertama","fees_amount":396342.07190634,"real_fees_amount":396342.07190634,"repay_amount":2196342.0719063,"due_date":"2016-08-05 21:09:15"};
      var locale   = 'id';
      // Validate Email
     
      
    </script>
        @stop
