<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Transaksi extends CI_Model
{
    function cekBarang()
    {
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        return $this->db->get_where('penjualan_detail_temp', array('id_user' => $user['id']));
    }

    function cekPembelian()
    {
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        return $this->db->get_where('p_stok_temp', array('id_user' => $user['id']));
    }

    // 
    function getLastFakturPenj($hari, $bulan, $tahun)
    {
        $this->db->select('no_faktur');
        $this->db->from('penjualan');
        $this->db->where('DAY(tgl_transaksi)', $hari);
        $this->db->where('MONTH(tgl_transaksi)', $bulan);
        $this->db->where('YEAR(tgl_transaksi)', $tahun);
        $this->db->order_by('no_faktur', 'desc');
        $this->db->join('user', 'penjualan.id_user = user.id');
        $this->db->limit(1);
        return $this->db->get();
    }
    function getLastFakturService($hari, $bulan, $tahun)
    {
        $this->db->select('no_faktur');
        $this->db->from('t_service');
        $this->db->where('DAY(tgl_transaksi)', $hari);
        $this->db->where('MONTH(tgl_transaksi)', $bulan);
        $this->db->where('YEAR(tgl_transaksi)', $tahun);
        $this->db->order_by('no_faktur', 'desc');
        $this->db->join('user', 't_service.id_user = user.id');
        $this->db->limit(1);
        return $this->db->get();
    }
    function getLastKdServiceTemp()
    {
        $this->db->select('kode_service');
        $this->db->from('t_service_detail_temp');
        $this->db->order_by('kode_service', 'desc');
        $this->db->join('user', 't_service_detail_temp.id_user = user.id');
        $this->db->limit(1);
        return $this->db->get();
    }
    function getLastFakturPembelian($hari, $bulan, $tahun)
    {
        $this->db->select('no_faktur');
        $this->db->from('p_stok');
        $this->db->where('DAY(tgl_transaksi)', $hari);
        $this->db->where('MONTH(tgl_transaksi)', $bulan);
        $this->db->where('YEAR(tgl_transaksi)', $tahun);
        $this->db->order_by('no_faktur', 'desc');
        $this->db->join('user', 'p_stok.id_user = user.id');
        $this->db->limit(1);
        return $this->db->get();
    }

    // Data sementara
    // barang
    function cekBarangTemp($kode_barang, $id_User)
    {
        return $this->db->get_where('penjualan_detail_temp', array(
            'kode_barang' => $kode_barang,
            'id_user' => $id_User
        ));
    }
    function insertBarangTemp($data)
    {
        $this->db->insert('penjualan_detail_temp', $data);
    }
    function getDataBarangTemp($id_user)
    {
        $this->db->select('penjualan_detail_temp.kode_barang,tipe,nama_barang,jenis_kendaraan,harga_jual,qty,(qty * harga_jual) as total_hargaBarang,id_user');
        $this->db->from('penjualan_detail_temp');
        $this->db->join('barang', 'penjualan_detail_temp.kode_barang = barang.kode_barang');
        $this->db->where('id_user', $id_user);
        return $this->db->get();
    }
    function deleteBarangTemp($kode_barang, $id_user)
    {
        $hapus = $this->db->delete('penjualan_detail_temp', [
            'kode_barang' => $kode_barang,
            'id_user' => $id_user
        ]);
        if ($hapus) {
            return 1;
        } else {
            return 0;
        }
    }
    //. 

    //Service
    function cekServiceTemp($kode_service, $id_user)
    {
        return $this->db->get_where('t_service_detail_temp', array(
            'kode_service' => $kode_service,
            'id_user' => $id_user
        ));
    }
    function insertServiceTemp($data)
    {
        $this->db->insert('t_service_detail_temp', $data);
    }
    function getDataServiceTemp($id_user)
    {
        $this->db->select('t_service_detail_temp.kode_service,nama_service,jenis_kendaraan,tipe_kendaraan,harga,qty,id_user');
        $this->db->from('t_service_detail_temp');
        $this->db->join('service', 't_service_detail_temp.kode_service = service.kode_service');
        $this->db->where('id_user', $id_user);
        return $this->db->get();
    }
    function deleteServiceTemp($kode_service, $id_user)
    {
        $hapus = $this->db->delete('t_service_detail_temp', [
            'kode_service' => $kode_service,
            'id_user' => $id_user
        ]);
        if ($hapus) {
            return 1;
        } else {
            return 0;
        }
    }
    function getDataKendaraan($kode_pemegang)
    {
        $this->db->select('kendaraan.no_regis,nama_pemilik,nama_pemegang,alamat,kilometer,jenis_kendaraan,nama_tipe_kendaraan,kendaraan.kode_pemegang');
        $this->db->from('kendaraan');
        $this->db->join('pemegang_kendaraan', 'kendaraan.no_regis = pemegang_kendaraan.no_regis_kendaraan');
        $this->db->where('kendaraan.kode_pemegang', $kode_pemegang);
        return $this->db->get();
    }
    function getDataKendaraanBooking($kode_antri)
    {
        $this->db->select('b_service.no_regis_kendaraan,b_service.nama_pemilik,b_service.nama_tipe_kendaraan,b_service.nama_pemegang,alamat_stnk,b_service.kilometer,b_service.jenis_kendaraan,b_service.nama_tipe_kendaraan,kode_pemegang,ket_booking,kode_antri');
        $this->db->from('b_service');
        $this->db->join('kendaraan', 'b_service.no_regis_kendaraan = kendaraan.no_regis');
        $this->db->join('pemegang_kendaraan', 'b_service.no_regis_kendaraan = pemegang_kendaraan.no_regis_kendaraan');
        $this->db->where('kode_antri', $kode_antri);
        return $this->db->get();
    }
    //.

    // Pembelian Stok
    function cekPembelianTemp($kode_barang, $id_User)
    {
        return $this->db->get_where('p_stok_temp', array(
            'kode_barang_temp' => $kode_barang,
            'id_user' => $id_User
        ));
    }

    function insertPembelianTemp($data)
    {
        $this->db->insert('p_stok_temp', $data);
    }

    function getDataPembelianTemp($id_user)
    {
        $this->db->select('p_stok_temp.kode_barang_temp,list_barang_supplier.jenis_barang,nama_barang,p_stok_temp.jenis_kendaraan,harga,qty,(qty * harga) as total_tagihan,id_user');
        $this->db->from('p_stok_temp');
        $this->db->join('list_barang_supplier', 'p_stok_temp.kode_barang_temp = list_barang_supplier.kode_barang');
        $this->db->where('id_user', $id_user);
        return $this->db->get();
    }
    function deletePembelianTemp($kode_barang, $id_user)
    {
        $hapus = $this->db->delete('p_stok_temp', [
            'kode_barang_temp' => $kode_barang,
            'id_user' => $id_user
        ]);
        if ($hapus) {
            return 1;
        } else {
            return 0;
        }
    }
    // .data sementara


    // Cek no faktur penjualan
    function cekNoFakturPenj($no_faktur, $id_user)
    {
        return $this->db->get_where('penjualan', array(
            'no_faktur' => $no_faktur,
            'id_user' => $id_user
        ));
    }
    // Cek no faktur service
    function cekNoFakturService($no_faktur, $id_user)
    {
        return $this->db->get_where('t_service', array(
            'no_faktur' => $no_faktur,
            'id_user' => $id_user
        ));
    }

    // Insert data temp ke table penjualan
    function insertPenjualan($data)
    {
        $simpan = $this->db->insert('penjualan', $data);
        if ($simpan) {
            $detailPenjualan = $this->db->get_where('penjualan_detail_temp', array('id_user' => $data['id_user']));
            $totalPenjualanBarang = 0;
            $berhasil = 0;
            $error = 0;
            foreach ($detailPenjualan->result() as $d) {
                $totalPenjualanBarang = $totalPenjualanBarang + ($d->qty * $d->harga_barang);
                $dataDetail = array(
                    'no_faktur' => $data['no_faktur'],
                    'kode_barang' => $d->kode_barang,
                    'jenis_transaksi' => $d->jenis_transaksi,
                    'tipe_barang' => $d->tipe,
                    'qty' => $d->qty,
                    'harga' => $d->harga_barang,
                );
                $simpanDetail = $this->db->insert('penjualan_detail', $dataDetail);
                if ($simpanDetail) {
                    $berhasil++;

                    $stokBarang = $this->db->query("SELECT stok FROM barang WHERE kode_barang = '$d->kode_barang' ")->row_array();
                    $qtyBarangTemp = $this->db->query("SELECT qty FROM penjualan_detail_temp WHERE kode_barang = '$d->kode_barang' ")->row_array();
                    $sisaStok = $stokBarang['stok'] - $qtyBarangTemp['qty'];
                    $this->db->set('stok', $sisaStok);
                    $this->db->where('kode_barang', $d->kode_barang);
                    $this->db->update('barang');
                } else {
                    $error++;
                }
            }
            if ($error > 0) {
                $hapusDetailPenjualan = $this->db->delete('penjualan_detail', array('no_faktur' => $data['no_faktur']));
                $hapusDataPenjualan = $this->db->delete('penjualan', array('no_faktur' => $data['no_faktur']));
                $this->session->set_flashdata("msg", "<div class='alert alert-danger'>Data gagal disimpan!</div>");
                redirect('penjualan/transaksi/barang');
            } else {
                $hapusTemp = $this->db->delete('penjualan_detail_temp', ['id_user' => $data['id_user']]);
                redirect('penjualan/transaksi/barang');
            }
        }
    }

    // Update penjualan pending
    function updateStatusPenj($id_user)
    {
        $this->db->select('penjualan.no_faktur,tgl_transaksi,pelanggan.kode_pelanggan,nama_pelanggan,penjualan.jenis_transaksi,penjualan.id_user,user.nama as kasir,totalpenjualan as totaltagihan');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
        $this->db->join('user', 'penjualan.id_user = user.id');
        $this->db->join('view_totalpenjualan', 'penjualan.no_faktur = view_totalpenjualan.no_faktur');
        $this->db->where('id_user', $id_user);
        $this->db->where('status', 'Pending');
        return $this->db->get();
    }

    // Insert data temp ke table p_stok
    function insertPembelian($data)
    {
        $simpan = $this->db->insert('p_stok', $data);
        if ($simpan) {
            $detailPembelian = $this->db->get_where('p_stok_temp', array('id_user' => $data['id_user']));
            $totalTagihan = 0;
            $berhasil = 0;
            $error = 0;
            foreach ($detailPembelian->result() as $d) {
                $totalTagihan = $totalTagihan + ($d->qty * $d->harga_barang);
                $dataDetail = array(
                    'no_faktur' => $data['no_faktur'],
                    'kode_supplier' => $d->kode_supplier,
                    'kode_barang' => $d->kode_barang_temp,
                    'jenis_barang' => $d->jenis_barang,
                    'harga' => $d->harga_barang,
                    'qty' => $d->qty
                );
                $simpanDetail = $this->db->insert('p_stok_detail', $dataDetail);
                if ($simpanDetail) {
                    $berhasil++;

                    $stokBarang = $this->db->query("SELECT stok FROM list_barang_supplier WHERE kode_barang = '$d->kode_barang_temp' ")->row_array();
                    $qtyBarangTemp = $this->db->query("SELECT qty FROM p_stok_temp WHERE kode_barang_temp = '$d->kode_barang_temp' ")->row_array();
                    $sisaStok = $stokBarang['stok'] - $qtyBarangTemp['qty'];

                    $this->db->set('stok', $sisaStok);
                    $this->db->where('kode_barang', $d->kode_barang_temp);
                    $this->db->update('list_barang_supplier');

                    $getLastNumber = $this->db->query('SELECT * FROM barang ORDER BY kode_barang desc LIMIT 1')->row_array();
                    $lastNumber = $getLastNumber['kode_barang'];
                    $autoKode = buatKode($lastNumber, 'BR', 5);

                    $data['kode_barang'] = $autoKode;
                    $list_barang_supp = $this->db->get_where('list_barang_supplier', array('kode_barang' => $d->kode_barang_temp));
                    foreach ($list_barang_supp->result() as $list) {
                        $dataListBarang = array(
                            'kode_barang' => $autoKode++,
                            'nama_barang' => $list->nama_barang,
                            'tipe_barang' => $list->jenis_barang,
                            'merk' => $list->merk,
                            'model' => $list->model,
                            'harga_beli' => $list->harga,
                            'harga_jual' => $list->harga,
                            'supplier' => $list->kode_supplier,
                            'stok' => $d->qty,
                            'jenis_kendaraan' => $d->jenis_kendaraan,
                        );
                        $simpanBarang = $this->db->insert('barang', $dataListBarang);
                    }
                } else {
                    $error++;
                }
            }
            if ($error > 0) {
                $hapusDetailPenjualan = $this->db->delete('p_stok_detail', array('no_faktur' => $data['no_faktur']));
                $hapusDataPenjualan = $this->db->delete('p_stok', array('no_faktur' => $data['no_faktur']));
                $this->session->set_flashdata("msg", "<div class='alert alert-danger'>Data gagal disimpan!</div>");
            } else {
                $hapusTemp = $this->db->delete('p_stok_temp', ['id_user' => $data['id_user']]);
            }
        }
    }

    // Insert data temp ke table transaksi service
    function insertTransaksiService($data)
    {
        $simpan = $this->db->insert('t_service', $data);
        if ($simpan) {
            $this->db->set('status', 'Selesai');
            $this->db->where('no_regis_kendaraan', $data['nomor_plat_kendaraan']);
            $this->db->update('b_service');

            $detailService = $this->db->get_where('t_service_detail_temp', array('id_user' => $data['id_user']));
            $totalService = 0;
            $berhasil = 0;
            $error = 0;
            foreach ($detailService->result() as $d) {
                $totalService = $totalService + ($d->qty * $d->harga_service);
                $dataDetail = array(
                    'no_faktur' => $data['no_faktur'],
                    'kode_service' => $d->kode_service,
                    'jenis_transaksi' => $d->jenis_transaksi,
                    'qty' => $d->qty,
                    'harga' => $d->harga_service,
                );
                $simpanDetail = $this->db->insert('t_service_detail', $dataDetail);
                if ($simpanDetail) {
                    $berhasil++;

                    $plat = $data['nomor_plat_kendaraan'];
                    $updateKendaraan = array(
                        'kilometer' => $data['current_km'],
                        'service_terakhir' => $data['tgl_transaksi'],
                        'check_service' => 1
                    );
                    $this->db->where('no_regis', $plat);
                    $this->db->update('kendaraan', $updateKendaraan);
                } else {
                    $error++;
                }
            }
            if ($error > 0) {
                $hapusDetailPenjualan = $this->db->delete('t_service_detail', array('no_faktur' => $data['no_faktur']));
                $hapusDataPenjualan = $this->db->delete('t_service', array('no_faktur' => $data['no_faktur']));
                $this->session->set_flashdata("msg", "<div class='alert alert-danger'>Data gagal disimpan!</div>");
                redirect('penjualan/transaksi/service');
            } else {
                $hapusTemp = $this->db->delete('t_service_detail_temp', ['id_user' => $data['id_user']]);
                redirect('penjualan/transaksi/service');
            }
        }
    }


    // Mendapatkan data penjualan 
    function getHistoriPenjualan($id_user)
    {
        $this->db->select('penjualan.no_faktur,tgl_transaksi,penjualan.kode_pelanggan,id_user,totalpenjualan,nama as nama_kasir,nama_pelanggan');
        $this->db->from('penjualan');
        $this->db->join('user', 'penjualan.id_user = user.id');
        $this->db->join('pelanggan', 'pelanggan.kode_pelanggan = penjualan.kode_pelanggan');
        $this->db->join('view_totalpenjualan', 'penjualan.no_faktur = view_totalpenjualan.no_faktur');
        $this->db->where('jenis_transaksi', 'Barang');
        $this->db->where('status', 'Selesai');
        return $this->db->get();
    }
    function getHistoriPembelian($id_user)
    {
        $this->db->select('p_stok.no_faktur,tgl_transaksi,p_stok.kode_supplier,supplier.nama as nama_supplier,p_stok.id_user,totalpembelian,user.nama as pembeli,');
        $this->db->from('p_stok');
        $this->db->join('user', 'p_stok.id_user = user.id');
        $this->db->join('supplier', 'supplier.kode_supplier = p_stok.kode_supplier');
        $this->db->join('view_totalpembelian', 'p_stok.no_faktur = view_totalpembelian.no_faktur');
        return $this->db->get();
    }
    // Mendapatkan data service
    function getHistoriServicePending($id_user)
    {
        $this->db->select('t_service.no_faktur,tgl_transaksi,t_service.kode_pemegang,nomor_plat_kendaraan,t_service.jenis_kendaraan,status,next_service,id_user,nama as nama_kasir,nama_pemegang,totalt_service,jam_masuk,current_km');
        $this->db->from('t_service');
        $this->db->join('user', 't_service.id_user = user.id');
        $this->db->join('pemegang_kendaraan', 'pemegang_kendaraan.kode_pemegang = t_service.kode_pemegang');
        $this->db->join('view_totaltrxservice', 't_service.no_faktur = view_totaltrxservice.no_faktur');
        $this->db->where('status', 'Pending');
        return $this->db->get();
    }
    function getHistoriServiceProses($id_user)
    {
        $this->db->select('t_service.no_faktur,tgl_transaksi,t_service.kode_pemegang,nomor_plat_kendaraan,t_service.jenis_kendaraan,status,next_service,id_user,nama as nama_kasir,nama_pemegang,totalt_service,jam_masuk,current_km');
        $this->db->from('t_service');
        $this->db->join('user', 't_service.id_user = user.id');
        $this->db->join('pemegang_kendaraan', 'pemegang_kendaraan.kode_pemegang = t_service.kode_pemegang');
        $this->db->join('view_totaltrxservice', 't_service.no_faktur = view_totaltrxservice.no_faktur');
        $this->db->where('status', 'Proses');
        return $this->db->get();
    }
    function getHistoriServiceSelesai($id_user)
    {
        $this->db->select('t_service.no_faktur,tgl_transaksi,t_service.kode_pemegang,nomor_plat_kendaraan,t_service.jenis_kendaraan,status,next_service,id_user,nama as nama_kasir,nama_pemegang,totalt_service,jam_masuk,jam_keluar');
        $this->db->from('t_service');
        $this->db->join('user', 't_service.id_user = user.id');
        $this->db->join('pemegang_kendaraan', 'pemegang_kendaraan.kode_pemegang = t_service.kode_pemegang');
        $this->db->join('view_totaltrxservice', 't_service.no_faktur = view_totaltrxservice.no_faktur');
        $this->db->where('status', 'Selesai');
        return $this->db->get();
    }
    // Menampilkan setiap periode pemegang kendaraan sudah service
    function getServiceKendaraan()
    {
        $this->db->select('*');
        $this->db->from('pemegang_kendaraan');
        return $this->db->get();
    }

    function getModalServiceKendaraan($nomor_plat)
    {
        $this->db->select('pemegang_kendaraan.kode_pemegang,nama_pemegang,pemegang_kendaraan.no_regis_kendaraan,pemegang_kendaraan.jenis_kendaraan,t_service.no_faktur,tgl_transaksi,current_km,t_service.id_user,nama');
        $this->db->from('pemegang_kendaraan');
        $this->db->join('t_service', 'pemegang_kendaraan.no_regis_kendaraan = t_service.nomor_plat_kendaraan');
        $this->db->join('user', 't_service.id_user = user.id');
        $this->db->where('t_service.nomor_plat_kendaraan', $nomor_plat);
        return $this->db->get();
    }

    // Mencetak data penjualan
    function getPenjualan($no_faktur)
    {
        $this->db->select('penjualan.no_faktur,tgl_transaksi,penjualan.kode_pelanggan,jenis_transaksi,penjualan.id_user,nama_pelanggan,alamat_pelanggan,pelanggan.no_telp as notelp_pelanggan,nama as kasir,tunai');
        $this->db->from('penjualan');
        $this->db->join('user', 'penjualan.id_user = user.id');
        $this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
        $this->db->where('no_faktur', $no_faktur);
        return $this->db->get();
    }
    function getDetailPenjualan($no_faktur)
    {
        $this->db->select('penjualan_detail.no_faktur,penjualan_detail.kode_barang,penjualan_detail.tipe_barang,harga,qty,(harga * qty) as subtotal,merk,model,nama_barang,totalpenjualan,(tunai - totalpenjualan) as kembali');
        $this->db->from('penjualan_detail');
        $this->db->join('penjualan', 'penjualan.no_faktur = penjualan_detail.no_faktur');
        $this->db->join('barang', 'penjualan_detail.kode_barang = barang.kode_barang');
        $this->db->join('view_totalpenjualan', 'penjualan_detail.no_faktur = view_totalpenjualan.no_faktur');
        $this->db->where('penjualan_detail.no_faktur', $no_faktur);
        return $this->db->get();
    }

    // Mencetak data pembelian
    function getPembelian($no_faktur)
    {
        $this->db->select('p_stok.no_faktur,tgl_transaksi,p_stok.id_user,p_stok.kode_supplier,supplier.nama as nama_supplier, supplier.alamat as alamat_supplier, supplier.no_telp as notelp_supplier,supplier.email as email_supplier,user.nama as nama_kasir');
        $this->db->from('p_stok');
        $this->db->join('user', 'p_stok.id_user = user.id');
        $this->db->join('supplier', 'p_stok.kode_supplier = supplier.kode_supplier');
        $this->db->where('no_faktur', $no_faktur);
        return $this->db->get();
    }
    function getDetailPembelian($no_faktur)
    {
        $this->db->select('p_stok_detail.no_faktur,p_stok_detail.kode_barang,p_stok_detail.kode_supplier,supplier.nama as nama_supplier,nama_barang,list_barang_supplier.jenis_barang,merk,model,list_barang_supplier.harga,qty,(qty*list_barang_supplier.harga) as subtotal,stok,jenis_kendaraan,totalpembelian');
        $this->db->from('p_stok_detail');
        $this->db->join('supplier', 'p_stok_detail.kode_supplier = supplier.kode_supplier');
        $this->db->join('list_barang_supplier', 'p_stok_detail.kode_barang = list_barang_supplier.kode_barang');
        $this->db->join('view_totalpembelian', 'p_stok_detail.no_faktur = view_totalpembelian.no_faktur');
        $this->db->where('p_stok_detail.no_faktur', $no_faktur);
        return $this->db->get();
    }

    // Mencetak data service
    function getService($no_faktur)
    {
        $this->db->select('t_service.no_faktur,tgl_transaksi,t_service.kode_pemegang,t_Service.jenis_kendaraan,initial_km,current_km,next_service,t_service.id_user,nama_pemegang,alamat_pemegang,pemegang_kendaraan.no_telp as notelp_pemegang,nama as kasir,tunai,no_rangka,no_mesin,tipe,merk,nama_tipe_kendaraan,next_service,current_km');
        $this->db->from('t_service');
        $this->db->join('kendaraan', 't_service.nomor_plat_kendaraan = kendaraan.no_regis');
        $this->db->join('user', 't_service.id_user = user.id');
        $this->db->join('pemegang_kendaraan', 't_service.kode_pemegang = pemegang_kendaraan.kode_pemegang');
        $this->db->where('no_faktur', $no_faktur);
        return $this->db->get();
    }
    function getDetailService($no_faktur)
    {
        $this->db->select('t_service.no_faktur,t_service_detail.kode_service,t_service_detail.harga,qty,(t_service_detail.harga * qty) as subtotal,nama_service,totalt_service,(tunai - totalt_service) as kembali');
        $this->db->from('t_service_detail');
        $this->db->join('t_service', 't_service.no_faktur = t_service_detail.no_faktur');
        $this->db->join('service', 't_service_detail.kode_service = service.kode_service');
        $this->db->join('view_totaltrxservice', 't_service_detail.no_faktur = view_totaltrxservice.no_faktur');
        $this->db->where('t_service_detail.no_faktur', $no_faktur);
        return $this->db->get();
    }



    // Menampilkan pendapatan penjualan hari ini
    function getBayarPenjHariIni()
    {
        $hariIni = date('Y-m-d');
        $this->db->select('penjualan.no_faktur, SUM(harga * qty) as totalbayar');
        $this->db->from('penjualan');
        $this->db->join('penjualan_detail', 'penjualan_detail.no_faktur = penjualan.no_faktur');
        $this->db->where('tgl_transaksi', $hariIni);
        return $this->db->get();
    }
    function getPembelianHariIni()
    {
        $hariIni = date('Y-m-d');
        $this->db->select('p_stok.no_faktur, SUM(harga * qty) as totalpembelian');
        $this->db->from('p_stok');
        $this->db->join('p_stok_detail', 'p_stok.no_faktur = p_stok_detail.no_faktur');
        $this->db->where('tgl_transaksi', $hariIni);
        return $this->db->get();
    }

    // Menampilkan pendapatan service hari ini
    function getBayarServiceHariIni()
    {
        $hariIni = date('Y-m-d');
        $this->db->select('t_service.no_faktur, SUM(harga) as totalbayar');
        $this->db->from('t_service');
        $this->db->join('t_service_detail', 't_service_detail.no_faktur = t_service.no_faktur');
        $this->db->where('tgl_transaksi', $hariIni);
        return $this->db->get();
    }

    // Menampilkan penjualan hari ini
    function getDataPenjualanHariIni()
    {
        $hariIni = date('Y-m-d');
        return $this->db->get_where('penjualan', array('tgl_transaksi' => $hariIni));
    }
    // Menampilkan penjualan hari ini
    function getDataServiceHariIni()
    {
        $hariIni = date('Y-m-d');
        return $this->db->get_where('t_service', array('tgl_transaksi' => $hariIni));
    }
    // Mendapatkan data item yang terjual hari ini
    function getItemTerjualHariIni()
    {
        $hariIni = date('Y-m-d');
        $this->db->select('penjualan.no_faktur,tgl_transaksi,kode_barang,SUM(qty) as terjualHariIni');
        $this->db->from('penjualan');
        $this->db->join('penjualan_detail', 'penjualan.no_faktur = penjualan_detail.no_faktur');
        $this->db->where('tgl_transaksi', $hariIni);
        return $this->db->get();
    }

    // Menampilkan service yang selesai pada hari ini
    function getServiceSelesaiHariIni()
    {
        $hariIni = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('t_service');
        $this->db->like('jam_keluar', $hariIni);
        return $this->db->get();
    }

    // Mendapatkan row service pending
    function getServicePending()
    {
        return $this->db->get_where('t_service', array('status' => 'Pending'));
    }

    // Menampilkan grafik pendapatan
    function getPenjualanPerBulan()
    {
        $tahun = date('Y');
        $query = "SELECT id,nama_bulan,totalpenjualan,totalt_service FROM bulan 
        LEFT JOIN ( 
        SELECT
        MONTH(tgl_transaksi) as bulan ,SUM(harga*qty) as totalpenjualan
        FROM penjualan_detail
        INNER JOIN penjualan ON penjualan_detail.no_faktur = penjualan.no_faktur
        WHERE YEAR(tgl_transaksi) = '$tahun'
        GROUP BY MONTH(tgl_transaksi)
        ) pnj ON (bulan.id = pnj.bulan)
        LEFT JOIN (
        SELECT 
        MONTH(tgl_transaksi) as bulan ,SUM(harga*qty) as totalt_service
        FROM t_service_detail
        INNER JOIN t_service ON t_service_detail.no_faktur = t_service.no_faktur
        WHERE YEAR(tgl_transaksi) = '$tahun'
        GROUP BY MONTH(tgl_transaksi)
        ) trxs ON (bulan.id = trxs.bulan)";

        return $this->db->query($query);
    }
    // Grafik pendapatan supplier
    function getPenjualanPerBulanSupplier()
    {
        $tahun = date('Y');
        $query = "SELECT id,nama_bulan,totalpembelian,totalitem FROM bulan 
        LEFT JOIN ( 
        SELECT
        MONTH(tgl_transaksi) as bulan ,SUM(harga*qty) as totalpembelian,SUM(qty) as totalitem
        FROM p_stok_detail
        INNER JOIN p_stok ON p_stok_detail.no_faktur = p_stok.no_faktur
        WHERE YEAR(tgl_transaksi) = '$tahun'
        GROUP BY MONTH(tgl_transaksi)
        ) pnj ON (bulan.id = pnj.bulan)";

        return $this->db->query($query);
    }

    // Menambil data laporan penjualan
    function getLaporanPenjualan($dari, $sampai)
    {
        $this->db->where('tgl_transaksi >=', $dari);
        $this->db->where('tgl_transaksi <=', $sampai);
        $this->db->select('penjualan.no_faktur,tgl_transaksi,penjualan.kode_pelanggan,nama_pelanggan,jenis_transaksi,penjualan.id_user,nama,totalpenjualan');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
        $this->db->join('user', 'penjualan.id_user = user.id');
        $this->db->join('view_totalpenjualan', 'penjualan.no_faktur = view_totalpenjualan.no_faktur');
        return $this->db->get();
    }

    // Mengambil data laporan service
    function getLaporanService($dari, $sampai)
    {
        $this->db->where('tgl_transaksi >=', $dari);
        $this->db->where('tgl_transaksi <=', $sampai);
        $this->db->select('t_service.no_faktur,tgl_transaksi,t_service.kode_pemegang,nama_pemegang,nomor_plat_kendaraan,t_service.jenis_kendaraan,t_service.id_user,nama,totalt_service');
        $this->db->from('t_service');
        $this->db->join('pemegang_kendaraan', 't_service.kode_pemegang = pemegang_kendaraan.kode_pemegang');
        $this->db->join('user', 't_service.id_user = user.id');
        $this->db->join('view_totaltrxservice', 't_service.no_faktur = view_totaltrxservice.no_faktur');
        return $this->db->get();
    }

    function getLaporanPembelian($supplier, $dari, $sampai)
    {
        $this->db->where('p_stok.kode_supplier', $supplier);
        $this->db->where('tgl_transaksi >=', $dari);
        $this->db->where('tgl_transaksi <=', $sampai);
        $this->db->select('p_stok.no_faktur,tgl_transaksi,p_stok.kode_supplier,supplier.nama as nama_supplier,p_stok.id_user,user.nama as pembeli,totalpembelian');
        $this->db->from('p_stok');
        $this->db->join('list_barang_supplier', 'p_stok.kode_supplier = list_barang_supplier.kode_supplier');
        $this->db->join('supplier', 'p_stok.kode_supplier = supplier.kode_supplier');
        $this->db->join('user', 'p_stok.id_user = user.id');
        $this->db->join('view_totalpembelian', 'p_stok.no_faktur = view_totalpembelian.no_faktur');
        return $this->db->get();
    }

    function check_service($no_regis)
    {
        $this->db->set('check_service', 1);
        $this->db->where('no_regis', $no_regis);
        $this->db->update('kendaraan');
    }
}
