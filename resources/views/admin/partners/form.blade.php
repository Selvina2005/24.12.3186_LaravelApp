<h2>Tambah Partner</h2>

<form action="/admin/partners" method="POST">

    @csrf

    <div>
        <label>Nama Partner</label>
        <input type="text" name="name">
    </div>

    <br>

    <div>
        <label>Logo URL</label>
        <input type="text" name="logo_url">
    </div>

    <br>

    <button type="submit">
        Simpan
    </button>

</form>

<hr>