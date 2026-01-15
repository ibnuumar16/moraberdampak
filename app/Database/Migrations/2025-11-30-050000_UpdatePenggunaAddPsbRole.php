<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdatePenggunaAddPsbRole extends Migration
{
    public function up()
    {
        // Modify pengguna_level ENUM to add 'psb' role
        $sql = "ALTER TABLE `pengguna` MODIFY `pengguna_level` ENUM('admin','psb','penulis','pengurus') NOT NULL";
        $this->db->query($sql);
    }

    public function down()
    {
        // Revert to original ENUM values
        $sql = "ALTER TABLE `pengguna` MODIFY `pengguna_level` ENUM('admin','penulis','pengurus') NOT NULL";
        $this->db->query($sql);
    }
}
