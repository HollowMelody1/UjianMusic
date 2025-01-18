import React from "react";
import Header from "./components/Header";
import SongList from "./components/SongList";
import UploadSongForm from "./components/UploadSongForm";

function App() {
    return (
        <div className="min-h-screen flex flex-col">
            <Header />
            <main className="flex-1 container mx-auto p-4">
                <UploadSongForm />
                <SongList />
            </main>
        </div>
    );
}

export default App;