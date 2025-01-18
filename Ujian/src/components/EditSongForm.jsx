import React, { useState } from "react";

function EditSongForm({ song, onClose, onUpdated }) {
    const [title, setTitle] = useState(song.title);
    const [artist, setArtist] = useState(song.artist);

    const handleSubmit = (e) => {
        e.preventDefault();

        fetch("http://localhost/backend/api/updateSong.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id: song.id, title, artist }),
        })
            .then((res) => res.json())
            .then((data) => {
                alert(data.message);
                onUpdated();
                onClose();
            });
    };

    return (
        <div className="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
            <form
                onSubmit={handleSubmit}
                className="bg-white p-4 rounded shadow w-96"
            >
                <h2 className="text-xl font-bold mb-4">Edit Song</h2>
                <div className="mb-2">
                    <label className="block">Title:</label>
                    <input
                        type="text"
                        value={title}
                        onChange={(e) => setTitle(e.target.value)}
                        className="border p-2 w-full"
                        required
                    />
                </div>
                <div className="mb-2">
                    <label className="block">Artist:</label>
                    <input
                        type="text"
                        value={artist}
                        onChange={(e) => setArtist(e.target.value)}
                        className="border p-2 w-full"
                        required
                    />
                </div>
                <div className="flex justify-end">
                    <button
                        type="button"
                        onClick={onClose}
                        className="bg-gray-600 text-white p-2 rounded mr-2"
                    >
                        Cancel
                    </button>
                    <button type="submit" className="bg-blue-600 text-white p-2 rounded">
                        Save
                    </button>
                </div>
            </form>
        </div>
    );
}

export default EditSongForm;