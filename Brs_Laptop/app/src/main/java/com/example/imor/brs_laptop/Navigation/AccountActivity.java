package com.example.imor.brs_laptop.Navigation;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.text.Html;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.imor.brs_laptop.R;
import com.example.imor.brs_laptop.SessionManager;

import java.util.HashMap;

public class AccountActivity extends AppCompatActivity {

    private TextView nama;
    private TextView username;
    private TextView alamat;
    private TextView kelamin;
    private TextView hp;
    private TextView id_pelanggan;
//    private ImageView foto;
    SessionManager sessionManager;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_account);

        Toolbar toolbar = (Toolbar)findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        Button btn1 = (Button)findViewById(R.id.buttonubah);

        btn1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(AccountActivity.this, AccountActivity2.class));
            }
        });

        sessionManager = new SessionManager(getApplicationContext());

        nama= (TextView) findViewById(R.id.nama);
        username = (TextView)findViewById(R.id.email);
        alamat = (TextView)findViewById(R.id.alamat);
        kelamin = (TextView)findViewById(R.id.kelamin);
        hp = (TextView)findViewById(R.id.nohp);
        id_pelanggan = (TextView)findViewById(R.id.idpelanggan);
//        foto = (ImageView)findViewById(R.id.imageView);

        HashMap<String, String> user = sessionManager.getUserDetail();
        String Nama = user.get(SessionManager.NAMA_USER);
        String Username = user.get(SessionManager.ID_USER);
        String Alamat = user.get(SessionManager.KEY_ALAMAT);
        String Kelamin = user.get(SessionManager.KEY_KELAMIN);
        String HP = user.get(SessionManager.KEY_HP);
        String ID = user.get(SessionManager.KEY_ID);
//        String Foto = user.get(SessionManager.KEY_FOTO);

        nama.setText(Html.fromHtml(Nama));
        username.setText(Html.fromHtml(Username));
        alamat.setText(Html.fromHtml(Alamat));
        kelamin.setText(Html.fromHtml(Kelamin));
        hp.setText(Html.fromHtml(HP));
        id_pelanggan.setText((Html.fromHtml(ID)));
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.home, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_pesan) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @Override
    public void onBackPressed() {
        finish();
    }
}
