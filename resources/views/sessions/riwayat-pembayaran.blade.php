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

                        <div class="panel-heading"> <h4 class="nomargin">Riwayat Pembayaran</h4></div>
                        <div class="panel-body">
                     <div id="side-navigation" class="ui-tabs ui-widget ui-widget-content ui-corner-all">

                    <div class="col_full col_last nobottommargin">
                                <div class="panel-body">
                                        <table class="table">
                                          <tbody>
                                          <tr>
                                            <th>ID</th>
                                            <th>Nama Bank</th> 
                                            <th>Atas Nama</th>
                                            <th>Nomor Rekening</th>
                                            <th>Total Pembayaran</th>
                                            <th>Tanggal</th>
                                            <th>Kepada</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                          </tr>
                                          @foreach($cust as $custs)
                                            <tr>
                                              <td>{{ $custs->id_pembayaran}}</td>
                                              <td>{{ $custs->nama_bank}}</td>
                                              <td>{{ $custs->atas_nama}}</td>
                                              <td>{{ $custs->nomor_rekening}}</td>
                                              <td>{{ $custs->total_pembayaran}}</td>
                                              <td>{{ $custs->tanggal_pembayaran}}</td>
                                              <td>{{ $custs->bank->nama_bank}}/{{ $custs->bank->atas_nama}}</td>
                                              <td>{{ $custs->keterangan}}</td>
                                              <td>{{ $custs->status_pembayaran}}</td>
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