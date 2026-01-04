@extends('layouts2.guest.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Tambah Riwayat Penyaluran</h4>

    <form action="{{ route('riwayat-penyaluran.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Program Bantuan</label>
            <select name="program_id" class="form-control" required>
                <option value="">-- Pilih Program --</option>
                @foreach ($program as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_program }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Penerima Bantuan</label>
            <select name="penerima_id" class="form-control" required>
                <option value="">-- Pilih Penerima --</option>
                @foreach ($penerima as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_penerima }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tahap Ke</label>
            <input type="number" name="tahap_ke" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nilai Bantuan</label>
            <input type="number" name="nilai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Bukti Penyaluran</label>
            <input type="file" name="bukti_penyaluran" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('riwayat-penyaluran.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
