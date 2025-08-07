<livewire:crud-table 
    :model="'RegulasiModel'" 
    :fields="[
        'judul' => 'Judul', 
        'deskripsi' => 'Deskripsi', 
        'tahun' => 'Tahun', 
        'tanggal' => 'Tanggal', 
        'downloads' => 'Downloads', 
        'file_path' => 'File Path'
    ]" 
    :rules="[
        'judul' => 'required', 
        'deskripsi' => 'required', 
        'tahun' => 'required',
        'tanggal' => 'required', 
        'downloads' => 'required', 
        'file_path' => 'required'
    ]"
/>
