import React, { useState, useEffect } from "react";
import EditSongForm from "./EditSongForm";

function SongList() {
    const [songs, setSongs] = useState([]);
    const [editingSong, setEditingSong] = useState(null);

    const fetchSongs = () => {
        fetch("http://localhost/backend/api/getSongs.php")
            .then((res) => res.json())
            .then((data) => setSongs(data));
    };

    useEffect(() => {
        fetchSongs();
    }, []);

    const deleteSong = (id) => {
        fetch("http://localhost/backend/api/deleteSong.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id }),
        })
            .then((res) => res.json())
            .then((data) => {
                alert(data.message);
                fetchSongs();
            });
    };

    return (
        <div className="mt-4">
            <h2 className="text-xl font-bold">Song List</h2>
            <ul className="mt-2">
                {songs.map((song) => (
                    <li key={song.id} className="p-2 border-b flex justify-between">
                        <div>
                            {song.title} - {song.artist}
                        </div>
                        <div>
                            <button
                                onClick={() => setEditingSong(song)}
                                className="bg-yellow-500 text-white p-1 rounded mr-2"
                            >
                                Edit
                            </button>
                            <button
                                onClick={() => deleteSong(song.id)}
                                className="bg-red-600 text-white p-1 rounded"
                            >
                                Delete
                            </button>
                        </div>
                    </li>
                ))}
            </ul>
            {editingSong && (
                <EditSongForm
                    song={editingSong}
                    onClose={() => setEditingSong(null)}
                    onUpdated={fetchSongs}
                />
            )}
        </div>
    );
}

export default SongList;
