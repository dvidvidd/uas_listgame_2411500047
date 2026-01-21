package com.a2411500047.gameapp2411500047

import android.content.Intent
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide

class GameAdapter(
    private val list: ArrayList<GameModel>
) : RecyclerView.Adapter<GameAdapter.ViewHolder>() {

    class ViewHolder(v: View) : RecyclerView.ViewHolder(v) {
        val txtNama: TextView = v.findViewById(R.id.txtNama)
        val txtGenre: TextView = v.findViewById(R.id.txtGenre)
        val txtHarga: TextView = v.findViewById(R.id.txtHarga)
        val imgGame: ImageView = v.findViewById(R.id.imgGame)
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ViewHolder {
        val view = LayoutInflater.from(parent.context)
            .inflate(R.layout.item_game, parent, false)
        return ViewHolder(view)
    }

    override fun onBindViewHolder(holder: ViewHolder, position: Int) {
        val game = list[position]

        holder.txtNama.text = game.nama_game
        holder.txtGenre.text = game.genre
        holder.txtHarga.text = "Rp ${game.harga}"

        // URL GAMBAR (sesuaikan IP / folder)
        val imgUrl =
            "http://192.168.100.6/game_api_2411500047/uploads/game/${game.gambar}"

        Glide.with(holder.itemView.context)
            .load(imgUrl)
            .placeholder(R.drawable.ic_launcher_background)
            .error(R.drawable.ic_launcher_background)
            .into(holder.imgGame)

        // PINDAH KE DETAIL GAME
        holder.itemView.setOnClickListener {
            val intent = Intent(holder.itemView.context, DetailGameActivity::class.java)
            intent.putExtra("nama", game.nama_game)
            intent.putExtra("genre", game.genre)
            intent.putExtra("harga", game.harga)
            intent.putExtra("gambar", game.gambar)
            holder.itemView.context.startActivity(intent)
        }
    }

    override fun getItemCount(): Int = list.size
}
