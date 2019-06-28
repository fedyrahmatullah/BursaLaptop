package com.example.imor.brs_laptop;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;

import com.example.imor.brs_laptop.Navigation.LogoutActivity;

import java.util.HashMap;

public class SessionManager {

    SharedPreferences sharedPreferences;
    public SharedPreferences.Editor editor;
    public Context context;
    int PRIVATE_MODE = 0;

    public static final String PREF_NAME = "LOGIN";
    public static final String LOGIN = "IS_LOGIN";
    public static final String ID_USER = "email";
    public static final String NAMA_USER = "nama_pelanggan";
    public static final String KEY_ALAMAT = "alamat";
    public static final String KEY_KELAMIN = "jenis_kelamin";
    public static final String KEY_HP = "no_hp";
    public static final String KEY_ID = "id_pelanggan";

    public SessionManager(Context context) {
        this.context = context;
        sharedPreferences = context.getSharedPreferences(PREF_NAME, PRIVATE_MODE);
        editor = sharedPreferences.edit();
    }

    public void createSession(String username, String nama, String id_pelanggan,
                              String alamat, String kelamin, String hp){
        editor.putBoolean(LOGIN, true);
        editor.putString(ID_USER, username);
        editor.putString(NAMA_USER, nama);
        editor.putString(KEY_ALAMAT, alamat);
        editor.putString(KEY_ID, id_pelanggan);
        editor.putString(KEY_KELAMIN, kelamin);
        editor.putString(KEY_HP, hp);
        editor.apply();
    }

    public boolean isLoggin(){
        return sharedPreferences.getBoolean(LOGIN, false);
    }

    public void checkLogin(){
        if(!this.isLoggin()){
            Intent i = new Intent(context, LoginActivity.class);
            context.startActivity(i);
            ((MainActivity)context).finish();
        }
    }
//
    public HashMap<String, String> getUserDetail(){
        HashMap<String, String> user = new HashMap<>();
        user.put(ID_USER, sharedPreferences.getString(ID_USER, null));
        user.put(NAMA_USER, sharedPreferences.getString(NAMA_USER, null));
        user.put(KEY_ALAMAT, sharedPreferences.getString(KEY_ALAMAT, null));
        user.put(KEY_KELAMIN, sharedPreferences.getString(KEY_KELAMIN, null));
        user.put(KEY_HP, sharedPreferences.getString(KEY_HP, null));
        user.put(KEY_ID, sharedPreferences.getString(KEY_ID, null));

        return user;
    }

    public void logout(){
        editor.clear();
        editor.commit();
        Intent i = new Intent(context, LoginActivity.class);
        context.startActivity(i);
        ((LogoutActivity)context).finish();
    }

//    public void logoutHome(){
//        editor.clear();
//        editor.commit();
//        Intent i = new Intent(context, home.class);
//        context.startActivity(i);
//        ((LoginActivity)context).finish();
//    }
//public void checkLoginHome(){
//        if(!this.isLoggin()){
//            Intent i = new Intent(context, LoginActivity.class);
//            context.startActivity(i);
//            ((home)context).finish();
//        }
//    }


}

