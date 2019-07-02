package com.example.imor.brs_laptop;

import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.os.Bundle;
import android.support.design.widget.TextInputLayout;
import android.support.v7.app.AppCompatActivity;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class LoginActivity extends AppCompatActivity {

    // deklarasi objek
    TextInputLayout validasiNama, validasiPassword;
    EditText etEmail, etPassword;
    Button btnLogin;
    TextView tRegister;

    // deklarasi variabel
    String email, password;

    // deklarasi variabel alamat host
    public static String URL = "http://192.168.1.7/Api_BursaLaptop/index.php/api/api_login";

    SessionManager sessionManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);

        sessionManager = new SessionManager(this);

        // inisialisasi variabel objek
        etEmail = findViewById(R.id.etEmail);
        etPassword = findViewById(R.id.etPassword);
        btnLogin = findViewById(R.id.btnLogin);
        tRegister = findViewById(R.id.tvRegister);
        validasiNama = findViewById(R.id.validasiNama);
        validasiPassword = findViewById(R.id.validasiPassword);

        // jika tombol login diklik
        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                email = etEmail.getText().toString().trim();
                password = etPassword.getText().toString().trim();

                if(email.isEmpty()){
                    validasiNama.setError("Username harus diisi!");
                }else if(password.isEmpty()){
                    validasiPassword.setError("Password harus diisi!");
                }else{
                    auth_user(email, password);
                }
            }
        });

        // jika tombol register diklik
        tRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // sintak untuk pindah activity
                Intent intent = new Intent(LoginActivity.this, RegisterActivity.class);
                startActivity(intent);
            }
        });

    }

    // method login
    private void auth_user(final String username, final String password){
        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject jsonObject = new JSONObject(response);
                    String success = jsonObject.getString("success");
                    JSONArray jsonArray = jsonObject.getJSONArray("login");
                    if (success.equals("1")) {
                        for (int i = 0; i < jsonArray.length(); i++) {
                            JSONObject jsonObject1 = jsonArray.getJSONObject(i);
                            String nama = jsonObject1.getString("nama_pelanggan");
                            String id_pelanggan = jsonObject1.getString("id_pelanggan");
                            String alamat = jsonObject1.getString("alamat");
                            String kelamin = jsonObject1.getString("jenis_kelamin");
                            String hp = jsonObject1.getString("no_hp");
//                            String foto = jsonObject1.getString("foto");
                            sessionManager.createSession(username, nama, id_pelanggan,alamat,kelamin,hp );
                            Intent intent = new Intent(LoginActivity.this, MainActivity.class);
                            startActivity(intent);
                        }
                    } else {
                        Toast.makeText(LoginActivity.this,
                                "Username dan Password tidak ditemukan! ",
                                Toast.LENGTH_SHORT).show();
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                    Toast.makeText(LoginActivity.this,
                            "Error login " ,
                            Toast.LENGTH_SHORT).show();
                }
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(LoginActivity.this,
                                "Error Login : " + error.toString(),
                                Toast.LENGTH_SHORT) .show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError { Map<String, String> params = new HashMap<>();
                params.put("email", username);
                // sesuaikan dengan $_POST pada PHP
                params.put("password", password);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }
}
