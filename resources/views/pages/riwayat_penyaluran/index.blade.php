@extends('layouts2.guest.app')

@section('content')
<div class="container py-5" style="margin-top:120px">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">Riwayat Penyaluran Bantuan</h4>

        <a href="{{ route('riwayat-penyaluran.create') }}"
           class="btn btn-warning text-white">
            + Tambah Penyaluran
        </a>
    </div>

    <!-- Table -->
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-dark text-center">
                        <tr>
                            <th style="width:50px">No</th>
                            <th>Program</th>
                            <th>Penerima</th>
                            <th style="width:80px">Tahap</th>
                            <th style="width:120px">Tanggal</th>
                            <th style="width:120px">Nilai</th>
                            <th style="width:100px">Bukti</th>
                            <th style="width:100px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($riwayat as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>

                            <td>{{ $item->program->nama_program ?? '-' }}</td>

                            <td>{{ $item->penerima->nama_penerima ?? '-' }}</td>

                            <td class="text-center">{{ $item->tahap_ke }}</td>

                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                            </td>

                            <td class="text-end">
                                Rp {{ number_format($item->nilai, 0, ',', '.') }}
                            </td>

                            <td class="text-center">
                                @if($item->bukti_penyaluran)
                                    <a href="{{ asset('storage/'.$item->bukti_penyaluran) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-primary">
                                        Lihat
                                    </a>
                                @else
                                    -
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{ route('riwayat-penyaluran.edit', $item->penyaluran_id) }}"
                                   class="btn btn-sm btn-warning text-white">
                                    Edit
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                Data belum tersedia
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection
