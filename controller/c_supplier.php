<?php
$bank = query("SELECT * FROM namabank ORDER BY namabank asc ");
$suppliers = query("SELECT * FROM supplier as s JOIN namabank as nb ON s.kodebank = nb.kodebank ORDER BY s.id DESC");