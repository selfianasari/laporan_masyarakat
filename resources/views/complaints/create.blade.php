@extends('layouts.app')

@section('content')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Form Pengaduan Masyarakat </h3>
              <nav aria-label="breadcrumb"></nav>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Data Diri</h4>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="phone">Nomor Telp.</label>
                        <input type="tel" class="form-control" id="phone" placeholder="Nomor Telp.">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Pengaduan</h4>
                    <form class="forms-sample">
                      <div class="form-group row">
                        <label for="date" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="date" placeholder="Tanggal">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="category" class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                         <select class="form-select form-select-lg" id="category">
                           <option value="cleanliness">Kebersihan</option>
                           <option value="security">Keamanan</option>
                           <option value="infrastructure">Infrastruktur</option>
                           <option value="public_service">Layanan Publik</option>
                           <option value="other">Lainnya</option>
                         </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="description" placeholder="Deskripsi">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="location" class="col-sm-3 col-form-label">Lokasi</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="location" placeholder="Lokasi">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="attachment" class="col-sm-3 col-form-label">Foto bukti</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" id="attachment" placeholder="Foto bukti">
                        </div>
                      </div>
                      <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="anonymous">
                                    <label class="form-check-label" for="anonymous">
                                        Kirim sebagai anonim
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="privacyPolicy" required>
                                    <label class="form-check-label" for="privacyPolicy">
                                        Saya setuju dengan <a href="#">kebijakan privasi</a>
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button type="button" class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection