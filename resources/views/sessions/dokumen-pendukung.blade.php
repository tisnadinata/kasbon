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
      <a href="{{ URL('dashboard/akun-profile/data-akun') }}" class="list-group-item"><i class="fa fa-user"></i> Data Akun</a>
      <a href="{{ URL('dashboard/akun-profile/data-pribadi') }}" class="list-group-item"><i class="fa fa-magic"></i>  Data Pribadi </a>
      <a href="{{ URL('dashboard/akun-profile/data-alamat') }}" class="list-group-item"><i class="fa fa-map"></i>  Data Alamat</a>
      <a href="{{ URL('dashboard/akun-profile/data-kontak') }}" class="list-group-item"><i class="fa fa-book"></i> Data Kontak </a>
      <a href="{{ URL('dashboard/akun-profile/data-bank') }}" class="list-group-item "><i class="fa fa-money"></i> Data Bank</a>
      <a href="{{ URL('dashboard/akun-profile/data-pekerjaan') }}" class="list-group-item "><i class="fa fa-black-tie"></i> Data Pekerjaan</a>
      <a href="{{ URL('dashboard/akun-profile/dokumen-pendukung') }}" class="list-group-item active"><i class="fa fa-folder"></i> Dokumen Pendukung</a>
          </div>
  </div>                   
                    <div class="col_two_third col_last nobottommargin">
                            <div class="panel panel-default">
                            <!-- Default panel contents -->
                              <div class="panel-heading"> <h4 class="nomargin">Dokumen Pendukung</h4></div>
                                <div class="panel-body">
                                   <div class="col-xs-12">
                                       @foreach($cust as $custs)
                                        <table class="table">
                  {!! Form::open(['url' => 'dashboard/akun-profile/dokumen-pendukung','method' => 'post', 'files' => true]) !!}
                                          <tbody>
                                            <tr>
                                              <td>KTP</td>
                                            @if ($custs->file_ktp == null)
                                            <td><input id="input-1" type="file" name="file_ktp" class="file"></td>
                                            @else
                                            <td>
                                              <a href="{{ asset('/images/'.$custs->file_ktp) }}" download><i class="fa fa-download fa-2x"></i></a>&nbsp;&nbsp;&nbsp;<a data-toggle="modal" data-target="#KTP"><i class="fa fa-file-archive-o fa-2x"></i></a></td>
                                            </tr>
                                            @endif
                                            <tr>
                                            <td>Kartu Keluarga</td>
                                            @if ($custs->file_kk == null)
                                              <td><input name="file_ktp" type="file" class="file"></td>
                                              {!! $errors->first('file_ktp', '<p class="help-block">:message</p>') !!}
                                            @else
                                              <td><a href="{{ asset('/images/'.$custs->file_kk) }}" download><i class="fa fa-download fa-2x"></i></a>&nbsp;&nbsp;&nbsp;<a data-toggle="modal" data-target="#KK"><i class="fa fa-file-archive-o fa-2x"></i></a></td>
                                            @endif
                                            </tr>
                                            @if ($custs->file_kk == null || $custs->file_ktp == null)
                                            <tr>
                                            <td>*File yang diupload harus gambar berupa .JPG , .PNG max 2 Mb</td>
                                            <td><button type="submit" class="btn-loading btn-primary btn-sm" id="change_detail" name="" value="login">Submit</button></td>
                                            </tr>
                                            @if (Session::has('messages'))
        @foreach (Session::get('messages') as $message)
        @if ($message[0] == 'error')
        <div class="alert alert-danger">{{$message[1]}}</div>
        @elseif ($message[0] == 'success')
        <div class="alert alert-success">{{$message[1]}}</div>
        @endif
        @endforeach
        @endif
                                            @endif
                                          </tbody>
                                          </form>
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
                          @foreach($cust as $custs) 
                          <!-- Modal -->
                            <div class="modal fade" id="KTP" role="dialog">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">KTP</h4>
                                  </div>
                                  <div class="modal-body">
                                    <img src="{{ asset('/images/'.$custs->file_ktp) }}">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="KK" role="dialog">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Kartu Keluarga</h4>
                                  </div>
                                  <div class="modal-body">
                                    <img src="{{ asset('/images/'.$custs->file_kk) }}">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endforeach
                      </div> <!-- side-navigation -->
                      @include('sessions.Addition')
                    </div> <!-- row -->

                  </div> <!-- panel -->

                </div> <!-- col-sm-14 -->
        </section></div> <!-- content-wrap -->
        @stop