<x-layout>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold">Edit Biodata Tim</div>
                <div class="card-body">
                    <form action="{{ route('biodatas.update', $biodata) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{ old('nama', $biodata->nama) }}" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim" value="{{ old('nim', $biodata->nim) }}" class="form-control @error('nim') is-invalid @enderror">
                            @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Peran</label>
                            <select name="peran" class="form-select @error('peran') is-invalid @enderror">
                                <option value="master" @selected(old('peran', $biodata->peran) == 'master')>Master</option>
                                <option value="pegawai" @selected(old('peran', $biodata->peran) == 'pegawai')>Pegawai</option>
                            </select>
                            @error('peran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi Tugas</label>
                            <textarea name="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $biodata->deskripsi) }}</textarea>
                            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ganti Foto Profil (Opsional)</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a href="{{ route('biodatas.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>