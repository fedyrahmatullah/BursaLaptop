package com.example.imor.brs_laptop;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ImageView;

public class PesananJasaService extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pesanan_jasa_service);

        ImageView showRide = (ImageView) findViewById(R.id.pesan1);

        showRide.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(PesananJasaService.this, PesananService.class);
                startActivity(intent);
            }
        });
    }
}