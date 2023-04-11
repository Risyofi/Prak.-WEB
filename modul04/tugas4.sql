use informatika;
/*
CREATE TABLE mahasiswa(
    nim VARCHAR(10) PRIMARY KEY NOT NULL,
    nama CHARACTER(50) NULL,
    kelas CHARACTER(5) NULL,
    alamat CHARACTER(50) NULL
);

INSERT INTO mahasiswa VALUES
('L200080001','Ari Wibowo', 'A', 'Solo');

INSERT INTO mahasiswa (nim, nama, kelas) VALUES
('L200080080', 'Agustina', 'B');

UPDATE mahasiswa SET nama = 'Agustina Anggraini'
WHERE nama = 'Agustina';

SELECT * FROM mahasiswa;

CREATE TABLE nilai (
    nim VARCHAR(10) PRIMARY KEY NOT NULL,
    nama_mk CHARACTER(50) NULL,
    nilai_angka INT NULL,
    nilai_huruf CHARACTER(2)
);

INSERT INTO nilai ( nim, nama_mk, nilai_angka, nilai_huruf ) VALUES(
    'L200080002', 'Kapita Selekta', 60, 'BC'),
    ('L200080010', 'Pemrograman Web', 87, 'A'),
    ('L200080080', 'pemrograman Web', 90, 'A'
);

SELECT * FROM nilai;

SELECT mahasiswa.nim, mahasiswa.nama, nilai.nama_mk, nilai.nilai_angka, nilai.nilai_huruf
FROM (mahasiswa JOIN nilai ON mahasiswa.nim = nilai.nim)

SELECT mahasiswa.nim, mahasiswa.nama, nilai.nama_mk, nilai.nilai_angka, nilai.nilai_huruf
FROM (mahasiswa LEFT JOIN nilai ON mahasiswa.nim = nilai.nim)

SELECT mahasiswa.nim, mahasiswa.nama, nilai.nama_mk, nilai.nilai_angka, nilai.nilai_huruf
FROM (mahasiswa RIGHT JOIN nilai ON mahasiswa.nim = nilai.nim)

SELECT AVG (nilai_angka)
'Rata-rata Nilai' FROM nilai

SELECT SUM(nilai_angka) 'Total Nilai' FROM nilai;

CREATE VIEW khs AS 
SELECT mahasiswa.nim, nilai.nama_mk, nilai.nilai_angka, nilai.nilai_huruf
FROM (mahasiswa INNER JOIN nilai ON mahasiswa.nim = nilai.nim);

SELECT * FROM khs;
*/

UPDATE mahasiswa
    SET alamat = 'Sragen'
    WHERE nim = 'L200080080';
    
SELECT * FROM mahasiswa;