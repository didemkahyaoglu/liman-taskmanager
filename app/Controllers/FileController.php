<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class FileController
{
	function getFilesList()
    {

        // Komut çalıştırdık
        $cmd = Command::runSudo("ls -la /liman/extensions/taskmanager");

        // Komutu newline ile böldük
        $cmd = explode("\n", $cmd);

        // İlk satırı attık
        array_splice($cmd, 0, 1);

        // her satır üzerinde işlem yapalım.
        foreach ($cmd as $key => &$process)
        {
            // fazlalık boşluklarımı sildim
            $process = preg_replace('/\s+/', ' ', $process);

            // boşluklara göre parçalayalım
            $process = explode(" ", $process);

            // veriyi formatlayalim
            $process = [
                "permissions" => $process[0],
                "num" => $process[1],
                "user" => $process[2],
                "group" => $process[3],
                "size" => $process[4],
                "date_m" => $process[5],
                "date_d" => $process[6],
                "hour" => $process[7],
                "file" => $process[8]

            ];
        }

        return view("table", [
            "value" => $cmd,
            "display" => ["permissions", "num", "user", "group", "size", "date_m", "date_d","hour","file"],
            "title" => ["Yetki", "Num", "Kullanıcı", "Grup", "Size", "Tarih/Ay", "Tarih/Gün","Saat","Dosya"],
            "menu" => [
                "Dosya Yönetimi" => [
                    "target" => "jsGetFiles",
                    "icon" => "fa-location-arrow"
                ],
            ]
        ]);
    }

  
}
