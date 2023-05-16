/* 
CREATE TABLE mahasiswa (
    nim VARCHAR(10) PRIMARY KEY NULL,
    nama char(50) NULL,
    kelas char(5) NULL,
    alamat char(50) NULL
);
*/

/*
INSERT INTO mahasiswa (nim, nama, kelas, alamat ) VALUES
     ('L200080001', 'Ari Wibowo', 'A', 'Solo'),
     ('L200080080', 'Agustina', 'G', 'solo');
*/

/* 
UPDATE mahasiswa set nama = 'Agustina Anggraini' where nama = 'Agustina';
SELECT * FROM mahasiswa
*/

/*
CREATE TABLE nilai (
    nim VARCHAR(10) PRIMARY KEY NULL,
    nama_mk VARCHAR(25) NULL,
    nilai_angka INT NULL,
    nilai_huruf VARCHAR(2) NULL
);
*/

/*
INSERT INTO nilai (nim, nama_mk, nilai_angka, nilai_huruf) VALUES
     ('L200080002', 'Kapita Selekta', 60, 'BC'),
     ('L200080010', 'Pemrograman Web', 87, 'A'),
     ('L200080080', 'Pemrograman Web', 90, 'A');

SELECT * FROM nilai
*/

-- SELECT mahasiswa.nim, mahasiswa.nama, nilai.nama_mk, nilai.nilai_angka, nilai.nilai_huruf FROM (mahasiswa JOIN nilai on mahasiswa.nim=nilai.nim)
-- SELECT mahasiswa.nim, mahasiswa.nama, nilai.nama_mk, nilai.nilai_angka, nilai.nilai_huruf FROM (mahasiswa LEFT JOIN nilai on mahasiswa.nim=nilai.nim)

-- SELECT mahasiswa.nim, mahasiswa.nama, nilai.nama_mk, nilai.nilai_angka, nilai.nilai_huruf FROM (mahasiswa RIGHT JOIN nilai on mahasiswa.nim=nilai.nim)

-- SELECT AVG(nilai_angka) 'Rata-rata nilai' from nilai

-- SELECT SUM(nilai_angka) 'Total nilai' from nilai

/*
CREATE VIEW khs AS SELECT mahasiswa.nim, nilai.nama_mk, nilai.nilai_angka, nilai.nilai_huruf from (mahasiswa INNER JOIN nilai on mahasiswa.nim=nilai.nim)
SELECT * FROM khs
*/

/*
UPDATE mahasiswa
    SET alamat = 'Sragen'
    WHERE nama = 'Agustina Anggraini'
*/
SELECT * FROM  mahasiswa
