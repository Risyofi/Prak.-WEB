use web;
CREATE TABLE siswa (
    NIM INT PRIMARY KEY,
    Nama VARCHAR(50),
    Gender ENUM('Laki-Laki', 'Perempuan'),
    TempatLahir VARCHAR(50),
    TanggalLahir DATE,
    Usia INT,
    Alamat VARCHAR(100)
);
