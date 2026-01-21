package com.a2411500047.gameapp2411500047

import android.os.Bundle
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.android.volley.toolbox.JsonArrayRequest
import com.android.volley.toolbox.Volley

class GameActivity : AppCompatActivity() {

    private lateinit var rvGame: RecyclerView
    private lateinit var adapter: GameAdapter
    private val listGame = ArrayList<GameModel>()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_game)

        rvGame = findViewById(R.id.rvGame)
        rvGame.layoutManager = LinearLayoutManager(this)

        adapter = GameAdapter(listGame)
        rvGame.adapter = adapter

        loadData()
    }

    private fun loadData() {
        val url = "http://192.168.100.6/game_api_2411500047/game.php"

        val request = JsonArrayRequest(
            url,
            { response ->
                listGame.clear()
                for (i in 0 until response.length()) {
                    val obj = response.getJSONObject(i)
                    listGame.add(
                        GameModel(
                            obj.getString("id_game"),
                            obj.getString("nama_game"),
                            obj.getString("genre"),
                            obj.getString("harga"),
                            obj.getString("gambar")
                        )
                    )
                }
                adapter.notifyDataSetChanged()
            },
            { error ->
                Toast.makeText(this, error.message, Toast.LENGTH_SHORT).show()
            }
        )

        Volley.newRequestQueue(this).add(request)
    }
}
