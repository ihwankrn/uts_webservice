<x-layout>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold">Tambah Biodata Tim</div>
                <div class="card-body">
                    <form action="{{ route('biodatas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim" value="{{ old('nim') }}" class="form-control @error('nim') is-invalid @enderror">
                            @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Peran</label>
                            <select name="peran" class="form-select @error('peran') is-invalid @enderror">
                                <option value="master" @selected(old('peran') == 'master')>Master</option>
                                <option value="pegawai" @selected(old('peran') == 'pegawai')>Pegawai</option>
                            </select>
                            @error('peran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi Tugas</label>
                            <textarea name="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Contoh: mempunyai tugas mengerjakan back-end pada UTS ini">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Profil</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('biodatas.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>