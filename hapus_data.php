<?php
require_once "_config\config.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Query to delete the record
    $query = "DELETE FROM pegawai WHERE nip='$id'";
    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>
                alert('Data berhasil dihapus');
                window.location='" . base_url('pegawai') . "';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal menghapus data');
                window.location='" . base_url('pegawai') . "';
            </script>
        ";
    }
} else {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location='" . base_url('pegawai') . "';
        </script>
    ";
}
?>
