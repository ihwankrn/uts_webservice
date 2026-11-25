<x-layout>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Card 1: Tombol Bulat Hijau (+) untuk Tambah Data -->
        <div class="col">
            <div class="card h-100 shadow-sm rounded-3">
                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 460px;">
                    <a href="{{ route('biodatas.create') }}"
                       class="btn btn-success rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                       style="width: 68px; height: 68px; font-size: 32px; line-height: 1;"
                       title="Tambah Biodata">
                        +
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Biodata Anggota Tim -->
        @foreach ($biodatas as $item)
            <div class="col">
                <div class="card h-100 shadow-sm rounded-3">
                    <div class="p-3 pb-0">
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}"
                                 class="card-img-top rounded-2 object-fit-cover"
                                 style="height: 290px; width: 100%;"
                                 alt="{{ $item->nama }}">
                        @else
                            <div class="bg-secondary-subtle text-secondary d-flex align-items-center justify-content-center rounded-2"
                                 style="height: 290px;">
                                Belum ada foto
                            </div>
                        @endif
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-lowercase mb-1">{{ $item->nama }}</h5>
                        <p class="card-text text-muted small flex-grow-1">
                            dengan NIM {{ $item->nim }} merupakan {{ $item->peran }} dan {{ $item->deskripsi }}
                        </p>

                        <div class="d-flex gap-2 pt-3 border-top mt-2">
                            <a href="{{ route('biodatas.edit', $item) }}" class="btn btn-outline-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('biodatas.destroy', $item) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus biodata {{ $item->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>