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

                        <div class="panel-heading"> <h4 class="nomargin">Riwayat Peminjaman</h4></div>
                        <div class="panel-body">
                     <div id="side-navigation" class="ui-tabs ui-widget ui-widget-content ui-corner-all">

                    <div class="col_full col_last nobottommargin">
                                <div class="panel-body">
                                        <table class="table">
                                          <tbody>
                                          <tr>
                                            <th>Tanggal</th>
                                            <th>Referal</th> 
                                            <th>Jumlah Pinjaman</th>
                                            <th>Biaya Layanan</th>
                                            <th>Total Peminjaman</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Alasan Pinjaman</th>
                                            <th>Status Pinjaman</th>
                                          </tr>
                                          @foreach($cust as $custs)
                                            <tr>
                                              <td>{{ $custs->tanggal_pengajuan}}</td>
                                              <td>{{ $custs->referal}}</td>
                                              <td>{{ $custs->jumlah_pinjaman}}</td>
                                              <td>{{ $custs->biaya_layanan}}</td>
                                              <td>{{ $custs->total_peminjaman}}</td>
                                              <td>{{ $custs->jatuh_tempo}}</td>
                                              <td>{{ $custs->alasan_pinjaman}}</td>
                                              <td>{{ $custs->status_peminjaman}}</td>
                                            </tr>
                                          @endforeach
                                          </tbody>
                                        </table>
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