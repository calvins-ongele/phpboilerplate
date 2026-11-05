<?php

class File_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private function readFile(string $filePath, $fileName = '') {
        while (ob_get_level()) {
            ob_end_clean();
        }

        if (empty($fileName)) $fileName = rand().'.jpg';
        
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $filePath); 
 

        header("Content-Type: " . $mimeType);
        header("Content-Length: " . filesize($filePath));
        header('Content-Disposition: inline; filename="' . basename($fileName) . '"');
        header('X-Content-Type-Options: nosniff');
        header('Cache-Control: private, max-age=3600');
        readfile($filePath);
    }

    public function getFileByUuid(string $uuid)
    {
        $file = $this->_get('document_files', 'uuid', [$uuid], 0)[1];

        if (empty($file)) {
            http_response_code(404);
            return ['error'=>'File not found'];
        }


        $filePath = 'public/assets/uploads/' . $file['uuid'] . '.' . $file['file_ext'];
        if (!file_exists($filePath)) {
            http_response_code(404);
            return ['error'=>'File not found'];
        }
        
        $this->readFile($filePath, $file['file_name']);



    }

}
