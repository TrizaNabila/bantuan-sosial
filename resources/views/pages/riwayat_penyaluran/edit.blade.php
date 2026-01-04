@extends('layouts2.guest.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Edit Riwayat Penyaluran</h4>

    <form action="{{ route('riwayat-penyaluran.update', $riwayat->penyaluran_id) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Program Bantuan</label>
            <select name="program_id" class="form-control" required>
                @foreach ($program as $item)
                    <option value="{{ $item->id }}"
                        {{ $riwayat->program_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_program }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Penerima Bantuan</label>
            <select name="penerima_id" class="form-control" required>
                @foreach ($penerima as $item)
                    <option value="{{ $item->id }}"
                        {{ $riwayat->penerima_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_penerima }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tahap Ke</label>
            <input type="number" name="tahap_ke"
                   value="{{ $riwayat->tahap_ke }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal"
                   value="{{ $riwayat->tanggal }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nilai Bantuan</label>
            <input type="number" name="nilai"
                   value="{{ $riwayat->nilai }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Bukti Penyaluran</label><br>
            @if ($riwayat->bukti_penyaluran)
                <a href="{{ asset('storage/'.$riwayat->bukti_penyaluran) }}" target="_blank">
                    Lihat Bukti
                </a><br><br>
            @endif
            <input type="file" name="bukti_penyaluran" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('riwayat-penyaluran.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
