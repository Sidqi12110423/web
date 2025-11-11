
CREATE DATABASE pln_monitoring;

USE pln_monitoring;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    unit VARCHAR(100) NOT NULL
);

CREATE TABLE identitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    alamat TEXT,
    no_hp VARCHAR(20),
    idpel VARCHAR(30),
    no_rangka VARCHAR(50),
    unit VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE hasil_survey (
    id INT AUTO_INCREMENT PRIMARY KEY,
    identitas_id INT,
    tanggal_survey DATE,
    foto_survey VARCHAR(255),
    jalur VARCHAR(20), -- Perluasan / Langsung
    FOREIGN KEY (identitas_id) REFERENCES identitas(id)
);

CREATE TABLE perluasan_pekerjaan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    survey_id INT,
    wo VARCHAR(50),
    pekerjaan TEXT,
    tanggal_commissioning DATE,
    FOREIGN KEY (survey_id) REFERENCES hasil_survey(id)
);

CREATE TABLE langsung_pekerjaan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    survey_id INT,
    no_register VARCHAR(50),
    tanggal_bayar DATE,
    tanggal_pasang DATE,
    tanggal_integrasi DATE,
    FOREIGN KEY (survey_id) REFERENCES hasil_survey(id)
);
