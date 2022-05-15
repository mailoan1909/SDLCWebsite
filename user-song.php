<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <title>My Profile</title>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">

                </div>
                <div class="col-lg-6">
                    <div class="search">
                        <input type="search" placeholder="Enter Artist | User | Song you want to search">
                        <button>Search</button>
                    </div>
                </div>
                <div class="col-lg-3">

                </div>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="containter">
            <div class="row">
                <div class="col-lg-3">
                    <div class="artist-manage">
                        <h2>ARTIST</h2>
                        <form action="">
                            <table>
                                <tr>
                                    <td>Artist</td>
                                    <td><input type="text"></td>
                                </tr>
                                <tr>
                                    <td>DoB</td>
                                    <td><input type="date"></td>
                                </tr>
                                <tr>
                                    <td>Genre</td>
                                    <td><input type="text"></td>
                                </tr>
                                <tr>
                                    <td>Images</td>
                                    <td><input type="file"></td>
                                </tr>
                                <tr>
                                    <td>Note</td>
                                    <td><input type="text"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="Insert"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Remove"></td>
                                    <td><input type="submit" value="Update"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="song-manage">
                        <h2>SONG</h2>
                        <form action="">
                            <table>
                                <tr>
                                    <td>Song</td>
                                    <td><input type="text"></td>
                                </tr>
                                <tr>
                                    <td>Artist</td>
                                    <td><input type="text"></td>
                                </tr>
                                <tr>
                                    <td>Images</td>
                                    <td><input type="file"></td>
                                </tr>
                                <tr>
                                    <td>File Audio</td>
                                    <td><input type="file"></td>
                                </tr>
                                <tr>
                                    <td>Note</td>
                                    <td><input type="text"></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td><input type="number" min="0"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="Insert"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Remove"></td>
                                    <td><input type="submit" value="Update"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container-fluid">
            <div class="row">
                <h3 style="text-align: center; color: whitesmoke;">My Playlist</h3>
                <div class="col-lg-3">
                    <div class="myAlbum">
                        <div class="card" style="width: 15rem; height: 20rem;">
                            <img class="card-img-top" src="https://th.bing.com/th/id/R.abe65077e1642dd6550184ef94c64f43?rik=F0l%2bgcyu7Na1ow&riu=http%3a%2f%2ffilmmusicreporter.com%2fwp-content%2fuploads%2f2019%2f10%2fvca-9.jpg&ehk=oFGQ9pIxSspS%2bT%2fgDWfbhGMQwkgaVs8okuq2USoOVgE%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1"
                                alt="Card image cap">
                            <div class="card-body">
                                <h4>Tên Bài Hát</h4>
                                <p class="card-text">Tên Ca Sĩ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>