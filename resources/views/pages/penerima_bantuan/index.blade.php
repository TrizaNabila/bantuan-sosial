@extends('layouts2.guest.app')
@section('content')

<!-- Page Header -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-4">Penerima Bantuan</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
            <li class="breadcrumb-item text-warning active">Penerima Bantuan</li>
        </ol>
    </div>
</div>

<div class="bg-dark p-4 rounded-4 shadow-lg cosmic-bg">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="text-white fw-bold cosmic-title">
                <i class="bi bi-people-fill me-2"></i> Data Penerima Bantuan
            </h3>
            <p class="text-light opacity-75 mb-0">
                Daftar warga yang menerima program bantuan
            </p>
        </div>

        <a href="{{ route('penerima-bantuan.create') }}"
           class="btn btn-success fw-semibold btn-glow">
            <i class="bi bi-plus-circle me-1"></i> Tambah Penerima
        </a>
    </div>

    <!-- CARD LIST -->
    <div class="row g-4">

        @forelse($data as $item)

            <div class="col-md-4">
                <div class="card border-0 shadow-lg h-100 card-3d"
                     style="border-radius:20px; overflow:hidden;">

                    <div class="card-body p-4 bg-space">

                        <!-- Program -->
                        <div class="program-card mb-3 p-3 rounded-3">
                            <h6 class="text-white mb-1">Program Bantuan</h6>
                            <h5 class="text-warning fw-bold">
                                {{ $item->program->nama_program ?? '-' }}
                            </h5>
                            <span class="badge bg-info bg-opacity-25 text-info">
                                Tahun {{ $item->program->tahun ?? '-' }}
                            </span>
                        </div>

                        <!-- Warga -->
                        <div class="stat-box p-3 text-center rounded-3 mb-3">
                            <small class="text-muted d-block">Nama Warga</small>
                            <h6 class="text-white fw-bold mb-0">
                                {{ $item->warga->nama_warga ?? '-' }}
                            </h6>
                        </div>

                        <!-- Keterangan -->
                        <p class="text-light opacity-75">
                            {{ $item->keterangan ?? 'Tidak ada keterangan' }}
                        </p>

                        <!-- Action -->
                        <div class="d-flex gap-2 mt-3">
                            <form action="{{ route('penerima-bantuan.destroy', $item->penerima_id) }}"
                                  method="POST" class="w-100"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-glow w-100">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>

                        <small class="text-muted d-block text-center mt-3">
                            <i class="bi bi-clock"></i>
                            {{ $item->created_at->format('d M Y') }}
                        </small>

                    </div>
                </div>
            </div>

        @empty

            <div class="col-12 text-center">
                <div class="empty-state-card p-5">
                    <i class="bi bi-inbox display-1 text-muted"></i>
                    <h4 class="text-white mt-3">Belum ada penerima bantuan</h4>
                    <p class="text-muted">Silakan tambahkan data penerima bantuan</p>
                </div>
            </div>

        @endforelse

    </div>

</div>

@endsection
