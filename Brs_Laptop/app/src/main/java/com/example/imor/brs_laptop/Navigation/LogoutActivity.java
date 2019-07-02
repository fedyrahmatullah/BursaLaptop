package com.example.imor.brs_laptop.Navigation;

import android.content.pm.ActivityInfo;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;

import com.example.imor.brs_laptop.R;
import com.example.imor.brs_laptop.SessionManager;

import java.util.HashMap;

public class LogoutActivity extends AppCompatActivity {

    SessionManager sessionManager;
    TextView keluar;
    TextView txtUser1, txtUser2, txtUser3;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_logout);
        setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);

        Toolbar toolbar = (Toolbar)findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        sessionManager = new SessionManager(this);
        sessionManager.checkLogin();

        keluar = findViewById(R.id.logout);

        txtUser1 = findViewById(R.id.txtUser1);
        txtUser2 = findViewById(R.id.txtUser2);
        txtUser3 = findViewById(R.id.txtUser3);

        // memanggil method getUserDetail untuk mengecek data user yg login
        HashMap<String, String> user = sessionManager.getUserDetail();

        // inisialisasi variabel dengan atribut data user yg login
        String vid_user = user.get(sessionManager.ID_USER);
        String vnama_user = user.get(sessionManager.NAMA_USER);
        String vkeyid = user.get(sessionManager.KEY_ID);

        txtUser1.setText("Email : " + vid_user );
        txtUser2.setText("Username : " + vnama_user);
        txtUser3.setText("ID USER : " +vkeyid);

        keluar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                sessionManager.logout();
            }
        });




    }

}
