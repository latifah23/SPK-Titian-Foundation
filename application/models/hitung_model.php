<?php

class hitung_model extends CI_model
{
    public function joinTabel($key)
    {
        $this->db->select('nilai_alternatif.nilai,siswa.id_siswa,kriteria.id_kriteria,kriteria.bobot,kriteria.atribut');
        $this->db->from('nilai_alternatif,kriteria,siswa');
        $this->db->where('nilai_alternatif.`id_kriteria`= kriteria.`id_kriteria`');
        $this->db->where('nilai_alternatif.`id_siswa`= siswa.`id_siswa`');
        $this->db->where('nilai_alternatif.`id_siswa`', $key);
        $this->db->order_by('kriteria.`id_kriteria`', 'asc');
        return $this->db->get()->result();
    }
    public function flip($arr)
    {
        $out = array();
        foreach ($arr as $key => $ok) {
            foreach ($ok as $subkey => $subvalue) {
                $out[$subkey][$key] = $subvalue;
            }
        }
        return $out;
    }
    public function hitung($tahun)
    {
        $siswa = $this->db->get_where('siswa', array('id_periode' => $tahun))->result();
        $kriteria = $this->db->get('kriteria')->result();
        if ($siswa) {
            #TABEL NILAI ALTERNATIF
            $o = 1;
            $nilaialternatif = array();
            foreach ($siswa as $sis) {
                $nilai = $this->db->get_where('nilai_alternatif', array('id_siswa' => $sis->id_siswa))->result();
                $nilai_baru = array();
                foreach ($kriteria as $krit) {
                    $cektest = $krit->id_kriteria;
                    foreach ($nilai as $nilailama) {
                        if ($nilailama->id_kriteria == $cektest) {
                            $akar[$o][$cektest] = pow($nilailama->nilai, 2);
                            $nilai_baru[] = $nilailama->nilai;
                        }
                    }
                }
                $nilaialternatif[] = array('no' => $o, 'nama' => $sis->nama, 'nilai' => $nilai_baru);
                $o++;
            }
            $nilai_alter = $this->db->get('nilai_alternatif')->result();
            // echo '<pre> Kriteria = ' . json_encode($kriteria) . '<pre><br>';
            // echo '<pre> nilai_alter = ' . json_encode($nilai_alter) . '<pre><br>';
            // echo '<pre> NILAI ALTERNATIF(nilai_alter digabung) = ' . json_encode($nilaialternatif) . '</pre>';
            #END OF TABEL NILAI ALTERNATIF

            #TABLE NILAI PEMBAGI
            $res = array();
            foreach ($akar as $kar1) {
                foreach ($kar1 as $kar2 => $val1) {
                    (!isset($res[$kar2])) ? $res[$kar2] = $val1 : $res[$kar2] += $val1;
                }
            }
            foreach ($res as $key => $value) {
                $cekpembagi[$key] = sqrt($value);
            }
            // echo '<pre> NILAI PEMBAGI = ' . json_encode($cekpembagi) . '</pre>';
            #END OF TABLE NILAI PEMBAGI

            #TABLE KEPUTUSAN TERNORMALISASI
            $o = 1;
            $tabkep = array();
            foreach ($siswa as $sis) {
                $nilai = $this->db->get_where('nilai_alternatif', array('id_siswa' => $sis->id_siswa))->result();
                $nilai_baru = array();
                foreach ($kriteria as $krit) {
                    $cektest = $krit->id_kriteria;
                    foreach ($cekpembagi as $key => $value) {
                        if ($key == $cektest) {
                            foreach ($nilai as $nilai_alter) {
                                if ($nilai_alter->id_kriteria == $cektest) {
                                    $oi = $nilai_alter->nilai / $value;
                                    $kepnom[$o][$cektest] = $oi;
                                    $nilai_baru[] = $oi;
                                }
                            }
                        }
                    }
                }
                $tabkep[] = array('no' => $o, 'nama' => $sis->nama, 'nilai' => $nilai_baru);
                $o++;
            }
            // echo '<pre> KEPUTUSAN TERNORMALISASI = ' . json_encode($tabkep) . '</pre>';
            #END OF TABLE KEPUTUSAN TERNORMALISASI

            #TABLE KEPUTUSAN TERNORMALISASI DAN TERBOBOT
            $o = 1;
            foreach ($siswa as $sis) {
                $nilai = $this->joinTabel($sis->id_siswa);
                // echo '<pre> Hasil Join tabel = ' . json_encode($nilai) . '</pre>';
                foreach ($kriteria as $krit) {
                    $cektest = $krit->id_kriteria;
                    foreach ($nilai as $nilai_alter) {
                        if ($nilai_alter->id_kriteria == $cektest) {
                            $ap1[$o][$cektest] = $nilai_alter->bobot;
                            if ($nilai_alter->atribut == 'benefit') {
                                $cek1[$o][] = 'benefit';
                            } else {
                                $cek1[$o][] = 'cost';
                            }
                        }
                    }
                }
                $o++;
            }
            $oi = 1;
            foreach ($ap1 as $koy) {
                foreach ($koy as $key => $bbt) {
                    $cekhasil[$key][$oi] = $kepnom[$oi][$key] * $bbt;
                }
                $oi++;
            }
            $op = 1;
            $opi = 1;
            $tabbot = array();
            foreach ($siswa as $sis) {
                $nil = array();
                foreach ($cekhasil as $key) {
                    foreach ($key as $kuy => $val) {
                        if ($kuy == $opi) {
                            $datamax[$op][] = $val;
                            $nil[] = $val;
                        }
                    }
                }
                $tabbot[] = array('no' => $op, 'nama' => $sis->nama, 'nilai' => $nil);
                $op++;
                $opi++;
            }
            // echo '<pre> KEPUTUSAN TERNORMALISASI DAN TERBOBOT = ' . json_encode($tabbot) . '</pre>';
            #END OF TABLE KEPUTUSAN TERNORMALISASI DAN TERBOBOT

            #TABLE SOLUSI IDEAL +/-
            $opp = 1;
            foreach ($cek1 as $k) {
                foreach ($k as $key => $value) {
                    foreach ($datamax[$opp] as $kosy => $valuee) {
                        if ($key == $kosy) {
                            //echo " ($key||$kosy) $value $valuee <br>";
                            $datamax1[$key][] = $valuee;
                        }
                    }
                }
                //echo "<br>";
                $opp++;
            }
            $test = $this->flip($cek1);
            $pio = 0;
            foreach ($test as $k => $now) {
                $datapake = array();
                foreach ($now as $key => $value) {
                    if ($k == $pio) {
                        foreach ($datamax1[$k] as $ke => $val) {
                            $datapake[] = $val;
                        }
                        if ($value == 'benefit') {
                            $plus[$pio] = max($datapake);
                            $min[$pio] = min($datapake);
                        } elseif ($value == 'cost') {
                            $plus[$pio] = min($datapake);
                            $min[$pio] = max($datapake);
                        }
                    }
                }
                $pio++;
            }
            // echo '<pre> SOLUSI IDEAL + = ' . json_encode($plus) . '</pre>';
            // echo '<pre> SOLUSI IDEAL - = ' . json_encode($min) . '</pre>';
            #END OF TABLE SOLUSI IDEAL +/-

            #TABLE JARAK IDEAL +/-
            foreach ($datamax as $key) {
                $cek = array();
                foreach ($key as $ke => $value) {
                    $cek[] = pow(($value - $plus[$ke]), 2);
                }
                $spositif[] = sqrt(array_sum($cek));
            }
            foreach ($datamax as $key) {
                $cek = array();
                foreach ($key as $ke => $value) {
                    $cek[] = pow(($value - $min[$ke]), 2);
                }
                $snegatif[] = sqrt(array_sum($cek));
            }
            #END OF TABLE JARAK IDEAL +/-

            #TABLE KEDEKATAN RELATIF (RC)/ HASIL PERHITUNGAN
            $o = 1;
            $oip = 0;
            $jaridl = array();
            foreach ($siswa as $key2) {

                $rc = $snegatif[$oip] / ($spositif[$oip] + $snegatif[$oip]);
                $rcd[$key2->nama] = $rc;
                $rcdx[$key2->id_siswa] = $rc;
                $jaridl[] = array('no' => $o, 'nama' => $key2->nama, 'jarakpositif' => $spositif[$oip], 'jaraknegatif' => $snegatif[$oip], 'rc' => $rc);
                $o++;
                $oip++;
            }
            // echo '<pre> Jarak Ideal Positif(D+) = ' . json_encode($spositif) . '</pre>';
            // echo '<pre> Jarak Ideal Negatif(D-) = ' . json_encode($snegatif) . '</pre>';
            // echo '<pre> Kedekatan Relatif (RC)/Ci = ' . json_encode($jaridl) . '</pre>';
            #END OF TABLE RC     

            return array(
                'krit' => $kriteria,
                'siswa' => $siswa,
                'nilaialter' => $nilaialternatif,
                'cekpembagi' => $cekpembagi,
                'tabkep' => $tabkep,
                'tabbot' => $tabbot,
                'plus' => $plus,
                'min' => $min,
                'jaridl' => $jaridl,
                'rcd' => $rcd,
                'rcdx' => $rcdx,
            );
        }
    }
}
