@extends('layouts2.guest.app')
@section('content')

<div class="container-fluid page-header mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-4">Tambah Penerima Bantuan</h1>
    </div>
</div>

<div class="bg-dark p-4 rounded-4 shadow-lg cosmic-bg">

    <form action="{{ route('penerima-bantuan.store') }}" method="POST">
        @csrf

        <div class="row g-4">

            <!-- PROGRAM -->
            <div class="col-md-6">
                <label class="form-label text-white">Program Bantuan</label>
                <select name="program_id" class="form-select bg-space text-white border-space" required>
                    <option value="">-- Pilih Program --</option>
                    @foreach($programs as $program)
                        <option value="{{ $program->program_id }}">
                            {{ $program->nama_program }} ({{ $program->tahun }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- WARGA -->
            <div class="col-md-6">
                <label class="form-label text-white">Warga</label>
                <select name="warga_id" class="form-select bg-space text-white border-space" required>
                    <option value="">-- Pilih Warga --</option>
                    @foreach($wargas as $warga)
                        <option value="{{ $warga->warga_id }}">
                            {{ $warga->nama_warga }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- KETERANGAN -->
            <div class="col-12">
                <label class="form-label text-white">Keterangan</label>
                <textarea name="keterangan" class="form-control bg-space text-white border-space"
                          rows="4" placeholder="Opsional..."></textarea>
            </div>

        </div>

        <div class="d-flex justify-content-end mt-4 gap-2">
            <a href="{{ route('penerima-bantuan.index') }}" class="btn btn-secondary btn-glow">
                Kembali
            </a>
            <button class="btn btn-success btn-glow">
                <i class="bi bi-save"></i> Simpan
            </button>
        </div>

    </form>

</div>

@endsection
