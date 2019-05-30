package com.example.imor.brs_laptop;
public class User {
    private int id_pelanggan;
    private String nama_pelanggan, email, alamat, no_hp;

    public User(int id_pelanggan, String nama_pelanggan, String alamat, String no_hp, String email) {
        this.id_pelanggan = id_pelanggan;
        this.nama_pelanggan = nama_pelanggan;
        this.alamat = alamat;
        this.no_hp = no_hp;
        this.email = email;
    }

    public int getId() {
        return id_pelanggan;
    }

    public void setId(int id_pelanggan) {
        this.id_pelanggan = id_pelanggan;
    }

    public String getNama() {
        return nama_pelanggan;
    }

    public void setNama(String name) {
        this.nama_pelanggan = name;
    }

    public String getNo_hp() {
        return no_hp;
    }

    public void setNo_hp(String no_hp) {
        this.no_hp = no_hp;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }


    public String getAlamat() {
        return alamat;
    }

    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }
}