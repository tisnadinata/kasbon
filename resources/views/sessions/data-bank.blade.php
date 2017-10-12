  @extends('sessions.master')
  @section('content')
                <!-- Page Title
    ============================================= -->
    <section id="page-title" class="page-title">
     
        <div class="container clearfix">
         
              <h2 class="heading_title martop_1"><span> Beranda </span> </h2>
          
           
            <ol class="breadcrumb">
                <li><a href="{{ URL('') }}"> Beranda </a></li>
            </ol>
        </div>

    </section>
    <!-- #page-title end -->
    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container">
                <div class="row">
                  <div class="panel panel-default">
                    <!-- Default panel contents -->

                        <div class="panel-heading"> <h4 class="nomargin">Akun & Profile</h4></div>
                        <div class="panel-body">
                     <div id="side-navigation" class="ui-tabs ui-widget ui-widget-content ui-corner-all">

                        <div class="col_one_third nobottommargin">
    <div class="list-group">
      <a href="{{ URL('dashboard/akun-profile/data-akun') }}" class="list-group-item"><i class="fa fa-user"></i> Data Akun</a>
      <a href="{{ URL('dashboard/akun-profile/data-pribadi') }}" class="list-group-item"><i class="fa fa-magic"></i>  Data Pribadi </a>
      <a href="{{ URL('dashboard/akun-profile/data-alamat') }}" class="list-group-item"><i class="fa fa-map"></i>  Data Alamat</a>
      <a href="{{ URL('dashboard/akun-profile/data-kontak') }}" class="list-group-item "><i class="fa fa-book"></i> Data Kontak </a>
      <a href="{{ URL('dashboard/akun-profile/data-bank') }}" class="list-group-item active"><i class="fa fa-money"></i> Data Bank</a>
      <a href="{{ URL('dashboard/akun-profile/data-pekerjaan') }}" class="list-group-item "><i class="fa fa-black-tie"></i> Data Pekerjaan</a>
      <a href="{{ URL('dashboard/akun-profile/dokumen-pendukung') }}" class="list-group-item "><i class="fa fa-folder"></i> Dokumen Pendukung</a>
          </div>
  </div>                   
                    <div class="col_two_third col_last nobottommargin">
                            <div class="panel panel-default">
                            <!-- Default panel contents -->
                                <div class="panel-heading"> <h4 class="nomargin">Data Bank</h4></div>
                                <div class="panel-body">

                                     

                                       <div class="col-xs-12">
                                       @foreach($cust as $custs)
                                        <table class="table">
                                          <tbody>
                                            <tr>
                                              <td>Nama Bank</td>
                                              <td>: {{$custs->nama_bank}}</td>
                                            </tr>
                                            <tr>
                                              <td>Nama Pemilik Rekening</td>
                                              <td>: {{$custs->nomor_rekening}}</td>
                                            </tr>
                                            <tr>
                                              <td>No Rekening</td>
                                              <td>: {{$custs->atas_nama}}</td>
                                            </tr>
                                            
                                          </tbody>
                                        </table>
                                        @endforeach
                                        <!-- <a href="#" class="btn btn-primary">My Sales Performance</a>
                                        <a href="#" class="btn btn-primary">Team Sales Performance</a> -->
                                      </div>
                                    </div>
                                  </div>

                                  </div>

                            </div>
                          </div>
                       

                      </div> <!-- side-navigation -->
                      @include('sessions.Addition')
                    </div> <!-- row -->

                  </div> <!-- panel -->

                </div> <!-- col-sm-14 -->
        </section></div> <!-- content-wrap -->
        @stop