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
                    
                        <div class="panel-heading"> <h4 class="nomargin">Konfirmasi Pembayaran</h4></div>
                        <div class="panel-body">@if (Session::has('messages'))
                      @foreach (Session::get('messages') as $message)
                      @if ($message[0] == 'error')
                      <div class="alert alert-danger">{{$message[1]}}</div>
                      @elseif ($message[0] == 'success')
                      <div class="alert alert-success">Pembayaran akan segera kami proses</div>
                      @endif
                      @endforeach
                      @endif

                     <div id="side-navigation" class="ui-tabs ui-widget ui-widget-content ui-corner-all">

                    <div class="col_full col_last nobottommargin">
                                <div class="panel-body">
                                {!! Form::open(['url' => 'dashboard/konfirmasi-pembayaran' , 'form-ajax' => 'true', 'class' => 'edit-personal-user', 'role' => 'form']) !!}

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
                                  <div class="col_full">
                                      <label for="login-form-username">Nama Bank:</label>
                                      <div class="input-group input-group-sm">
                                      <span class="input-group-addon" id="sizing-addon1"></span>
                                    <select class="form-control" name="nama_bank">
                                    @foreach($cust as $custs)
                                    <option value="{{ $custs->bank->nama_bank }}" selected="selected">{{ $custs->bank->nama_bank }}</option>        
                                    @endforeach
                                    </select> 
                                    </div>
                                  </div>

                                 <input type="hidden" name="id_bank" value="{{ $custs->bank->id_bank }}">
                                  <div class="col_full">
                                      <label for="login-form-username">Nama Pemilik</label>
                                      <div class="input-group input-group-sm">
                                      <span class="input-group-addon" id="sizing-addon1">A.N</span>
                                          <input type="text" required placeholder="Nama Pemilik" id="full_name" value="{{ $custs->bank->atas_nama }}" minlength=4 onkeypress="return onlyNumberkey(event)" name="atas_nama"  class="required form-control input-block-level" />
                                      </div>
                                  </div>

                                  <div class="col_full">
                                      <label for="login-form-password">Nomor Rekening</label>
                                      <div class="input-group input-group-sm">
                                          <span class="input-group-addon" id="sizing-addon1"></span>
                                          <input type="text" required placeholder="Nomor Rekening" id="phone_number" minlength=4 onkeypress="return onlyNumberkey(event)" value="{{ $custs->bank->nomor_rekening }}" name="norek"  class="required form-control input-block-level" />
                                      </div>
                                  </div>
                                   <div class="col_full">
                                      <label for="login-form-username">Total Pembayaran</label>
                                      <div class="input-group input-group-sm">
                                      <span class="input-group-addon" id="sizing-addon1">Rp</span>
                                          <input type="number" required placeholder="Total Pembayaran"  name="tot_pembayaran" value="0"  class="form-control input-block-level" />
                                      </div>
                                  </div>
                                  <div class="col_full">
                                      <label for="login-form-username">No Rekening Tujuan</label>
                                      <div class="input-group input-group-sm"><span class="input-group-addon" id="sizing-addon1"></span>
                                    <select class="form-control" name="norek_tujuan">
                                    @foreach($rek_kasbon as $s)
                                    <option value="{{ $s->id_bank }}" selected="selected">{{ $s->nama_bank }} / A.N {{ $s->atas_nama }}</option>        
                                    @endforeach
                                    </select>
                                      </div>
                                  </div>

                                  <div class="col_full">
                                      <label for="login-form-username">Keterangan</label>
                                      <div class="input-group input-group-sm"><span class="input-group-addon" id="sizing-addon1"></span>
                                    <textarea class="form-control" name="keterangan"></textarea>
                                    </select>
                                      </div>
                                  </div>

                                  </div>
                                      <div class="col_full">
                                      <button type="submit" class="btn-loading btn-primary btn-sm" id="change_detail" name="" value="login">Kirim<i class="icon-line2-arrow-right"> </i> </button>
                                  </div>
                                </form>
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