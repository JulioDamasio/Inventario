<?php

// Verificar se a classe ZipArchive está disponível
if (!class_exists('ZipArchive')) {
    // Função para emular a classe ZipArchive se ela não estiver disponível
    class ZipArchive {
        public function open($filename, $flags) {}
        public function addFile($filename, $localname) {}
        
       
public function close() {}
    }
}

if (isset($_GET['path'])) {
    $caminhos = explode(',', $_GET['path']);

    // Crie um arquivo zip para armazenar os anexos
    $zip = new ZipArchive();
    $zipName = 'anexos.zip';

    if ($zip->open($zipName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
        foreach ($caminhos as $caminho) {
            $arquivo = basename($caminho);
            $caminhoCompleto = 'C:\xampp\htdocs\inventariospo\wp-content\themes\astra-child\arquivos\uploads\\' . $arquivo;

            if (file_exists($caminhoCompleto)) {
                // Adicione cada arquivo ao arquivo zip
                $zip->addFile($caminhoCompleto, $arquivo);
            }
        }

        $zip->close();

        // Defina os cabeçalhos para o download do arquivo zip
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $zipName . '"');
        
       
header('Content-Length: ' . filesize($zipName));
        header('Pragma: no-cache');
        header('Expires: 0');

        // Envie o arquivo zip para o cliente
        readfile($zipName);

        // Exclua o arquivo zip após o download
        unlink($zipName);
        exit;
    }
}
?>
