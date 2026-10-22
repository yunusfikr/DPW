<?php
// Membungkus output data yang berasal dari input pengguna sebelum
// dicetak ke HTML, untuk mencegah XSS (Cross-Site Scripting).
// Lama peminjaman (hari) sebelum buku harus dikembalikan.
const LAMA_PINJAM_HARI = 7;

// Menghitung selisih hari keterlambatan; 0 bila belum/tidak terlambat.
// $tglAcuan = tanggal pengembalian aktual, atau null untuk memakai hari ini.
function hari_terlambat($jatuhTempo, $tglAcuan = null)
{
    if (!$jatuhTempo) {
        return 0;
    }
    $tempo = new DateTime($jatuhTempo);
    $acuan = new DateTime($tglAcuan ?? 'today');
    return $acuan > $tempo ? (int) $tempo->diff($acuan)->days : 0;
}

function e($value)
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
}