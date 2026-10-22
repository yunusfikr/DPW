ALTER TABLE peminjaman
    ADD COLUMN IF NOT EXISTS tanggal_jatuh_tempo DATE;

UPDATE peminjaman
SET tanggal_jatuh_tempo = tanggal_pinjam + 7
WHERE tanggal_jatuh_tempo IS NULL;

ALTER TABLE peminjaman
    ALTER COLUMN tanggal_jatuh_tempo SET DEFAULT (CURRENT_DATE + 7);
ALTER TABLE peminjaman
    ALTER COLUMN tanggal_jatuh_tempo SET NOT NULL;

    