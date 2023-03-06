<html>
<head>
    <link rel="stylesheet" href="db.css">
</head>
    <center>
    <table>
        <tr>
            <th>NISN</th>
            <th>Nama</th>
            <th>Asal Sekolah</th>
            <th>Alamat</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
            <th>Telepon</th>
        </tr>

    <?php
        require_once(dirname(__FILE__) . '/wp-config.php');
        $wp->init();
        $wp->parse_request();
        $wp->query_posts();
        $wp->register_globals();
        $wp->send_headers();

        $nisn = $_GET["nisn"];
        $nama = $_GET["nama"];
        $sekolah = $_GET["sekolah"];
        $alamat = $_GET["alamat"];
        $ayah = $_GET["ayah"];
        $ibu = $_GET["ibu"];
        $telp = $_GET["telp"];

        if ($nisn != "")
        {
            $wpdb->insert(
                'data_siswa',
                array(
                    'nisn' => $nisn,
                    'nama' => $nama,
                    'asal_sekolah' => $sekolah,
                    'alamat' => $alamat,
                    'ayah' => $ayah,
                    'ibu' => $ibu,
                    'telepon' => $telp
                ),
                array(
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s'
                )
            );
        }

        foreach ($wpdb->get_results("SELECT * FROM data_siswa") as $row)
        {
            echo "<tr>";

            echo "<td>{$row->nisn}</td>";
            echo "<td>{$row->nama}</td>";
            echo "<td>{$row->asal_sekolah}</td>";
            echo "<td>{$row->alamat}</td>";
            echo "<td>{$row->ayah}</td>";
            echo "<td>{$row->ibu}</td>";
            echo "<td>{$row->telepon}</td>";

            echo "</tr>";
        }
?>

    </table>
    </center>
</html>
