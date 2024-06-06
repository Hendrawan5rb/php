<?php
require "../../connect.php";

// var_dump($_GET['keyword']);
// die;

if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    // echo "Search";
    // die;

    $limit = 10;
    $page = (!isset($_GET['page'])) ? 1 : $_GET['page'];
    $offset = $limit * $page - $limit;

    $total_data = count(read("SELECT judul FROM komik WHERE judul LIKE '%$keyword%' OR ide LIKE '%$keyword%' OR premis LIKE '%$keyword%' ORDER BY id DESC"));

    $total_halaman = ceil($total_data / $limit);

    $komik = search($keyword, $limit, $offset);
} else {

    // echo "Not Search";
    // die;

    $limit = 10;
    $page = (!isset($_GET['page'])) ? 1 : $_GET['page'];
    $offset = $limit * $page - $limit;

    $total_data = count(read("SELECT judul FROM komik"));

    $total_halaman = ceil($total_data / $limit);

    $komik = read("SELECT * FROM komik ORDER BY id DESC LIMIT $offset, $limit");
}

if ($komik == false) {
?>

    <p>Tidak ada data dalam database</p>

    <?php
} else {
    foreach ($komik as $k) :
    ?>

        <div style="width: 100px; height: 275px; border: 1px solid black; float: left; margin: 10px;">
            <a href="">
                <img src="<?= $k['gambar']; ?>" width="100" alt="Cover">
                <p style="text-align: center;"><?= $k['judul']; ?></p>
            </a>
            <center>
                <a href="update.php?id=<?= $k['id']; ?>">
                    <button>Ubah</button>
                </a>
                <br><br>
                <a href="delete.php?id=<?= $k['id']; ?>&gambar=<?= $k['gambar']; ?>" onclick="return confirm('Hapus?')">
                    <button>Hapus</button>
                </a>
            </center>
        </div>

<?php
    endforeach;
}
?>

<input type="hidden" id="total" value="<?= $total_halaman; ?>">

<div style="position: fixed; bottom: 0; text-align: center; width: 100%; left: 0;">

    <a href="#" id="previous"><button>&laquo;</button></a>

    <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
        <?php if ($i == $page) : ?>
            <a href="#" style="color: red;" class="page" page="<?= $i; ?>"><button><?= $i; ?></button></a>
        <?php else : ?>
            <a href="#" class="page" page="<?= $i; ?>"><button><?= $i; ?></button></a>
        <?php endif; ?>
    <?php endfor; ?>

    <a href="#" id="next"><button>&raquo;</button></a>

</div>