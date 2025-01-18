import React, { useState } from "react";

function UploadSongForm() {
    const [title, setTitle] = useState("");
    const [artist, setArtist] = useState("");
    const [album, setAlbum] = useState("");
    const [genre, setGenre] = useState("");
    const [year, setYear] = useState("");
    const [songFile, setSongFile] = useState(null);

    const handleSubmit = (e) => {
        e.preventDefault();

        if (!songFile) {
            alert("Please select a song file!");
            return;
        }

        const formData = new FormData();
        formData.append("title", title);
        formData.append("artist", artist);
        formData.append("album", album);
        formData.append("genre", genre);
        formData.append("year", year);
        formData.append("song", songFile);

        fetch("http://localhost/backend/api/uploadSong.php", {
            method: "POST",
            body: formData,
        })
            .then((res) => res.json())
            .then((data) => {
                alert(data.message);
                setTitle("");
                setArtist("");
                setAlbum("");
                setGenre("");
                setYear("");
                setSongFile(null);
            })
            .catch((err) => {
                console.error(err);
                alert("Failed to upload song");
            });
    };

    return (
        <form onSubmit={handleSubmit} className="mt-4 bg-gray-100 p-4 rounded shadow">
            <h2 className="text-xl font-bold mb-4">Upload Song</h2>
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
            <div className="mb-2">
                <label className="block">Album:</label>
                <input
                    type="text"
                    value={album}
                    onChange={(e) => setAlbum(e.target.value)}
                    className="border p-2 w-full"
                />
            </div>
            <div className="mb-2">
                <label className="block">Genre:</label>
                <input
                    type="text"
                    value={genre}
                    onChange={(e) => setGenre(e.target.value)}
                    className="border p-2 w-full"
                />
            </div>
            <div className="mb-2">
                <label className="block">Year:</label>
                <input
                    type="number"
                    value={year}
                    onChange={(e) => setYear(e.target.value)}
                    className="border p-2 w-full"
                />
            </div>
            <div className="mb-4">
                <label className="block">Song File:</label>
                <input
                    type="file"
                    onChange={(e) => setSongFile(e.target.files[0])}
                    className="border p-2 w-full"
                    accept="audio/*"
                    required
                />
            </div>
            <button type="submit" className="bg-blue-600 text-white p-2 rounded">
                Upload Song
            </button>
        </form>
    );
}

export default UploadSongForm;