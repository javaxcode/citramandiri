<?php
$kodekaryawan = query("SELECT * FROM karyawan ORDER BY nama ASC ");
$kodejabatan = query("SELECT * FROM jabatan WHERE kodejabatan != 'JAB000' ORDER BY kodejabatan ASC ");