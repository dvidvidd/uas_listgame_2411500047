package com.a2411500047.gameapp2411500047

import android.os.Bundle
import android.widget.ImageView
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import com.bumptech.glide.Glide

class DetailGameActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_detail_game)

        val btnBack = findViewById<ImageView>(R.id.btnBack)
        val imgGame = findViewById<ImageView>(R.id.imgDetailGame)
        val txtNama = findViewById<TextView>(R.id.txtDetailNama)
        val txtGenre = findViewById<TextView>(R.id.txtDetailGenre)
        val txtHarga = findViewById<TextView>(R.id.txtDetailHarga)

        // AMBIL DATA DARI INTENT
        val nama = intent.getStringExtra("nama")
        val genre = intent.getStringExtra("genre")
        val harga = intent.getStringExtra("harga")
        val gambar = intent.getStringExtra("gambar")

        txtNama.text = nama
        txtGenre.text = genre
        txtHarga.text = "Rp $harga"

        val imgUrl =
            "http://192.168.100.6/game_api_2411500047/uploads/game/$gambar"

        Glide.with(this)
            .load(imgUrl)
            .into(imgGame)

        btnBack.setOnClickListener {
            finish()
        }
    }
}