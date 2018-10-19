<?php

class ImportCSV
{
    private $fileName;
    private $file;
    private $data;
    private $error;

    public function getData(): array
    {
        return $this->data;
    }

    public function setFile(string $fileName, bool $removeHeader = false): bool
    {
        $this->fileName = $fileName;

        if ($this->validateFile() === false) {
            return false;
        }

        $this->process();

        if ($removeHeader === true) {
            $this->removeHeader();
        }

        return true;
    }

    private function removeHeader(): void
    {
        unset($this->data[0]);
        sort($this->data);
    }

    private function process(): void
    {
        $this->file = fopen($this->fileName, 'r');

        $this->data = [];
        while (($line = fgetcsv($this->file)) !== false) {
            $this->data[] = $line;
        }

        fclose($this->file);
    }

    private function validateFile(): bool
    {
        if (empty($this->fileName) || (!file_exists($this->fileName) && !is_dir($this->fileName))) {
            $this->fileName = null;
            $this->error = "Arquivo Inválido";
            return false;
        }

        return true;
    }
}