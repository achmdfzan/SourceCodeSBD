SELECT *
FROM peserta_program_mbkm
    JOIN peserta_mbkm ON peserta_program_mbkm.id_peserta = peserta_mbkm.id_peserta_mbkm
    JOIN mahasiswa ON peserta_mbkm.id_mahasiswa = mahasiswa.id_mahasiswa;
-- 
SELECT nim,
    nama_mahasiswa,
    semester_saat_mbkm,
    kelolosan,
    total_sks_mbkm,
    id_program_mbkm,
    id_pembimbing_mbkm,
    id_akun,
    id_peserta,
    mahasiswa.id_mahasiswa
FROM peserta_program_mbkm
    JOIN peserta_mbkm ON peserta_program_mbkm.id_peserta = peserta_mbkm.id_peserta_mbkm
    JOIN mahasiswa ON peserta_mbkm.id_mahasiswa = mahasiswa.id_mahasiswa;
--
SELECT *
FROM program_mbkm
    JOIN (
        SELECT nim,
            nama_mahasiswa,
            semester_saat_mbkm,
            kelolosan,
            total_sks_mbkm,
            id_program_mbkm,
            id_pembimbing_mbkm,
            id_akun,
            id_peserta,
            id_mahasiswa
        FROM peserta_program_mbkm
            JOIN peserta_mbkm ON peserta_program_mbkm.id_peserta = peserta_mbkm.id_peserta_mbkm
            JOIN mahasiswa ON peserta_mbkm.id_mahasiswa = mahasiswa.id_mahasiswa
    ) as X ON program_mbkm.id_program = X.id_program_mbkm
WHERE program_mbkm.id_kategori_program = 2;
-- 
SELECT *
FROM program_mbkm
    JOIN (
        SELECT nim,
            nama_mahasiswa,
            semester_saat_mbkm,
            kelolosan,
            total_sks_mbkm,
            id_program_mbkm,
            id_pembimbing_mbkm,
            id_akun,
            id_peserta,
            mahasiswa.id_mahasiswa
        FROM peserta_program_mbkm
            JOIN peserta_mbkm ON peserta_program_mbkm.id_peserta = peserta_mbkm.id_peserta_mbkm
            JOIN mahasiswa ON peserta_mbkm.id_mahasiswa = mahasiswa.id_mahasiswa
    ) as X ON program_mbkm.id_program = X.id_program_mbkm
    JOIN kategori_program ON program_mbkm.id_kategori_program = kategori_program.id_kategori
WHERE program_mbkm.id_kategori_program = 2;
-- 
ALTER TABLE `peserta_program_mbkm`
  ADD CONSTRAINT `peserta_program_mbkm_ibfk_1` FOREIGN KEY (`id_peserta_mbkm`) REFERENCES `peserta_mbkm` (`id_peserta_mbkm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
-- 
-- 
ALTER TABLE `peserta_program_mbkm`
ADD CONSTRAINT `peserta_program_mbkm_ibfk_2` FOREIGN KEY (`id_program_mbkm`) REFERENCES `program_mbkm` (`id_program_mbkm`) ON DELETE CASCADE ON UPDATE CASCADE;
-- 

-- 
ALTER TABLE `peserta_program_mbkm`
ADD CONSTRAINT `peserta_program_mbkm_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;
-- 
ALTER TABLE peserta_program_mbkm
  DROP FOREIGN KEY peserta_program_mbkm_ibfk_1
--   
SELECT id_mahasiswa FROM peserta_program_mbkm JOIN peserta_mbkm ON peserta_mbkm.id_peserta_mbkm = peserta_program_mbkm.id_peserta_mbkm  WHERE id_peserta_mbkm = 1;
-- D- Daftar pendaftar MBKM
SELECT id_peserta_mbkm,
    X.id_program_mbkm,
    nim,
    nama_mahasiswa,
    semester_sekarang,
    COUNT(*) AS jmlh_mbkm,
    kelolosan,
    berkas_persyaratan,
    bukti_lolos,
    status_pengajuan
FROM program_mbkm
    JOIN (
        SELECT nim,
            nama_mahasiswa,
            semester_sekarang,
            semester_saat_mbkm,
            kelolosan,
            total_sks_mbkm,
            id_program_mbkm,
            id_pembimbing_mbkm,
            id_akun,
            bukti_lolos,
            status_pengajuan,
            berkas_persyaratan,
            peserta_mbkm.id_peserta_mbkm,
            mahasiswa.id_mahasiswa
        FROM peserta_program_mbkm
            JOIN peserta_mbkm ON peserta_program_mbkm.id_peserta_mbkm = peserta_mbkm.id_peserta_mbkm
            JOIN mahasiswa ON peserta_mbkm.id_mahasiswa = mahasiswa.id_mahasiswa
    ) as X ON program_mbkm.id_program_mbkm = X.id_program_mbkm
    JOIN kategori_program ON program_mbkm.id_kategori_program = kategori_program.id_kategori_program
GROUP BY X.nim;


-- daftar mahasiswa program mbkm
SELECT id_peserta_mbkm,
    X.id_program_mbkm,
    nim,
    nama_mahasiswa,
    semester_sekarang,
    COUNT(*) AS jmlh_mbkm
FROM program_mbkm
    JOIN (
        SELECT nim,
            nama_mahasiswa,
            semester_sekarang,
            semester_saat_mbkm,
            kelolosan,
            total_sks_mbkm,
            id_program_mbkm,
            id_pembimbing_mbkm,
            id_akun,
            peserta_mbkm.id_peserta_mbkm,
            mahasiswa.id_mahasiswa
        FROM peserta_program_mbkm
            JOIN peserta_mbkm ON peserta_program_mbkm.id_peserta_mbkm = peserta_mbkm.id_peserta_mbkm
            JOIN mahasiswa ON peserta_mbkm.id_mahasiswa = mahasiswa.id_mahasiswa
    ) as X ON program_mbkm.id_program_mbkm = X.id_program_mbkm
    JOIN kategori_program ON program_mbkm.id_kategori_program = kategori_program.id_kategori_program
GROUP BY X.nim;