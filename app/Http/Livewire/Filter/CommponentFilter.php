<?php

namespace App\Http\Livewire\Filter;

use Livewire\Component;
use App\Models\JenisKerja;
use App\Models\KualifikasiLulus;
use App\Models\PengalamanKerja;
use App\Models\SpesialisKerja;
use App\Models\TingkatKerja;

class CommponentFilter extends Component
{
    public $title, $jenker, $name_jk, $jenker_id;
    public $kualif, $name_kl, $kualif_id;
    public $pengkerja, $name_pk, $pengkerja_id;
    public $spesialis, $name_sk, $spesialis_id;
    public $tingker, $name_tk, $tingker_id;
    public $isOpen = 0;

    public function render()
    {
        $this->jenker = JenisKerja::all();
        $this->kualif = KualifikasiLulus::all();
        $this->pengkerja = PengalamanKerja::all();
        $this->spesialis = SpesialisKerja::all();
        $this->tingker = TingkatKerja::all();
        return view('livewire.filter.commponent-filter', [
                    'jenkers' => $this->jenker,
                    'kualifs' => $this->kualif,
                    'pengkerjas' => $this->pengkerja,
                    'spesialises' => $this->spesialis,
                    'tingkers' => $this->tingker,
                ]);
    }

//Fungsi Jenis Kerja
    public function store_jk()
    {
        $this->validate([
            'title' => 'required',
        ]);

        JenisKerja::create([
            'name_jk' => $this->title,
        ]);

        session()->flash('message_jk', 'Jenis Kerja berhasil dibuat.');
    }
    public function edit_jk($id)
    {
        $this->validate([
            'title' => 'required',
        ]);

        JenisKerja::updateOrCreate(['id' => $id], [
            'name_jk' => $this->title,
        ]);

        session()->flash('message_jk', 'Jenis Kerja berhasil diperbarui.');
    }

    public function delete_jk($id)
    {
        JenisKerja::find($id)->delete();
        session()->flash('message_jk', 'Jenis Kerja berhasil dihapus.');
    }
//Close Fungsi Jenis Kerja

//Fungsi Kualifikasi Lulus
    public function store_kl()
    {
        $this->validate([
            'title' => 'required',
        ]);

        KualifikasiLulus::create([
            'name_kl' => $this->title,
        ]);

        session()->flash('message_kl', 'Jenis Kerja berhasil dibuat.');
    }
    public function edit_kl($id)
    {
        $this->validate([
            'title' => 'required',
        ]);

        KualifikasiLulus::updateOrCreate(['id' => $id], [
            'name_kl' => $this->title,
        ]);

        session()->flash('message_kl', 'Jenis Kerja berhasil diperbarui.');
    }

    public function delete_kl($id)
    {
        KualifikasiLulus::find($id)->delete();
        session()->flash('message_kl', 'Jenis Kerja berhasil dihapus.');
    }

//Close Fungsi Kualifikasi Lulus

//Fungsi Pengalaman Kerja
public function store_pk()
{
    $this->validate([
        'title' => 'required',
    ]);

    PengalamanKerja::create([
        'name_pk' => $this->title,
    ]);

    session()->flash('message_pk', 'Pengalaman Kerja berhasil dibuat.');
}
public function edit_pk($id)
{
    $this->validate([
        'title' => 'required',
    ]);

    PengalamanKerja::updateOrCreate(['id' => $id], [
        'name_pk' => $this->title,
    ]);

    session()->flash('message_pk', 'Pengalaman Kerja berhasil diperbarui.');
}

public function delete_pk($id)
{
    PengalamanKerja::find($id)->delete();
    session()->flash('message_pk', 'Pengalaman Kerja berhasil dihapus.');
}

//Close Fungsi Pengalaman Kerja

//Fungsi Spesialis Kerja
public function store_sk()
{
    $this->validate([
        'title' => 'required',
    ]);

    SpesialisKerja::create([
        'name_sk' => $this->title,
    ]);

    session()->flash('message_sk', 'Spesialis Kerja berhasil dibuat.');
}
public function edit_sk($id)
{
    $this->validate([
        'title' => 'required',
    ]);

    SpesialisKerja::updateOrCreate(['id' => $id], [
        'name_sk' => $this->title,
    ]);

    session()->flash('message_sk', 'Spesialis Kerja berhasil diperbarui.');
}

public function delete_sk($id)
{
    SpesialisKerja::find($id)->delete();
    session()->flash('message_sk', 'Spesialis Kerja berhasil dihapus.');
}

//Close Fungsi Spesialis Kerja

//Fungsi Tingkat Kerja
public function store_tk()
{
    $this->validate([
        'title' => 'required',
    ]);

    TingkatKerja::create([
        'name_tk' => $this->title,
    ]);

    session()->flash('message_tk', 'Tingkat Kerja berhasil dibuat.');
}
public function edit_tk($id)
{
    $this->validate([
        'title' => 'required',
    ]);

    TingkatKerja::updateOrCreate(['id' => $id], [
        'name_tk' => $this->title,
    ]);

    session()->flash('message_tk', 'Tingkat Kerja berhasil diperbarui.');
}

public function delete_tk($id)
{
    TingkatKerja::find($id)->delete();
    session()->flash('message_tk', 'Tingkat Kerja berhasil dihapus.');
}

//Close Fungsi Tingkat Kerja
    
}
