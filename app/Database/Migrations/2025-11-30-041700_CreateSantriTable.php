<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSantriTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_santri' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'nama_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'nis_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'nisn_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'kip_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'pkh_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'kks_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'nik_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'tempat_lahir_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'tanggal_lahir_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => true,
            ],
            'jk_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'agama_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'hobi_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'cita_cita_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'kewarganegaraan_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'status_rumah_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'status_mukim_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'email_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'wa_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'kk_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'tanggal_masuk' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => true,
            ],
            'tahun_masuk_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
            ],
            'jml_saudara_santri' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'anakke_santri' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'kategori_santri' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'foto_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'password_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            // Data Ayah
            'nik_ayah_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'nama_ayah_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'tempat_lahir_ayah_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'tanggal_lahir_ayah_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => true,
            ],
            'pekerjaan_ayah_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'pendidikan_ayah_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'telp_ayah_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'penghasilan_ayah_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => true,
            ],
            // Data Ibu
            'nik_ibu_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'nama_ibu_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'tempat_lahir_ibu_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'tanggal_lahir_ibu_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => true,
            ],
            'pekerjaan_ibu_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'pendidikan_ibu_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'telp_ibu_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'penghasilan_ibu_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => true,
            ],
            // Data Wali
            'wali_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'wa_wali' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            // Data Alamat
            'alamat_santri' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'rt_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
            ],
            'rw_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
            ],
            'desa_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'kecamatan_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'kabupaten_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'provinsi_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'kode_pos_santri' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_santri', true);
        $this->forge->createTable('santri', true);

        // Create trigger for auto-generate NIS
        $sql = "
        CREATE TRIGGER `before_insert_santri` BEFORE INSERT ON `santri` FOR EACH ROW 
        BEGIN
            DECLARE last_nis INT;
            DECLARE new_nis VARCHAR(10);

            -- Ambil NIS terakhir dari database
            SELECT RIGHT(nis_santri, 4) INTO last_nis
            FROM santri
            WHERE YEAR(tanggal_masuk) = YEAR(NEW.tanggal_masuk)
            ORDER BY nis_santri DESC
            LIMIT 1;

            -- Jika tidak ada data, mulai dari 0001
            IF last_nis IS NULL THEN
                SET last_nis = 0;
            END IF;

            -- Tambahkan 1 ke NIS terakhir
            SET new_nis = CONCAT(YEAR(NEW.tanggal_masuk), LPAD(last_nis + 1, 4, '0'));

            -- Tetapkan NIS baru
            SET NEW.nis_santri = new_nis;
        END
        ";

        $this->db->query($sql);
    }

    public function down()
    {
        // Drop trigger first
        $this->db->query('DROP TRIGGER IF EXISTS `before_insert_santri`');
        
        // Then drop table
        $this->forge->dropTable('santri', true);
    }
}
