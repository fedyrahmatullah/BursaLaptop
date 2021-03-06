package com.example.imor.brs_laptop;

import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.os.Bundle;
import android.support.design.widget.TextInputLayout;
import android.support.v7.app.AppCompatActivity;
import android.text.TextUtils;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class RegisterActivity extends AppCompatActivity {

    private EditText txtIDUser, txtNamaUser, txtPassword, txtKonfirmasiPassword, txtEmail,txtAlamat,txtNo,txtNik;
    private TextInputLayout validasiIDUser, validasiNamaUser,
            validasiPassword, validasiKonfirmasiPassword,validasiEmail,validasiAlamat,validasiNo,validasiJenis,validasiNik;
    private Button Register;
//    private ProgressBar loading;
    private Spinner  jk;
    private String [] jenis = {"-- Pilih Jenis Kelamin --","laki-laki","perempuan"};

    private static String URL = "http://192.168.1.7/Api_BursaLaptop/index.php/api/Api_register";

    private String username, nama, password, konfirmasi_password, email,
            alamat, no_hp, jenis_kelamin, nik;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);

        txtNamaUser = findViewById(R.id.editTextNama);
        txtPassword = findViewById(R.id.editTextPassword);
        txtKonfirmasiPassword = findViewById(R.id.editTextKonfirmasiPassword);
        txtEmail = findViewById(R.id.editTextEmail);
        txtAlamat = findViewById(R.id.editTextAlamat);
        txtNo = findViewById(R.id.editTextNoTlp);
        jk= findViewById(R.id.spinnerJK);
        jk.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                if(position!=0){
                    jenis_kelamin = jenis[position];
                }
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });

        ArrayAdapter<String> arrayJenisKelamin = new ArrayAdapter<String>(this,
                android.R.layout.simple_spinner_item, jenis);
        arrayJenisKelamin.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        jk.setAdapter(arrayJenisKelamin);

        validasiNamaUser = findViewById(R.id.validasiNama);
        validasiPassword = findViewById(R.id.validasiPassword);
        validasiKonfirmasiPassword = findViewById(R.id.validasiKonfirmasiPassword);
        validasiEmail= findViewById(R.id.validasiEmail);
        validasiAlamat= findViewById(R.id.validasiAlamat);
        validasiNo= findViewById(R.id.validasiNoTelp);
        validasiJenis = findViewById(R.id.validasiJenisKelamin);

        Register = findViewById(R.id.btnRegister);
//        loading = findViewById(R.id.loading);

        Register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                nama = txtNamaUser.getText().toString().trim();
                password = txtPassword.getText().toString().trim();
                konfirmasi_password = txtKonfirmasiPassword.getText().toString().trim();
                email = txtEmail.getText().toString().trim();
                alamat = txtAlamat.getText().toString().trim();
                no_hp = txtNo.getText().toString().trim();

                if(nama.isEmpty()){
                    validasiNamaUser.setError("Nama User harus diisi!");
                }else if(password.isEmpty()){
                    validasiPassword.setError("Password harus diisi!");
                }else if(email.isEmpty()){
                    validasiEmail.setError("Password harus diisi!");
                }else if(alamat.isEmpty()){
                    validasiAlamat.setError("Password harus diisi!");
                }else if(no_hp.isEmpty()){
                    validasiNo.setError("Password harus diisi!");
                }else if(jenis_kelamin.isEmpty()){
                    validasiJenis.setError("Password harus diisi!");
                }else if(!konfirmasi_password.equals(password)){
                    validasiKonfirmasiPassword.setError("Konfirmasi password harus sama!");
                }else{
                    Registrasi();
                }

            }
        });
    }

    private void Registrasi() {
//        loading.setVisibility(View.VISIBLE);
        Register.setVisibility(View.GONE);
        nama= this.txtNamaUser.getText().toString().trim();
        password = this.txtPassword.getText().toString().trim();
        konfirmasi_password = this.txtKonfirmasiPassword.getText().toString().trim();
        alamat= this.txtAlamat.getText().toString().trim();
        email= this.txtEmail.getText().toString().trim();
        no_hp= this.txtNo.getText().toString().trim();

        StringRequest stringRequest = new StringRequest(StringRequest.Method.POST, URL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try{
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("sukses");
                            if(success.equals("true")){
                                Toast.makeText(RegisterActivity.this,
                                        "Register Success!", Toast.LENGTH_SHORT).show();
//                                loading.setVisibility(View.GONE);
                                Register.setVisibility(View.VISIBLE);
                                Intent intent = new Intent(RegisterActivity.this, LoginActivity.class);
                                RegisterActivity.this.startActivity(intent);

                            }
                        }catch(JSONException e){
                            e.printStackTrace();
                            Toast.makeText(RegisterActivity.this,
                                    "Register Error : " +e.toString(), Toast.LENGTH_SHORT).show();
//                            loading.setVisibility(View.GONE);
                            Register.setVisibility(View.VISIBLE);
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(RegisterActivity.this,
                        "Register Error : " +error.toString(), Toast.LENGTH_SHORT).show();
//                loading.setVisibility(View.GONE);
                Register.setVisibility(View.VISIBLE);
            }
        })
        {
            @Override
            protected Map<String, String> getParams () throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("nama_pelanggan", nama);
                params.put("alamat", alamat);
                params.put("no_hp", no_hp);
                params.put("email", email);
                params.put("jenis_kelamin", jenis_kelamin);
                params.put("password", password);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);

    }

}