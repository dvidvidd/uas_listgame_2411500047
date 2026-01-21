package com.a2411500047.gameapp2411500047


import android.content.Intent
import android.os.Bundle
import android.widget.*
import androidx.appcompat.app.AppCompatActivity
import com.android.volley.Request
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley

class MainActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        val etUsername = findViewById<EditText>(R.id.etUsername)
        val etPassword = findViewById<EditText>(R.id.etPassword)
        val btnLogin = findViewById<Button>(R.id.btnLogin)

        btnLogin.setOnClickListener {

            val url = "http://192.168.100.6/game_api_2411500047/login.php"

            val request = object : StringRequest(
                Request.Method.POST, url,
                { response ->
                    if (response.contains("success")) {
                        startActivity(Intent(this, GameActivity::class.java))
                    } else {
                        Toast.makeText(this, "Login gagal", Toast.LENGTH_SHORT).show()
                    }
                },
                {
                    Toast.makeText(this, "Koneksi error", Toast.LENGTH_SHORT).show()
                }
            ) {
                override fun getParams(): MutableMap<String, String> {
                    return hashMapOf(
                        "username" to etUsername.text.toString(),
                        "password" to etPassword.text.toString()
                    )
                }
            }

            Volley.newRequestQueue(this).add(request)
        }
    }
}
