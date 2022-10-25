<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Booking extends CI_Model
{
    function insertDataBooking($data)
    {
        $this->db->insert('b_service', $data);
    }

    function approveBooking($data)
    {
        $getLastNumberAntri = $this->db->query('SELECT * FROM b_service ORDER BY kode_antri desc LIMIT 1')->row_array();
        $lastNumberAntri = $getLastNumberAntri['kode_antri'];
        $autoKodeAntri = buatKode($lastNumberAntri, 'QA', 10);
        $data_antri['kode_antri'] = $autoKodeAntri;
        $setArr = array(
            'status' => 'Antri',
            'kode_antri' => $data_antri['kode_antri']
        );
        $update = $this->db->set($setArr);
        $update = $this->db->where('no_regis_kendaraan', $data['nomor_plat']);
        $update = $this->db->update('b_service');

        $getLastNumber = $this->db->query('SELECT * FROM pemegang_kendaraan ORDER BY kode_pemegang desc LIMIT 1')->row_array();
        $lastNumber = $getLastNumber['kode_pemegang'];
        $autoKode = buatKode($lastNumber, 'PM', 5);
        $data['kode_pemegang'] = $autoKode;

        if ($update) {
            $pemegang_kendaraan = $this->db->get_where('b_service', array('no_regis_kendaraan' => $data['nomor_plat']));
            $berhasil = 0;
            $error = 0;
            foreach ($pemegang_kendaraan->result() as $d) {
                $data_pemegang = array(
                    'kode_pemegang' => $data['kode_pemegang'],
                    'nama_pemegang' => $d->nama_pemegang,
                    'nip' => $d->nip,
                    'alamat_pemegang' => $d->alamat_pemegang,
                    'email' => $d->email,
                    'no_telp' => $d->no_telp,
                    'no_regis_kendaraan' => $d->no_regis_kendaraan,
                    'nama_tipe_kendaraan' => $d->nama_tipe_kendaraan,
                    'jenis_kendaraan' => $d->jenis_kendaraan,
                    'foto_pemegang' => 'pemegang_default.jpg',
                    'foto_kendaraan' => 'kendaraan_default.jpg',
                );

                $checkPemegang = $this->db->get_where('pemegang_kendaraan', array('nip' => $data_pemegang['nip'], 'no_regis_kendaraan' => $data_pemegang['no_regis_kendaraan']));
                if ($checkPemegang->num_rows() >= 1) {

                    $this->_sendEmail();
                    $this->email->to($d->email);
                    $this->email->subject('Booking Service');
                    $this->email->message('Selamat! Booking Service anda Sudah Disetujui dan Masuk Antrian dengan kode ' . $d->kode_antri);
                    if ($this->email->send()) {
                        return true;
                    } else {
                        echo $this->email->print_debugger();
                        die;
                    }
                } else {
                    $simpan_pemegang = $this->db->insert('pemegang_kendaraan', $data_pemegang);

                    if ($simpan_pemegang) {
                        $berhasil++;
                        $kendaraan = $this->db->get_where('b_service', array('no_regis_kendaraan' => $data['nomor_plat']));

                        foreach ($kendaraan->result() as $k) {
                            $data_kendaraan = array(
                                'no_regis' => $k->no_regis_kendaraan,
                                'nama_pemilik' => $k->nama_pemilik,
                                'alamat' => $k->alamat_stnk,
                                'merk' => $k->merk,
                                'tipe' => $k->tipe,
                                'jenis' => $k->jenis,
                                'thn_pembuatan' => $k->thn_pembuatan,
                                'silinder' => $k->silinder,
                                'no_rangka' => $k->no_rangka,
                                'no_mesin' => $k->no_mesin,
                                'warna' => $k->warna,
                                'bahan_bakar' => $k->bahan_bakar,
                                'warna_tnkb' => $k->warna_tnkb,
                                'thn_registrasi' => $k->thn_registrasi,
                                'no_bpkb' => $k->no_bpkb,
                                'kd_lokasi' => $k->kd_lokasi,
                                'berlaku_sampai' => $k->berlaku_sampai,
                                'kilometer' => $k->kilometer
                            );
                        }
                        $this->db->insert('kendaraan', $data_kendaraan);

                        $this->_sendEmail();
                        $this->email->to($d->email);
                        $this->email->subject('Booking Service');
                        $this->email->message('Selamat! Booking Service anda Sudah Disetujui dan Masuk Antrian dengan kode ' . $d->kode_antri);
                        if ($this->email->send()) {
                            return true;
                        } else {
                            echo $this->email->print_debugger();
                            die;
                        }
                    } else {
                        $error++;
                    }
                }
            }
            // if ($error > 0) {
            //     $hapusDetailPenjualan = $this->db->delete('t_service_detail', array('no_faktur' => $data['no_faktur']));
            //     $hapusDataPenjualan = $this->db->delete('t_service', array('no_faktur' => $data['no_faktur']));
            //     $this->session->set_flashdata("msg", "<div class='alert alert-danger'>Data gagal disimpan!</div>");
            //     redirect('penjualan/transaksi/service');
            // } else {
            //     $hapusTemp = $this->db->delete('t_service_detail_temp', ['id_user' => $data['id_user']]);
            //     redirect('penjualan/transaksi/service');
            // }
        }
    }
    private function _sendEmail()
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'cs.nasyih@gmail.com',
            'smtp_pass' => 'jeymbrinphvunhcb',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
        ];

        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from('cs.nasyih@gmail.com', 'Bengkel Dinas Pendidikan');
    }
}
