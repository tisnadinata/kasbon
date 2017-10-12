  @extends('sessions.master')
  @section('content')
             
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
      <a href="{{ URL('dashboard/akun-profile/data-akun') }}" class="list-group-item active"><i class="fa fa-user"></i> Data Akun</a>
      <a href="{{ URL('dashboard/akun-profile/data-pribadi') }}" class="list-group-item"><i class="fa fa-magic"></i>  Data Pribadi </a>
      <a href="{{ URL('dashboard/akun-profile/data-alamat') }}" class="list-group-item"><i class="fa fa-map"></i>  Data Alamat</a>
      <a href="{{ URL('dashboard/akun-profile/data-kontak') }}" class="list-group-item "><i class="fa fa-book"></i> Data Kontak </a>
      <a href="{{ URL('dashboard/akun-profile/data-bank') }}" class="list-group-item "><i class="fa fa-money"></i> Data Bank</a>
      <a href="{{ URL('dashboard/akun-profile/data-pekerjaan') }}" class="list-group-item "><i class="fa fa-black-tie"></i> Data Pekerjaan</a>
      <a href="{{ URL('dashboard/akun-profile/dokumen-pendukung') }}" class="list-group-item "><i class="fa fa-folder"></i> Dokumen Pendukung</a>
          </div>
  </div>                   
                    <div class="col_two_third col_last nobottommargin">
                            <div class="panel panel-default">
                            <!-- Default panel contents -->
                                <div class="panel-heading"> <h4 class="nomargin">Data Akun</h4></div>
                                <div class="panel-body">

                                     
                                    @foreach($cust as $custs)
                                       <div class="col-xs-12"> 
                                        <table class="table">
                                          <tbody>
                                            <tr>
                                              <td>Email</td>
                                              <td>: {{$custs->email}}</td>
                                            </tr>
                                            <tr>
                                              <td>Kata Sandi</td>
                                              <td>: **********</td>
                                            </tr>
                                    @endforeach
                                          </tbody>
                                        </table>
                                        
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