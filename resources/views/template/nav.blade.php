<li class="nav-item @if ($active == 'siswa') {{ 'active' }} @endif">
    <a class="nav-link" href="{{ url('siswa') }}">
        <i class="fas fa-fw fa-coins" style="color: rgb(236, 233, 39);"></i>
        <span class="text-white">Data Pembayaran</span>
    </a>
</li>

<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
